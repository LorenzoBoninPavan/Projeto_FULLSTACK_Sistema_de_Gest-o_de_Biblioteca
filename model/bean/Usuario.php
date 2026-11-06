<?php
    class Usuario {
        private $id_usuario;
        private $nome;
        private $email;
        private $senha;
        private $status;
        private $id_perfil;

        

        public function getIdUsuario() {
            return $this->id_usuario;
        }

        public function setIdUsuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }
        public function getSenha() {
            return $this->senha;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getId_perfil() {
            return $this->id_perfil;
        }

        public function setId_perfil($id_perfil){
            $this->id_perfil = $id_perfil;
        }
        }