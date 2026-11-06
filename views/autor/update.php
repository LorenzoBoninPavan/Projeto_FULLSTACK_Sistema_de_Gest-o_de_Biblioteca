<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/bean/Autor.php';
    require '../../model/dao/AutorDAO.php';

    $autor = new Autor();
    $autor->setId($_POST['id']);
    $autor->setNome($_POST['nome']);

    $dao = new AutorDAO();
    $dao->update($autor);

    header('Location: index.php');