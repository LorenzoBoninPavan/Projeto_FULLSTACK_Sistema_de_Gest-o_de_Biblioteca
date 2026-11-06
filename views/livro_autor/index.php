<?php
    require '../../autoload.php';

    $daoAutor = new AutorDAO();
    $daoLivro = new LivroDAO();
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
    
<div class="col-lg-8 mx-auto p-3 py-md-5">


  <main>
      <h1>Livro: <?= $daoLivro->select($_GET['id'])->getTitulo() ?></h1>
      <form action="insert.php" method="post">
        <p class="form-group">
          <label for="livro_titulo">Livro</label>
          <input class="form-control" type="text" name="livro_titulo" value="<?= $daoLivro->select($_GET['id'])->getTitulo() ?>" disabled>
          <input type="hidden" name="livro" value="<?= $_GET['id'] ?>">
        </p>
        <p class="form-group">
          <label for="autor">Autor</label>
          <select name="autor" class="form-control">
            <?php foreach($daoAutor->read() as $autor) : ?>
              <option value="<?= $autor->getId() ?>"><?= $autor->getNome() ?></option>
            <?php endforeach ?>
          </select>
        </p>
        <p class="form-group">
            <input type="reset" value="Limpar" class="btn btn-light">
            <input type="submit" value="Salvar" class="btn btn-primary">
        </p>
      </form>
      <br>
      <h2>Lista de Autores</h2>
      <table class="table table-hover">
          <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Status</th>
              <th>Ação</th>
          </tr>
          <?php foreach($daoLivro->readAutores($_GET['id']) as $autor) : ?>
            <tr>
                <td><?= $autor->getId() ?></td>
                <td><?= $autor->getNome() ?></td>
                <td><?= $autor->getStatus() ?></td>
                <td>
                  <a title="Remover" class="btn-danger" href="destroy.php?livro=<?= $_GET['id'] ?>&autor=<?= $autor->getId() ?>"><i class="bi bi-x"></i></a>
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
