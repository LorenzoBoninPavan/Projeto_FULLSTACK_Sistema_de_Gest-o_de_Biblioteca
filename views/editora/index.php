<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/bean/Editora.php';
    require '../../model/dao/EditoraDAO.php';

    $dao = new EditoraDAO();
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
    <?php include '../../navbar.php' ?>
    
<div class="col-lg-8 mx-auto p-3 py-md-5">


  <main>
      <h1>Editoras</h1>
      <p><a href="create.php">Nova Editora</a></p>

      <table class="table table-hover">
          <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Status</th>
              <th>Ação</th>
          </tr>
          <?php foreach($dao->read() as $editora) : ?>
            <tr>
                <td><?= $editora->getId() ?></td>
                <td><?= $editora->getNome() ?></td>
                <td><?= $editora->getStatus() ?></td>
                <td>
                  <a href="edit.php?id=<?= $editora->getId() ?>">Editar</a>
                  <a href="destroy.php?id=<?= $editora->getId() ?>">Desativar</a>
                </td>
            </tr>
          <?php endforeach; ?>
      </table>
  </main>
  <footer class="pt-5 my-5 text-muted border-top">
    Created by the Bootstrap team &middot; &copy; 2021
  </footer>
</div>


    <script src="../../js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
