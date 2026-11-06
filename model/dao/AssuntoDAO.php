<?php
    class AssuntoDAO {

        public function read() {

            $query = BD::getConexao()->prepare("SELECT * FROM assunto");

            if(!$query->execute()) {
                print_r($query->errorInfo());
            }

            $assuntos = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $assunto = new Assunto();

                $assunto->setId($linha['id_assunto']);
                $assunto->setDescricao($linha['descricao']);
                $assunto->setStatus($linha['status'] == 1 ? 'Ativo' : 'Inativo');

                array_push($assuntos,$assunto);
            }

            return $assuntos;
        }
        
        public function select($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM assunto WHERE id_assunto = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                $query->execute();

                $result = $query->fetch(PDO::FETCH_ASSOC);
                $assunto = new assunto();

                $assunto->setId($result['id_assunto']);
                $assunto->setDescricao($result['descricao']);
                $assunto->setStatus($result['status']);
            
                return $assunto;
            }
            catch(PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
