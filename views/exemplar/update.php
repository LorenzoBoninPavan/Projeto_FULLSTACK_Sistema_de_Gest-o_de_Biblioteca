<?php
    require '../../model/bean/Exemplar.php';
    require '../../model/dao/ExemplarDAO.php';
    require '../../BD.php';

    $exemplar = new Exemplar();
    $exemplar->setdataA($_POST['dataA']);
    $exemplar->setStatus($_POST['edicao']);
    $exemplar->setId_livro($_POST['id_livro']);
    $exemplar->setId($_POST['id']);

    $dao = new ExemplarDAO();
    $dao->update($exemplar);

    header('Location: index.php');