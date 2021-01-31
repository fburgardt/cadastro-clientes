<?php

namespace Crmall\Helpers;

class ValidarData
{

  private $validado = false;

  public function __construct($data)
  {
    $dataParseada = date_parse($data);
    // var_dump($dataParseada);
    if (($dataParseada['warnings']) || $dataParseada['error_count'] > 0) {
      return;
    }
    $this->validado = true;
  }

  public function dataValidada()
  {
    return $this->validado;
  }
}
