<?php

namespace Crmall\Models\Repositorios;

use Crmall\Models\Entidades\Cliente;
use Crmall\Helpers\DataBr;
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

  public function getTotalRegistros(): int
  {
    return $this->qtdeRegistros;
  }

  public function listarClientesPaginados($opcoes, $pagina): array
  {
    // var_dump($opcoes);
    // exit;
    $offset = ($opcoes['qtdePorPagina'] * $pagina - $opcoes['qtdePorPagina']);

    $sql = "SELECT * FROM clientes";
    $sql .= " ORDER BY nome LIMIT $offset,{$opcoes['qtdePorPagina']}";
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
        new DataBr($cliente->dt_nascimento),
        $cliente->sexo,
      );

      // populando o restante do objeto Cliente
      $listaClientes[$key]->setCep($cliente->cep);
      $listaClientes[$key]->setEndereco($cliente->endereco);
      $listaClientes[$key]->setNumero($cliente->numero);
      $listaClientes[$key]->setComplemento($cliente->complemento);
      $listaClientes[$key]->setBairro($cliente->bairro);
      $listaClientes[$key]->setCidade($cliente->cidade);
      $listaClientes[$key]->setEstado($cliente->estado);
    }

    return $listaClientes;
  }


  public function salvar(Cliente $cliente)
  {
    if ($cliente->getId() === null) {
      return $this->inserir($cliente);
    }
    return $this->alterar($cliente);
  }

  public function alterar(Cliente $cliente): void
  {
    // echo "alteração";
    // exit;
    $sql = "UPDATE clientes
               SET nome = :nome, 
                   dt_nascimento = :dt_nascimento,
                   sexo = :sexo,
                   cep = :cep,
                   endereco = :endereco,
                   numero = :numero,
                   complemento = :complemento,
                   bairro = :bairro,
                   cidade = :cidade,
                   estado = :estado
             WHERE id = :id";

    // echo '<pre>';
    // echo $sql;
    // exit;

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':nome', $cliente->getNome());
    $stmt->bindValue(':dt_nascimento', $cliente->getDtNascimento());
    $stmt->bindValue(':sexo', $cliente->getSexo());
    $stmt->bindValue(':cep', $cliente->getCep());
    $stmt->bindValue(':endereco', $cliente->getEndereco());
    $stmt->bindValue(':numero', $cliente->getNumero());
    $stmt->bindValue(':complemento', $cliente->getComplemento());
    $stmt->bindValue(':bairro', $cliente->getBairro());
    $stmt->bindValue(':cidade', $cliente->getCidade());
    $stmt->bindValue(':estado', $cliente->getEstado());
    $stmt->bindValue(':id', $cliente->getId());
    $stmt->execute();
  }


  public function inserir(Cliente $cliente)
  {
    $sql = "INSERT INTO clientes (nome, dt_nascimento, sexo, cep, endereco, numero, complemento, bairro, cidade, estado)
            VALUES (:nome, :dt_nascimento, :sexo, :cep, :endereco, :numero, :complemento, :bairro, :cidade, :estado)";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':nome', $cliente->getNome());
    $stmt->bindValue(':dt_nascimento', $cliente->getDtNascimento());
    $stmt->bindValue(':sexo', $cliente->getSexo());
    $stmt->bindValue(':cep', $cliente->getCep());
    $stmt->bindValue(':endereco', $cliente->getEndereco());
    $stmt->bindValue(':numero', $cliente->getNumero());
    $stmt->bindValue(':complemento', $cliente->getComplemento());
    $stmt->bindValue(':bairro', $cliente->getBairro());
    $stmt->bindValue(':cidade', $cliente->getCidade());
    $stmt->bindValue(':estado', $cliente->getEstado());
    $stmt->execute();
    $id = $this->conexao->lastInsertId();

    return $id;
  }

  public function buscar($id)
  {
    $sql = "SELECT * FROM clientes WHERE id = :id";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $this->hidratarListaClientes($stmt);
  }

  public function excluir($id)
  {
    $sql = "DELETE FROM clientes WHERE id = :id";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->rowCount();
  }

  public function buscarPorCliente($nome)
  {
    $sql = "SELECT id FROM clientes WHERE nome = :nome";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue('nome', $nome);
    $stmt->execute();
    $id = $stmt->fetchAll();
    return $id; 

  }

}
