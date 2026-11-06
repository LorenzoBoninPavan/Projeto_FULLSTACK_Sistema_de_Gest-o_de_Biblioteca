<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/dao/EditoraDAO.php';

    $dao = new EditoraDAO();
    $dao->destroy($_GET['id']);

    header('Location: index.php');