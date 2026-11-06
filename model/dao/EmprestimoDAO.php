<?php
    class EmprestimoDAO {

        public function create($emprestimo) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO emprestimo(data_emprestimo,data_devolucao,data_prev_devolucao,id_usu_emprestimo,id_usu_funcionario,id_status_emprestimo) 
                     VALUES (:t,:ie,:ir,:ia,:ib,:ic)"
                );
                $query->bindValue(':t', $emprestimo->getdataEmprestimo(), PDO::PARAM_STR);
                $query->bindValue(':ie', $emprestimo->getdataDevolucao(), PDO::PARAM_STR);
                $query->bindValue(':ir', $emprestimo->getdataPreDevolucao(), PDO::PARAM_STR);
                $query->bindValue(':ia', $emprestimo->getEmprestimo(), PDO::PARAM_STR);
                $query->bindValue(':ib', $emprestimo->getFuncionario(), PDO::PARAM_INT);
                $query->bindValue(':ic', $emprestimo->getStatusEmprestimo(), PDO::PARAM_INT);

                if (!$query->execute()) {
                    print_r($query->errorInfo());
                    return false;
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function read() {
            $query = BD::getConexao()->prepare("SELECT * FROM emprestimo");

            if(!$query->execute()) {
                print_r($query->errorInfo());
            }

            $emprestimos = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $emprestimo = new Emprestimo();
                $usuarioDAO = new Usuario();
                $status_emprestimoDAO = new Status_Emprestimo();

                $emprestimo->setId_emprestimo($linha['id_emprestimo']);
                $emprestimo->setdataEmprestimo($linha['data_emprestimo']);
                $emprestimo->setdataDevolucao($linha['data_devolucao']);
                $emprestimo->setdataPreDevolucao($linha['data_prev_devolucao']);
                $emprestimo->setEmprestimo($usuarioDAO->select($linha['id_usu_emprestimo']));
                $emprestimo->setFuncionario($usuarioDAO->select($linha['id_usu_funcionario']));
                $emprestimo->setStatusEmprestimo($status_emprestimoDAO->select($linha['id_status_emprestimo']));

                array_push($emprestimos,$emprestimo);
            }

            return $emprestimos;
        }

        public function select($id_emprestimo) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM emprestimo WHERE id_emprestimo = :i");
                $query->bindValue(':i', $id_emprestimo, PDO::PARAM_INT);

                $query->execute();

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $emprestimo = new Emprestimo();
                $usuarioDAO = new Usuario();
                $status_emprestimoDAO = new Status_Emprestimo();

                $emprestimo->setId_emprestimo($linha['id_emprestimo']);
                $emprestimo->setdataEmprestimo($linha['data_emprestimo']);
                $emprestimo->setdataDevolucao($linha['data_devolucao']);
                $emprestimo->setdataPreDevolucao($linha['data_prev_devolucao']);
                $emprestimo->setEmprestimo($usuarioDAO->select($linha['id_usu_emprestimo']));
                $emprestimo->setFuncionario($usuarioDAO->select($linha['id_usu_funcionario']));
                $emprestimo->setStatusEmprestimo($status_emprestimoDAO->select($linha['id_status_emprestimo']));               
            
                return $emprestimo;
            }
            catch(PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
            
        }

        public function update($emprestimo) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE emprestimo 
                     SET data_emprestimo = :t,data_devolucao = :ie,data_prev_devolucao = :ir ,id_usu_emprestimo = :ia,id_usu_funcionario = :ib,id_status_emprestimo = :ic
                     WHERE id_emprestimo = :i"
                );

                $query->bindValue(':t', $emprestimo->getdataEmprestimo(), PDO::PARAM_STR);
                $query->bindValue(':ie', $emprestimo->getdataDevolucao(), PDO::PARAM_STR);
                $query->bindValue(':ir', $emprestimo->getdataPreDevolucao(), PDO::PARAM_STR);
                $query->bindValue(':ia', $emprestimo->getEmprestimo(), PDO::PARAM_STR);
                $query->bindValue(':ib', $emprestimo->getFuncionario(), PDO::PARAM_INT);
                $query->bindValue(':ic', $emprestimo->getStatusEmprestimo(), PDO::PARAM_INT);


                $query->execute();
            }
            catch (PDOException $e) {
                printf("Erro: " . $e->getMessage());
            }
        }
        public function destroy($id_emprestimo) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE emprestimo SET status = :s WHERE id_emprestimo = :i"
                );
                $query->bindValue(':i', $id_emprestimo, PDO::PARAM_INT);

                $query->execute();
            }
            catch (PDOException $e) {
                echo "Erro:" . $e->getMessage();
            }
        }
    }
