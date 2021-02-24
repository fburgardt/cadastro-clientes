<?php

namespace Crmall\Controllers\Clientes;
use Crmall\Models\Repositorios\ClienteRepo;
use Crmall\Conexao\Conexao;
use Crmall\Controllers\InterfaceControllerRequisicao;

class ListarClientes implements InterfaceControllerRequisicao
{
  public function processarRequisicao(): void
  {


    $conexao = Conexao::criarConexao();
    $repo = new ClienteRepo($conexao);
    
    $opcoes = [
      'qtdePorPagina'=> 100,
    ];
    $pagina = 1;
    $listaDeClientes = $repo->listarClientesPaginados($opcoes, $pagina);
    $titulo = "Lista de Clientes";
    
    require_once __DIR__ . '../../../Views/Clientes/listar-clientes.php';
  }
}