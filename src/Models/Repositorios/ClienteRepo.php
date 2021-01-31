<?php

namespace Crmall\Models\Repositorios;
use Crmall\Models\Entidades\Cliente;
use PDO;
use PDOStatement;

class ClienteRepo
{

  private $qtdeRegistros;
  private $conexao;


  public function __construct(PDO $conexao)
  {
    $this->conexao = $conexao; 
  }

  public function listarClientesPaginados($opcoes, $pagina): array
  {
    $offset = ($opcoes['qtdePorPagina'] * $pagina - $opcoes['qtdePorPagina']);
    
    $sql = "SELECT * FROM clientes";
    $sql .= "ORDER BY nome LIMIT $offset,{$opcoes['qtdePorPagina']}";
    $stmt = $this->conexao->query($sql);
    return $this->hidratarListaClientes($stmt);
  }

  private function hidratarListaClientes(PDOStatement $stmt): array
  {
    $dadosClientes = $stmt->fetchAll();
    $listaClientes = [];

    foreach ($dadosClientes as $key => $cliente) {
      $listaClientes[$key] = new Cliente(
        $cliente->id,
        $cliente->nome,
        $cliente->dtNascimento,
        $cliente->sexo,        
      );
    }

    return $listaClientes;
  }

}