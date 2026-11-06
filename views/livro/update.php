<?php
    require '../../model/bean/Livro.php';
    require '../../model/dao/LivroDAO.php';
    require '../../BD.php';

    $livro = new Livro();
    $livro->setTitulo($_POST['titulo']);
    $livro->setEdicao($_POST['edicao']);
    $livro->setAno($_POST['ano']);
    $livro->setAssunto($_POST['assunto']);
    $livro->setEditora($_POST['editora']);
    $livro->setId($_POST['id']);

    $dao = new LivroDAO();
    $dao->update($livro);

    header('Location: index.php');