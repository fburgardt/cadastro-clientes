<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crmall - cadastro de clientes</title>
  <!-- <link rel="stylesheet" href="css/style.css"> -->

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- icones -->
  <script src="https://kit.fontawesome.com/8eeb33cee0.js" crossorigin="anonymous"></script>
  <!-- fontes Google -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&display=swap" rel="stylesheet">


</head>

<body>

  <div class="container col-md-10 mt-2">
    <?php if (isset($_SESSION['mensagem'])) : ?>
      <div class="alert alert-<?= $_SESSION['tipo_mensagem']; ?>">
        <?= $_SESSION['mensagem']; ?>
      </div>
    <?php
      unset($_SESSION['tipo_mensagem']);
      unset($_SESSION['mensagem']);
    endif;
    ?>