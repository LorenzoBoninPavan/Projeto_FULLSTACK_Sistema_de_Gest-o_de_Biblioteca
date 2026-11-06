<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/dao/AssuntoDAO.php';

    $dao = new AssuntoDAO();
    $dao->destroy($_GET['id']);

    header('Location: index.php');