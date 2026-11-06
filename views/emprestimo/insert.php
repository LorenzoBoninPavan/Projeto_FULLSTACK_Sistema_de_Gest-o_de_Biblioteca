<?php
     require '../../autoload.php';

     $emprestimo = new Emprestimo();
     $emprestimo->setdataEmprestimo($_POST['data_emprestimo']);
     $emprestimo->setdataDevolucao($_POST['data_devolucao']);
     $emprestimo->setdataPreDevolucao($_POST['data_prev_devolucao']);
     $emprestimo->setEmprestimo($_POST['id_usu_emprestimo']);
     $emprestimo->setFuncionario($_POST['id_usu_funcionario']);
     $emprestimo->setStatusEmprestimo($_POST['id_status_emprestimo']);



     $dao = new EmprestimoDAO();
     $dao->create($emprestimo);
 
    header('Location: index.php');