<?php

namespace Crmall\Helpers;

use DateTime;

class DataUs
{

  private $dataFormatada;


  public function __construct($data)
  {
    if (is_null($data)) {
      $this->dataFormatada = "0000-00-00";
      return;
    }

    $data = str_replace('/', '-', $data);
    $date = new DateTime($data);
    // return $date->format('d-m-Y H:i:s');

    // var_dump($date);
    // exit;

    $this->dataFormatada = $date->format('Y-m-d');
  }

  public function __toString()
  {
    return $this->dataFormatada;
  }
}
