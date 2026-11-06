<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/dao/PerfilDAO.php';

    $dao = new PerfilDAO();
    $dao->destroy($_GET['id']);

    header('Location: index.php');