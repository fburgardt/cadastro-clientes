<?php

namespace Crmall\Controllers\Clientes;

use Crmall\Conexao\Conexao;
use Crmall\Controllers\InterfaceControllerRequisicao;
use Crmall\Helpers\AvisosTrait;
use Crmall\Models\Repositorios\ClienteRepo;

class ExcluirCliente implements InterfaceControllerRequisicao
{

  use AvisosTrait;

  public function processarRequisicao(): void
  {
    $conexao = Conexao::criarConexao();

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (!$id) {
      header('Location: /listar-clientes');
      return;
    }

    $repo = new ClienteRepo($conexao);
    $retorno = $repo->excluir($id);

    if ($retorno === 0) {
      $this->mensagem("danger", "O cliente de id <strong>{$id}</strong> não foi excluído");
    } else {
      $this->mensagem("success", "O cliente de id <strong>{$id}</strong> foi excluído com sucesso.");
    }

    header('Location: /listar-clientes');
    return;
  }
}
