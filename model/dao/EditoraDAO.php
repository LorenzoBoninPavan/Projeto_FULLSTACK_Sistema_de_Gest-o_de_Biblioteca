<?php
    class EditoraDAO {
        public function read() {
            // Tarefa 1
            $query = BD::getConexao()->prepare("SELECT * FROM editora ORDER BY status DESC");

            if(!$query->execute()) {
                print_r($query->errorInfo());
            }

            // Tarefas 2 e 3
            $editoras = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $editora = new editora();

                $editora->setId($linha['id_editora']);
                $editora->setNome($linha['nome']);
                $editora->setStatus($linha['status'] == 1 ? 'Ativo' : 'Inativo');

                array_push($editoras,$editora);
            }

            // Tarefa 4
            return $editoras;
        }

        public function select($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM editora WHERE id_editora = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                $query->execute();

                $result = $query->fetch(PDO::FETCH_ASSOC);
                $editora = new editora();

                $editora->setId($result['id_editora']);
                $editora->setNome($result['nome']);
                $editora->setStatus($result['status']);
            
                return $editora;
            }
            catch(PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
            
        }

    }
