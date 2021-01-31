<?php

namespace Crmall\Models\Entidades;

class Cliente
{
  private $id;
  private $nome;
  private $dtNascimento;
  private $sexo;
  private $cep;
  private $endereco;
  private $numero;
  private $complemento;
  private $bairro;
  private $estado;
  private $cidade;

  public function __construct($id, $nome, $dtNascimento, $sexo)
  {
    $this->id = $id;
    $this->nome = $nome;
    $this->dtNascimento = $dtNascimento;
    $this->sexo = $sexo;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;

    return $this;
  }

  public function getDtNascimento()
  {
    return $this->dtNascimento;
  }

  public function setDtNascimento($dtNascimento)
  {
    $this->dtNascimento = $dtNascimento;

    return $this;
  }

  public function getSexo()
  {
    return $this->sexo;
  }

  public function setSexo($sexo)
  {
    $this->sexo = $sexo;

    return $this;
  }

  public function getCep()
  {
    return $this->cep;
  }

  public function setCep($cep)
  {
    $this->cep = $cep;

    return $this;
  }

  public function getEndereco()
  {
    return $this->endereco;
  }

  public function setEndereco($endereco)
  {
    $this->endereco = $endereco;

    return $this;
  }

  public function getNumero()
  {
    return $this->numero;
  }

  public function setNumero($numero)
  {
    $this->numero = $numero;

    return $this;
  }

  public function getComplemento()
  {
    return $this->complemento;
  }

  public function setComplemento($complemento)
  {
    $this->complemento = $complemento;

    return $this;
  }

  public function getBairro()
  {
    return $this->bairro;
  }

  public function setBairro($bairro)
  {
    $this->bairro = $bairro;

    return $this;
  }

  public function getEstado()
  {
    return $this->estado;
  }

  public function setEstado($estado)
  {
    $this->estado = $estado;

    return $this;
  }

  public function getCidade()
  {
    return $this->cidade;
  }

  public function setCidade($cidade)
  {
    $this->cidade = $cidade;

    return $this;
  }
}

