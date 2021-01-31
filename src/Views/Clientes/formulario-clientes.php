<?php require_once __DIR__ . './../header.php'; ?>


<div class="container col-md-12 shadow p-3 mb-5 bg-white rounded">

  <div class="d-flex justify-content-center p-2 mb-2 bg-primary text-white border border-secondary rounded">
    <?= $titulo ?>
    <!-- aaaa -->
  </div>

  <form method="post" action="/salvar-cliente<?= isset($cliente) ? '?id=' . $cliente->getId() : '' ?>">

    <div class="row">
      <label for="nome" class="col-md-3 col-form-label">Nome</label>
      <div class="col-md-8">
        <input type="text" id="nome" name="nome" class="form-control form-control-sm" value="<?= isset($cliente) ? $cliente->getNome() : '' ?>" placeholder="Nome" maxlength="100">
      </div>
    </div>

    <div class="row">
      <label for="dtNascimento" class="col-md-3 col-form-label">Data Nascimento</label>
      <div class="col-md-3">
        <input type="date" id="dtNascimento" name="dtNascimento" class="form-control form-control-sm" value="<?= isset($cliente) ? trim($cliente->getDtNascimento()) : '2021-02-01' ?>" placeholder="Data Nascimento" maxlength="25">
      </div>
    </div>

    <div class="row">
      <label for="sexo" class="col-md-3 col-form-label">Sexo</label>
      <div class="col-md-8">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" id="sexo1" value="masculino" checked>
          <label class="form-check-label mr-4" for="sexo1">
            Masculino
          </label>
          <input class="form-check-input" type="radio" name="sexo" id="sexo2" value="feminino">
          <label class="form-check-label" for="sexo2">
            Feminino
          </label>
        </div>
      </div>
    </div>

    <div class="row">
      <label for="cep" class="col-md-3 col-form-label">CEP</label>
      <div class="col-md-2">
        <input type="text" id="cep" name="cep" class="form-control form-control-sm" value="<?= isset($cliente) ? $cliente->getCep() : '' ?>" placeholder="CEP" onblur="consultarCep($('#cep').val());" maxlength="9">
      </div>
    </div>

    <div class="row">
      <label for="endereco" class="col-md-3 col-form-label">Endereço</label>
      <div class="col-md-8">
        <input type="text" id="endereco" name="endereco" class="form-control form-control-sm" value="<?= isset($cliente) ? $cliente->getEndereco() : '' ?>" placeholder="Endereço" maxlength="255">
      </div>
    </div>

    <div class="row">
      <label for="numero" class="col-md-3 col-form-label">Nº</label>
      <div class="col-md-2">
        <input type="text" id="numero" name="numero" class="form-control form-control-sm" value="<?= isset($cliente) ? $cliente->getNumero() : '' ?>" placeholder="Nº" maxlength="5">
      </div>
    </div>

    <div class="row">
      <label for="complemento" class="col-md-3 col-form-label">Complemento</label>
      <div class="col-md-8">
        <input type="text" id="complemento" name="complemento" class="form-control form-control-sm" value="<?= isset($cliente) ? $cliente->getComplemento() : '' ?>" placeholder="Complemento" maxlength="255">
      </div>
    </div>

    <div class="row">
      <label for="bairro" class="col-md-3 col-form-label">Bairro</label>
      <div class="col-md-8">
        <input type="text" id="bairro" name="bairro" class="form-control form-control-sm" value="<?= isset($cliente) ? $cliente->getBairro() : '' ?>" placeholder="Bairro" maxlength="45">
      </div>
    </div>

    <div class="row">
      <label for="cidade" class="col-md-3 col-form-label">Cidade</label>
      <div class="col-md-8">
        <input type="text" id="cidade" name="cidade" class="form-control form-control-sm" value="<?= isset($cliente) ? $cliente->getCidade() : '' ?>" placeholder="Cidade" maxlength="45">
      </div>
    </div>

    <div class="row">
      <label for="estado" class="col-md-3 col-form-label">Estado</label>
      <div class="col-md-2">
        <input type="text" id="estado" name="estado" class="form-control form-control-sm" value="<?= isset($cliente) ? $cliente->getEstado() : '' ?>" placeholder="Estado" maxlength="2">
      </div>
    </div>

    <!-- <div class="row"> -->
    <div class="d-flex justify-content-center">
      <div class="mr-5">
        <button type="submit" id="btnSalvar" name="btnSalvar" class="btn btn-outline-success">Salvar</button>
      </div>
      <div class="ml-5">
        <a class="btn btn btn-outline-danger" href="/listar-clientes" role="button">Voltar</a>
      </div>
    </div>


  </form>
</div>
<?php require_once __DIR__ . './../footer.php'; ?>