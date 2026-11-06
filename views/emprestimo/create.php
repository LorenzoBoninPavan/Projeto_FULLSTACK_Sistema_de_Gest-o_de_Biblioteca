<?php
      require '../../autoload.php'; // Arquivo de conexão

      
    
      $daoEmprestimo = new Emprestimo();
      $daoUsuario = new UsuarioDAO();
      $daostatus_emprestimo = new Status_Emprestimo();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Starter Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/starter-template/">

    

    <!-- Bootstrap core CSS -->
<link href="../../css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../../css/starter-template.css" rel="stylesheet">
  </head>
  <body>
  <?php require '../../navbar.php' ?>
    
<div class="col-lg-8 mx-auto p-3 py-md-5">
  

  <main>
  <h1>Novo Emprestimo</h1>
    <form action="insert.php" method="post">
        <p class="form-group">
            <label for="data_emprestimo">data_emprestimo</label>
            <input type="date" class="form-control" name="data_emprestimo">
        </p>
        <p class="form-group">
            <label for="data_devolucao">data_devolucao</label>
            <input type="date" class="form-control" name="data_devolucao">
        </p>
        <p class="form-group">
            <label for="data_prev_devolucao">data_prev_devolucao</label>
            <input type="date" class="form-control" name="data_prev_devolucao">
        </p>
        <p class="form-group">
          <label for="id_usu_emprestimo">id_usu_emprestimo</label>
          <select class="form-control" name="id_usu_emprestimo">
            <?php foreach($daoUsuario->read() as $id_usu_emprestimo) : ?>
              <option value="<?= $id_usu_emprestimo->getIdUsuario() ?>"><?= $id_usu_emprestimo->getIdUsuario() ?></option>
            <?php endforeach ?>
          </select>
        </p>
        <p class="form-group">
          <label for="id_usu_funcionario">id_usu_funcionario</label>
          <select class="form-control" name="id_usu_funcionario">
            <?php foreach($daoUsuario->read() as $id_usu_funcionario) : ?>
              <option value="<?= $id_usu_funcionario->getIdUsuario() ?>"><?= $id_usu_funcionario->getIdUsuario() ?></option>
            <?php endforeach ?>
          </select>
        </p>
        <p class="form-group">
            <input type="reset" value="Limpar" class="btn btn-light">
            <input type="submit" value="Salvar" class="btn btn-primary">
        </p>
    </form>
    
  </main>
  <footer class="pt-5 my-5 text-muted border-top">
    Created by the Bootstrap team &middot; &copy; 2021
  </footer>

</div>
    <script src="../../js/bootstrap.bundle.min.js"></script>
  </body>
</html>