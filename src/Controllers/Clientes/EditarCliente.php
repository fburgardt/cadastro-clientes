<?php

namespace Crmall\Controllers\Clientes;

use Crmall\Conexao\Conexao;
use Crmall\Controllers\InterfaceControllerRequisicao;
use Crmall\Helpers\DataBr;
use Crmall\Helpers\DataUs;
use Crmall\Models\Repositorios\ClienteRepo;

class EditarCliente implements InterfaceControllerRequisicao
{
  public function processarRequisicao(): void
  {
    $titulo = "Editar Cliente";
    $conexao = Conexao::criarConexao();
    
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (!$id) {
      header('Location: /listar-clientes');
      return;
    }

    $repo = new ClienteRepo($conexao);
    $cliente = $repo->buscar($id);

    if(empty($cliente)) {
      header('Location: /listar-clientes');
      return;
    }

    $cliente = $cliente[0]; // acertando para a única posição do array retornado.
    $cliente->setDtNascimento(new DataUs($cliente->getDtNascimento()));
    require_once __DIR__ . './../../Views/Clientes/formulario-clientes.php';
  }
}
