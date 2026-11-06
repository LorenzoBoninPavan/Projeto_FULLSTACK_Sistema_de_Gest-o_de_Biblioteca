<?php
    require '../../BD.php'; // Arquivo de conexão
    require '../../model/bean/Status_Emprestimo.php';
    require '../../model/dao/Status_EmprestimoDAO.php';

    $status_emprestimo = new Status_Emprestimo();
    $status_emprestimo->setDescricao($_POST['descricao']);

    $dao = new Status_EmprestimoDAO();
    $dao->create($status_emprestimo);

    header('Location: index.php');