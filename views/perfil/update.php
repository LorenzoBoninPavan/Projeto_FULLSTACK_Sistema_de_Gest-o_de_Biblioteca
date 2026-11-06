<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/bean/Perfil.php';
    require '../../model/dao/PerfilDAO.php';

    $perfil = new Perfil();
    $perfil->setId($_POST['id']);
    $perfil->setDescricao($_POST['descricao']);

    $dao = new PerfilDAO();
    $dao->update($perfil);

    header('Location: index.php');