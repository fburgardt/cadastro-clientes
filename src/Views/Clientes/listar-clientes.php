<?php require_once __DIR__ . './../header.php'; ?>



<div class="container col-md-12 shadow p-3 mb-5 bg-white rounded">
  <div class="d-flex justify-content-center p-2 mb-2 bg-primary text-white border border-secondary rounded">
    <?= $titulo ?>
  </div>
  <a class="btn btn-outline-primary m-2" href="/novo-cliente" role="button">
    <i class="far fa-address-card"></i>
    Novo Cliente
  </a>

  <table class="table table-sm table-hover" style="font-size:11px;">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Data Nascimento</th>
        <th>Sexo</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listaDeClientes as $cliente) : ?>
        <tr>
          <td><?php echo $cliente->getId() ?></td>
          <td><?php echo $cliente->getNome() ?></td>
          <td><?php echo $cliente->getDtNascimento() ?></td>
          <td><?php echo $cliente->getSexo() ?></td>
          <td>
            <a href="/editar-cliente?id=<?= $cliente->getId() ?>">
              <i class="far fa-edit fa-lg text-warning"></i>
            </a>
          </td>
          <td>
            <a href="/excluir-cliente?id=<?= $cliente->getId() ?>">
              <i class="far fa-trash-alt fa-lg text-danger"></i>
            </a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>

</div>

<?php require_once __DIR__ . './../footer.php'; ?>