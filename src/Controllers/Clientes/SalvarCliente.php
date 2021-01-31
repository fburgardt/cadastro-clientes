<?php

namespace Crmall\Controllers\Clientes;

use Crmall\Controllers\InterfaceControllerRequisicao;
use Crmall\Models\Repositorios\ClienteRepo;
use Crmall\Conexao\Conexao;
use Crmall\Models\Entidades\Cliente;
use Crmall\Regras\ValidarCliente;

class SalvarCliente implements InterfaceControllerRequisicao
{

  public function processarRequisicao(): void
  {

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // exit;

    $conexao = Conexao::criarConexao();
    $repo = new ClienteRepo($conexao);



    $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (!$id) {
      $id = null;
      $titulo = "Novo Cliente";
    } else {
      $titulo = "Editar Cliente";
    }

    $nome = $post['nome'];
    $dtNascimento = $post['dtNascimento'];
    $sexo = $post['sexo'];
    $cep = $post['cep'];
    $endereco = $post['endereco'];
    $numero = $post['numero'];
    $complemento = $post['complemento'];
    $bairro = $post['bairro'];
    $cidade = $post['cidade'];
    $estado = $post['estado'];

    $cliente = new Cliente($id, $nome, $dtNascimento, $sexo);
    $cliente->setCep($cep);
    $cliente->setEndereco($endereco);
    $cliente->setNumero($numero);
    $cliente->setComplemento($complemento);
    $cliente->setBairro($bairro);
    $cliente->setCidade($cidade);
    $cliente->setEstado($estado);


    $validado = new ValidarCliente($cliente);

    if ($validado->passou()) {
      $repo->salvar($cliente);
      header('Location: /listar-clientes');
    } else {
      
      require_once __DIR__ . './../../Views/Clientes/formulario-clientes.php';
    }

  }
}
