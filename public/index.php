<?php

require_once __DIR__ . '../../vendor/autoload.php';

@$pagina = $_SERVER['PATH_INFO'];

if (!$pagina) {
  header('Location: /listar-clientes');
  exit;
}

$rotas = require_once __DIR__ . '../../config/rotas.php';

if (!array_key_exists($pagina, $rotas)) {
  if ($pagina === "/") {
    header('Location: /listar-clientes');
  } else {
    http_response_code(404);
  }
  exit;
}


session_start();

$classeController = $rotas[$pagina];
$controlador =  new $classeController;
$controlador->processarRequisicao();