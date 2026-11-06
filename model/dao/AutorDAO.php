<?php
    class AutorDAO {
        public function create($autor) {
            try {
                $query = BD::getConexao()->prepare("INSERT INTO autor(nome) VALUES (:n)");
                $query->bindValue(':n', $autor->getNome(), PDO::PARAM_STR);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
            catch (PDOException $e) {
                echo "Erro:" . $e->getMessage();
            }
        }

        public function read() {
            $query = BD::getConexao()->prepare("SELECT * FROM autor");

            if(!$query->execute()) {
                print_r($query->errorInfo());
            }

            $autores = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $autor = new Autor();

                $autor->setId($linha['id_autor']);
                $autor->setNome($linha['nome']);
                $autor->setStatus($linha['status']);

                array_push($autores,$autor);
            }

            return $autores;
        }

        public function select($id) {
            $query = BD::getConexao()->prepare("SELECT * FROM autor WHERE id_autor = :i");
            $query->bindValue(':i', $id, PDO::PARAM_INT);

            if(!$query->execute()) {
                print_r($query->errorInfo());
            }

            $linha = $query->fetch(PDO::FETCH_ASSOC);
            $autor = new Autor();

            $autor->setId($linha['id_autor']);
            $autor->setNome($linha['nome']);
            $autor->setStatus($linha['status']);

            return $autor;
        }

        public function update($autor) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE autor SET nome = :n WHERE id_autor = :i"
                );
                $query->bindValue(':n', $autor->getNome(), PDO::PARAM_STR);
                $query->bindValue(':i', $autor->getId(), PDO::PARAM_INT);

                $query->execute();
            }
            catch (PDOException $e) {
                echo "Erro:" . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE autor SET status = :s WHERE id_autor = :i"
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