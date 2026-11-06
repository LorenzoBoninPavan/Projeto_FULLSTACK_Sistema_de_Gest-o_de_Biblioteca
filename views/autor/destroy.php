<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/dao/AutorDAO.php';

    $dao = new AutorDAO();
    $dao->destroy($_GET['id']);

    header('Location: index.php');