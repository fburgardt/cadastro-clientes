<?php

namespace Crmall\Controllers;

use Crmall\Controllers\InterfaceControllerRequisicao;
use Crmall\Models\Repositorios\ClienteRepo;
use Crmall\Conexao\Conexao;

class CadastrarCliente implements InterfaceControllerRequisicao
{

  public function processarRequisicao(): void
  {

    $conexao = Conexao::criarConexao();
    $repo = new ClienteRepo($conexao);
    
  }

}