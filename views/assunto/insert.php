<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/bean/Assunto.php';
    require '../../model/dao/AssuntoDAO.php';

    $assunto = new Assunto();
    $assunto->setDescricao($_POST['descricao']);

    $dao = new AssuntoDAO();
    $dao->create($assunto);

    header('Location: index.php');