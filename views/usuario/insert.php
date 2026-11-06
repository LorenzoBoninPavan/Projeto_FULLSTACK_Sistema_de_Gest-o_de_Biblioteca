<?php
     require '../../autoload.php';

    $usuario = new Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setId_perfil($_POST['id_perfil']);

    $dao = new UsuarioDAO();
    $dao->create($usuario);

   header('Location: index.php');