<?php
    class UsuarioDAO {

        public function create($usuario) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO usuario(nome,email,senha,id_perfil) 
                     VALUES (:t,:ie,:ir,:ia)"
                );
                $query->bindValue(':t', $usuario->getNome(), PDO::PARAM_STR);
                $query->bindValue(':ie', $usuario->getEmail(), PDO::PARAM_STR);
                $query->bindValue(':ir', $usuario->getSenha(), PDO::PARAM_STR);
                $query->bindValue(':ia', $usuario->getId_perfil(), PDO::PARAM_INT);

                if (!$query->execute()) {
                    print_r($query->errorInfo());
                    return false;
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function read() {
            $query = BD::getConexao()->prepare("SELECT * FROM usuario");

            if(!$query->execute()) {
                print_r($query->errorInfo());
            }

            $usuarios = array();
            foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $usuario = new Usuario();
                $perfilDAO = new PerfilDAO();

                $usuario->setIdUsuario($linha['id_usuario']);
                $usuario->setNome($linha['nome']);
                $usuario->setEmail($linha['email']);
                $usuario->setSenha($linha['senha']);
                $usuario->setId_perfil($perfilDAO->select($linha['id_perfil']));
                $usuario->setStatus($linha['status']);

                array_push($usuarios,$usuario);
            }

            return $usuarios;
        }

        public function select($id_usuario) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM usuario WHERE id_usuario = :i");
                $query->bindValue(':i', $id_usuario, PDO::PARAM_INT);

                $query->execute();

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $usuario = new Usuario();
                $perfilDAO = new PerfilDAO();

                $usuario->setIdUsuario($linha['id_usuario']);
                $usuario->setNome($linha['nome']);
                $usuario->setEmail($linha['email']);
                $usuario->setSenha($linha['senha']);
                $usuario->setId_perfil($perfilDAO->select($linha['id_perfil']));
                $usuario->setStatus($linha['status']);                
            
                return $usuario;
            }
            catch(PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
            
        }

        public function update($usuario) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE usuario 
                     SET nome = :t,email = :ie,senha = :ir ,status = :e,id_perfil = :ie
                     WHERE id_usuario = :i"
                );
                $query->bindValue(':t', $usuario->getNome(), PDO::PARAM_STR);
                $query->bindValue(':ie', $usuario->getEmail(), PDO::PARAM_STR);
                $query->bindValue(':ir', $usuario->getSenha(), PDO::PARAM_STR);
                $query->bindValue(':e', $usuario->getStatus(), PDO::PARAM_INT);
                $query->bindValue(':ie', $usuario->getId_perfil(), PDO::PARAM_INT);
                $query->bindValue(':i', $usuario->getIdUsuario(), PDO::PARAM_INT);

                $query->execute();
            }
            catch (PDOException $e) {
                printf("Erro: " . $e->getMessage());
            }
        }
        public function destroy($id_usuario) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE usuario SET status = :s WHERE id_usuario = :i"
                );
                $query->bindValue(':e', 0, PDO::PARAM_INT);
                $query->bindValue(':i', $id_usuario, PDO::PARAM_INT);

                $query->execute();
            }
            catch (PDOException $e) {
                echo "Erro:" . $e->getMessage();
            }
        }
    }
