<?php

namespace Crmall\Helpers;

trait AvisosTrait
{
  public function mensagem(string $tipo, string $mensagem): void
  {
    $_SESSION['tipo_mensagem'] = $tipo;
    $_SESSION['mensagem'] = $mensagem;
  }
}