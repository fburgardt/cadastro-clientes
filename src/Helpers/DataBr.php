<?php

namespace Crmall\Helpers;

use DateTime;

class DataBr
{
  private $dataFormatada = '';

  public function __construct($data)
  {
    if ($data) {
      $date = new DateTime($data);
      // return $date->format('d-m-Y H:i:s');
      $this->dataFormatada = $date->format('d/m/Y');
    }
  }

  public function __toString()
  {
    return $this->dataFormatada;
  }
}
