<?php
    require '../../model/bean/Usuario.php';
    require '../../model/dao/UsuarioDAO.php';
    require '../../BD.php';

    $usuario = new Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setStatus($_POST['status']);
    $usuario->setId_perfil($_POST['id_perfil']);
    $usuario->setIdUsuario($_POST['id_usuario']);

    $dao = new UsuarioDAO();
    $dao->update($usuario);

    header('Location: index.php');