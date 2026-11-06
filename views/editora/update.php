<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/bean/Editora.php';
    require '../../model/dao/EditoraDAO.php';

    $editora = new editora();
    $editora->setId($_POST['id']);
    $editora->setNome($_POST['nome']);

    $dao = new EditoraDAO();
    $dao->update($editora);

    header('Location: index.php');