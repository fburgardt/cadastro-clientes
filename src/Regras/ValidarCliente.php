<?php

namespace Crmall\Regras;

use Crmall\Conexao\Conexao;
use Crmall\Models\Entidades\Cliente;
use Crmall\Helpers\AvisosTrait;
use Crmall\Helpers\ValidarData;
use Crmall\Models\Repositorios\ClienteRepo;

class ValidarCliente
{
  use AvisosTrait;


  private $validado = false;

  public function __construct(Cliente $cliente)
  {
    $conexao = Conexao::criarConexao();
    $repo = new ClienteRepo($conexao);

    if (trim($cliente->getNome() === "")) {
      $this->mensagem('danger', 'Preencha o nome do cliente');
      return;
    }

    $dataNascimento = new ValidarData($cliente->getDtNascimento());
    if ($dataNascimento->dataValidada() === false) {
      $this->mensagem('danger', 'A data de nascimento é inválida');
      return;
    }

    if (($cliente->getSexo() != 'masculino') && ($cliente->getSexo() != 'feminino')) {
      $this->mensagem('danger', 'Informe o sexo');
      return;
    }

    $id = $repo->buscarPorCliente($cliente->getNome());
    if ($this->existe($id, $cliente) === true) {
      $this->mensagem('danger', 'Este nome de cliente já está cadastrado.');
      return;
    }

    #=================================================================== > passou na validação
    $this->validado = true;

    // para cadastros, id = nulo.
    if ($cliente->getId() === null) {
      $this->mensagem('success', 'Cliente cadastrado com sucesso!');
      return;
    }

    // para atualizações
    $this->mensagem('success', 'Cliente atualizado com sucesso!');
    return;
  }

  public function passou()
  {
    return $this->validado;
  }

  // Prevenindo o registro de nomes duplicados.
  public function existe($id, $cliente)
  {
    if (!empty($id)) {
      if (intval($id[0]->id) !== $cliente->getId()) {
        return true;
      }
    }
    return false;
  }
}
