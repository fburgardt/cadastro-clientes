<?php

namespace Crmall\Controllers\Clientes;
use Crmall\Controllers\InterfaceControllerRequisicao;

class NovoCliente implements InterfaceControllerRequisicao
{
  public function processarRequisicao(): void
  {
    $titulo = "Novo Cliente";
    require_once __DIR__ . './../../Views/Clientes/formulario-clientes.php';
  }
}
