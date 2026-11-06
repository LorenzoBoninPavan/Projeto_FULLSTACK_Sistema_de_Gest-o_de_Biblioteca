<?php
    require '../../autoload.php'; // Arquivo de conexão


    $dao = new UsuarioDAO();
    $dao->destroy($_GET['id_usuario']);

    header('Location: index.php');