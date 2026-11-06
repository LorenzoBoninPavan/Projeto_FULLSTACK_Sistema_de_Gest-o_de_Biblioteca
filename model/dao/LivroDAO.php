<?php
    class LivroDAO {

        public function create($livro) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO livro(titulo,edicao,ano,id_assunto,id_editora) 
                     VALUES (:t, :e, :a, :ia, :ie)"
                );
                $query->bindValue(':t', $livro->getTitulo(), PDO::PARAM_STR);
                $query->bindValue(':e', $livro->getEdicao(), PDO::PARAM_INT);
                $query->bindValue(':a', $livro->getAno(), PDO::PARAM_INT);
                $query->bindValue(':ia', $livro->getAssunto(), PDO::PARAM_INT);
                $query->bindValue(':ie', $livro->getEditora(), PDO::PARAM_INT);

                if (!$query->execute()) {
                    print_r($query->errorInfo());
                    return false;
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function read() {
            $query = BD::getConexao()->prepare("SELECT * FROM livro");

            if(!$query->execute()) {
                print_r($query->errorInfo());
            }

            $livros = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $livro = new Livro();
                $assuntoDAO = new AssuntoDAO();
                $editoraDAO = new EditoraDAO();

                $livro->setId($linha['id_livro']);
                $livro->setTitulo($linha['titulo']);
                $livro->setEdicao($linha['edicao']);
                $livro->setAssunto($assuntoDAO->select($linha['id_assunto']));
                $livro->setEditora($editoraDAO->select($linha['id_editora']));
                $livro->setAno($linha['ano']);

                array_push($livros,$livro);
            }

            return $livros;
        }

        public function select($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM livro WHERE id_livro = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                $query->execute();

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $livro = new livro();
                $assuntoDAO = new AssuntoDAO();
                $editoraDAO = new EditoraDAO();

                $livro->setId($linha['id_livro']);
                $livro->setTitulo($linha['titulo']);
                $livro->setEdicao($linha['edicao']);
                $livro->setAssunto($assuntoDAO->select($linha['id_assunto']));
                $livro->setEditora($editoraDAO->select($linha['id_editora']));
                $livro->setAno($linha['ano']);                
            
                return $livro;
            }
            catch(PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
            
        }

        public function update($livro) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE livro 
                     SET titulo = :t, edicao = :e, ano = :a, id_assunto = :ia, id_editora = :ie
                     WHERE id_livro = :i"
                );
                $query->bindValue(':t', $livro->getTitulo(), PDO::PARAM_STR);
                $query->bindValue(':e', $livro->getEdicao(), PDO::PARAM_INT);
                $query->bindValue(':a', $livro->getAno(), PDO::PARAM_INT);
                $query->bindValue(':ia', $livro->getAssunto(), PDO::PARAM_INT);
                $query->bindValue(':ie', $livro->getEditora(), PDO::PARAM_INT);
                $query->bindValue(':i', $livro->getId(), PDO::PARAM_INT);

                $query->execute();
            }
            catch (PDOException $e) {
                printf("Erro: " . $e->getMessage());
            }
        }
    }
