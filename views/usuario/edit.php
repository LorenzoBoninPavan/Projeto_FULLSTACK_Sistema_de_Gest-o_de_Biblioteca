<?php
       require '../../autoload.php';

      $daousuario = new UsuarioDAO();
      $daoPerfil = new PerfilDAO();

      $usuario = $daousuario->select($_GET['id']);
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
  <h1>Editar Usuario</h1>
    <form action="update.php" method="post">
        <p class="form-group">
            <label for="titulo">Nome</label>
            <input type="text" class="form-control" name="titulo" value="<?= $usuario->getNome() ?>">
        </p>
        <p class="form-group">
            <label for="titulo">Email</label>
            <input type="text" class="form-control" name="titulo" value="<?= $usuario->getEmail() ?>">
        </p>
        <p class="form-group">
            <label for="titulo">Senha</label>
            <input type="password" class="form-control" name="titulo" value="<?= $usuario->getSenha() ?>">
        </p>
        <p class="form-group">
          <label for="perfil">Perfil</label>
          <select class="form-control" name="perfil">
            <?php foreach($daoPerfil->read() as $perfil) : ?>
                <?php if($perfil->getId() == $usuario->getId_perfil()->getId()) : ?>
                    <option selected value="<?= $perfil->getId() ?>"><?= $perfil->getId() ?></option>
                <?php else : ?>
                    <option value="<?= $perfil->getId() ?>"><?= $perfil->getId() ?></option>
                <?php endif ?>
            <?php endforeach ?>
          </select>
        </p>
        
        <input type="hidden"name="id_usuario" value="<?= $_GET['id_usuario'] ?>">

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