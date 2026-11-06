<?php
     require '../../autoload.php';

    $exemplar = new Exemplar();
    $exemplar->setdataA($_POST['dataA']);
    $exemplar->setId_livro($_POST['id_livro']);

    $dao = new ExemplarDAO();
    $dao->create($exemplar);

   header('Location: index.php');