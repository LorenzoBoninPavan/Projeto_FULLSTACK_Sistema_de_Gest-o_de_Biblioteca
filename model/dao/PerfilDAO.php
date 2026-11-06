<?php
    class PerfilDAO {
        public function create($perfil) {
            try {
                $query = BD::getConexao()->prepare("INSERT INTO perfil(descricao) VALUES (:n)");
                $query->bindValue(':n', $perfil->getDescricao(), PDO::PARAM_STR);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch (PDOException $e) {
                echo "Erro:" . $e->getMessage();
            }
        }

        public function read() {
            $query = BD::getConexao()->prepare("SELECT * FROM perfil");

            if(!$query->execute()) {
                print_r($query->errorInfo());
            }

            $perfils = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $perfil = new Perfil();

                $perfil->setId($linha['id_perfil']);
                $perfil->setDescricao($linha['descricao']);
                $perfil->setStatus($linha['status']);

                array_push($perfils,$perfil);
            }

            return $perfils;
        }

        public function select($id) {
            $query = BD::getConexao()->prepare("SELECT * FROM perfil WHERE id_perfil = :i");
            $query->bindValue(':i', $id, PDO::PARAM_INT);

            if(!$query->execute()) {
                print_r($query->errorInfo());
            }

            $linha = $query->fetch(PDO::FETCH_ASSOC);
            $perfil = new Perfil();

            $perfil->setId($linha['id_perfil']);
            $perfil->setDescricao($linha['descricao']);
            $perfil->setStatus($linha['status']);

            return $perfil;
        }

        public function update($perfil) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE perfil SET descricao = :n WHERE id_perfil = :i"
                );
                $query->bindValue(':n', $perfil->getDescricao(), PDO::PARAM_STR);
                $query->bindValue(':i', $perfil->getId(), PDO::PARAM_INT);

                $query->execute();
            }
            catch (PDOException $e) {
                echo "Erro:" . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE perfil SET status = :s WHERE id_perfil = :i"
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