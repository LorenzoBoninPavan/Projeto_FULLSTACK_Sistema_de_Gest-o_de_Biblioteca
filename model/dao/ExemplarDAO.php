<?php
    class ExemplarDAO {

        public function create($exemplar) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO exemplar(data_aquisicao,id_livro) 
                     VALUES (:t,:ia)"
                );
                $query->bindValue(':t', $exemplar->getdataA(), PDO::PARAM_STR);
                $query->bindValue(':ia', $exemplar->getId_livro(), PDO::PARAM_INT);

                if (!$query->execute()) {
                    print_r($query->errorInfo());
                    return false;
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function read() {
            $query = BD::getConexao()->prepare("SELECT * FROM exemplar");

            if(!$query->execute()) {
                print_r($query->errorInfo());
            }

            $exemplares = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $exemplar = new Exemplar();
                $livroDAO = new LivroDAO();

                $exemplar->setId($linha['id_exemplar']);
                $exemplar->setdataA($linha['data_aquisicao']);
                $exemplar->setId_livro($livroDAO->select($linha['id_livro']));
                $exemplar->setStatus($linha['status']);

                array_push($exemplares,$exemplar);
            }

            return $exemplares;
        }

        public function select($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM exemplar WHERE id_exemplar = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                $query->execute();

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $exemplar = new exemplar();
                $livroDAO = new LivroDAO();

                $exemplar->setId($linha['id_exemplar']);
                $exemplar->setdataA($linha['data_aquisicao']);
                $exemplar->setId_livro($livroDAO->select($linha['id_livro']));
                $exemplar->setStatus($linha['status']);                
            
                return $exemplar;
            }
            catch(PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
            
        }

        public function update($exemplar) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE exemplar 
                     SET data_aquisicao = :t, status = :e,id_livro = :ie
                     WHERE id_exemplar = :i"
                );
                $query->bindValue(':t', $exemplar->getdataA(), PDO::PARAM_STR);
                $query->bindValue(':e', $exemplar->getStatus(), PDO::PARAM_INT);
                $query->bindValue(':ie', $exemplar->getId_livro(), PDO::PARAM_INT);
                $query->bindValue(':i', $exemplar->getId(), PDO::PARAM_INT);

                $query->execute();
            }
            catch (PDOException $e) {
                printf("Erro: " . $e->getMessage());
            }
        }
        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE exemplar SET status = :s WHERE id_autor = :i"
                );
                $query->bindValue(':e', 0, PDO::PARAM_INT);
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                $query->execute();
            }
            catch (PDOException $e) {
                echo "Erro:" . $e->getMessage();
            }
        }
    }
