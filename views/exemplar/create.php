<?php
      require '../../autoload.php'; // Arquivo de conexão

      
    
      $daoExemplar = new ExemplarDAO();
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
  </head>
  <body>
  <?php require '../../navbar.php' ?>
    
<div class="col-lg-8 mx-auto p-3 py-md-5">
  

  <main>
  <h1>Novo Exemplar</h1>
    <form action="insert.php" method="post">
        <p class="form-group">
            <label for="dataA">Data de aquisição</label>
            <input type="date" class="form-control" name="dataA">
        </p>
        </p>

        <p class="form-group">
          <label for="id_livro">Livro</label>
          <select class="form-control" name="id_livro">
            <?php foreach($daoLivro->read() as $id_livro) : ?>
              <option value="<?= $id_livro->getId() ?>"><?= $id_livro->getTitulo() ?></option>
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