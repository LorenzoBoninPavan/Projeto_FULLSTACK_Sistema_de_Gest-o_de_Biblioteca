<?php
    class Status_EmprestimoDAO {
        public function create($status_emprestimo) {
            try {
                $query = BD::getConexao()->prepare("INSERT INTO status_emprestimo(descricao) VALUES (:n)");
                $query->bindValue(':n', $status_emprestimo->getDescricao(), PDO::PARAM_STR);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch (PDOException $e) {
                echo "Erro:" . $e->getMessage();
            }
        }

        public function read() {
            $query = BD::getConexao()->prepare("SELECT * FROM status_emprestimo");

            if(!$query->execute()) {
                print_r($query->errorInfo());
            }

            $status_emprestimos = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $status_emprestimo = new Status_Emprestimo();

                $status_emprestimo->setId($linha['id_status_emprestimo']);
                $status_emprestimo->setDescricao($linha['descricao']);
                $status_emprestimo->setStatus($linha['status']);

                array_push($status_emprestimos,$status_emprestimo);
            }

            return $status_emprestimos;
        }

        public function select($id) {
            $query = BD::getConexao()->prepare("SELECT * FROM status_emprestimo WHERE id_status_emprestimo = :i");
            $query->bindValue(':i', $id, PDO::PARAM_INT);

            if(!$query->execute()) {
                print_r($query->errorInfo());
            }

            $linha = $query->fetch(PDO::FETCH_ASSOC);
            $status_emprestimo = new Status_Emprestimo();

            $status_emprestimo->setId($linha['id_status_emprestimo']);
            $status_emprestimo->setDescricao($linha['descricao']);
            $status_emprestimo->setStatus($linha['status']);

            return $status_emprestimo;
        }

        public function update($status_emprestimo) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE status_emprestimo SET descricao = :n WHERE id_status_emprestimo = :i"
                );
                $query->bindValue(':n', $status_emprestimo->getDescricao(), PDO::PARAM_STR);
                $query->bindValue(':i', $status_emprestimo->getId(), PDO::PARAM_INT);

                $query->execute();
            }
            catch (PDOException $e) {
                echo "Erro:" . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE status_emprestimo SET status = :s WHERE id_status_emprestimo = :i"
                );
                $query->bindValue(':s', 0, PDO::PARAM_INT);
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                $query->execute();
            }
            catch (PDOException $e) {
                echo "Erro:" . $e->getMessage();
            }
        }
    }