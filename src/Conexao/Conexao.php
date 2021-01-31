<?php

namespace Crmall\Conexao;

use PDO;

class Conexao
{
  public static function criarConexao()
  {
    $opcoes = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ];

    $conexao = new PDO('mysql:host=localhost;dbname=crmall_teste', 'root', '', $opcoes);
    $conexao->exec('set names utf8');
    return $conexao;
  }
}
