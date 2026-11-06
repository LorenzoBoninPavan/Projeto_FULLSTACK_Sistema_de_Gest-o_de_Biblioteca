<?php
          require '../../autoload.php'; // Arquivo de conexão


          $daoEmprestimo = new EmprestimoDAO();
          $daostatus_emprestimo = new Status_Emprestimo();
          $daoUsuario= new Usuario();

      $emprestimo = $daoemprestimo->select($_GET['id']);
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
  <h1>Editar Emprestimo</h1>
    <form action="update.php" method="post">
        <p class="form-group">
            <label for="titulo">Data do Emprestimo</label>
            <input type="date" class="form-control" name="titulo" value="<?= $emprestimo->getdataEmprestimo() ?>">
        </p>
        <form action="update.php" method="post">
        <p class="form-group">
            <label for="titulo">Data do Devolução</label>
            <input type="date" class="form-control" name="titulo" value="<?= $emprestimo->getdataDevolucao() ?>">
        </p> 
        <p class="form-group">
          <label for="id_usu_emprestimo">Id Usuario</label>
          <select class="form-control" name="id_usu_emprestimo">
            <?php foreach($daoUsuario->read() as $id_usu_emprestimo) : ?>
                <?php if($id_usu_emprestimo->getIdUsuario() == $emprestimo->getEmprestimo()->getIdUsuario()) : ?>
                    <option selected value="<?= $id_usu_emprestimo->getIdUsuario() ?>"><?= $id_usu_emprestimo->getIdUsuario() ?></option>
                <?php else : ?>
                    <option value="<?= $id_usu_emprestimo->getIdUsuario() ?>"><?= $id_usu_emprestimo->getNome() ?></option>
                <?php endif ?>
            <?php endforeach ?>
          </select>
        </p>
        <p class="form-group">
          <label for="id_usu_funcionario">Id Usuario</label>
          <select class="form-control" name="id_usu_funcionario">
            <?php foreach($daoUsuario->read() as $id_usu_funcionario) : ?>
                <?php if($id_usu_funcionario->getIdUsuario() == $emprestimo->getFuncionario()->getIdUsuario()) : ?>
                    <option selected value="<?= $id_usu_funcionario->getIdUsuario() ?>"><?= $id_usu_funcionario->getIdUsuario() ?></option>
                <?php else : ?>
                    <option value="<?= $id_usu_funcionario->getIdUsuario() ?>"><?= $id_usu_funcionario->getNome() ?></option>
                <?php endif ?>
            <?php endforeach ?>
          </select>
        </p>
        <p class="form-group">
          <label for="id_status_emprestimo">Id Usuario</label>
          <select class="form-control" name="id_status_emprestimo">
            <?php foreach($daostatus_emprestimo->read() as $id_status_emprestimo) : ?>
                <?php if($id_status_emprestimo->getStatus() == $emprestimo->get()->getStatusEmprestimo()) : ?>
                    <option selected value="<?= $id_status_emprestimo->getStatus() ?>"><?= $id_status_emprestimo->getStatus() ?></option>
                <?php else : ?>
                    <option value="<?= $id_status_emprestimo->getStatus() ?>"><?= $id_status_emprestimo->getStatus() ?></option>
                <?php endif ?>
            <?php endforeach ?>
          </select>
        </p>
        

        <input type="hidden"name="id" value="<?= $_GET['id'] ?>">

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