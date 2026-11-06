<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/dao/ExemplarDAO.php';

    $dao = new ExemplarDAO();
    $dao->destroy($_GET['id']);

    header('Location: index.php');