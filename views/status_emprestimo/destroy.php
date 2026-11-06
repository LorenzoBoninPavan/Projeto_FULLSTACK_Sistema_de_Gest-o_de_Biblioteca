<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/dao/Status_EmprestimoDAO.php';

    $dao = new Status_EmprestimoDAO();
    $dao->destroy($_GET['id']);

    header('Location: index.php');