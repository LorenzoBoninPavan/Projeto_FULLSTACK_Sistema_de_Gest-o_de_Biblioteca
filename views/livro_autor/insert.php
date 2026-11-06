<?php
    require '../../autoload.php';

    $dao = new LivroDAO();
    $dao->addAutor($_POST['livro'],$_POST['autor']);

    header("Location: index.php?id=" . $_POST['livro']);