<?php
    require_once '../../autoload.php';

    $dao = new EmprestimoDAO();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  </head>
  <body>
  <?php require '../../navbar.php' ?>
    
<div class="col-lg-8 mx-auto p-3 py-md-5">
  

  <main>
    <h1>Emprestimo</h1>
    <p><a href="create.php">Novo Emprestimo</a></p>
    
    <table class='table table-hover'>
        <tr>
            <th>id_emprestimo</th>
            <th>data_emprestimo</th>
            <th>data_devolucao</th>
            <th>data_prev_devolucao</th>
            <th>id_usu_emprestimo</th>
            <th>id_usu_funcionario</th>
            <th>id_status_emprestimo</th>


        </tr>
        <?php foreach ($dao->read() as $emprestimo) : ?>
            <tr>
                <td><?= $emprestimo->getId_emprestimo() ?></td>
                <td><?= $emprestimo->getdataEmprestimo() ?></td>
                <td><?= $emprestimo->getdataDevolucao() ?></td>
                <td><?= $emprestimo->getdataPreDevolucao() ?></td>
                <td><?= $emprestimo->getEmprestimo()->getId() ?></td>
                <td><?= $emprestimo->getFuncionario()->getId() ?></td>
                <td><?= $emprestimo->getStatusEmprestimo()->getStatus() ?></td>
                
                  <a href="edit.php?id=<?= $emprestimo->getId_emprestimo() ?>"><i class="bi bi-pencil"></i></a>
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
