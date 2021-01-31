<?php

use Crmall\Controllers\Clientes\{
  ListarClientes,
  NovoCliente,
  SalvarCliente,
  EditarCliente,
  ExcluirCliente,
};

return $rotas = [
  '/listar-clientes' => ListarClientes::class,
  '/novo-cliente' => NovoCliente::class,
  '/salvar-cliente' => SalvarCliente::class,
  '/excluir-cliente' => ExcluirCliente::class,
  '/editar-cliente' => EditarCliente::class,
];