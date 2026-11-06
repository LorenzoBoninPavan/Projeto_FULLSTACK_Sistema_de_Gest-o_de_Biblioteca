<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/bean/Editora.php';
    require '../../model/dao/EditoraDAO.php';

    $editora = new Editora();
    $editora->setNome($_POST['nome']);

    //echo "Nome: " . $autor->getNome();

    $dao = new EditoraDAO();
    $dao->create($editora);

    header('Location: index.php');