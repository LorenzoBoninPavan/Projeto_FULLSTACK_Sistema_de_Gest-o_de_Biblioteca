<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/bean/Autor.php';
    require '../../model/dao/AutorDAO.php';

    $autor = new Autor();
    $autor->setNome($_POST['nome']);

    //echo "Nome: " . $autor->getNome();

    $dao = new AutorDAO();
    $dao->create($autor);

    header('Location: index.php');