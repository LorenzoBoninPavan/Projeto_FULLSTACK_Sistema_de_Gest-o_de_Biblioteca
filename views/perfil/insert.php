<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/bean/Perfil.php';
    require '../../model/dao/PerfilDAO.php';

    $perfil = new Perfil();
    $perfil->setDescricao($_POST['descricao']);

    $dao = new PerfilDAO();
    $dao->create($perfil);

    header('Location: index.php');