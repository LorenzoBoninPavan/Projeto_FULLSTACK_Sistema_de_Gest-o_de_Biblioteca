<?php
    require '../../autoload.php';

    $dao = new LivroDAO();
    $dao->removeAutor($_GET['livro'],$_GET['autor']);

    header("Location: index.php?id=" . $_GET['livro']);