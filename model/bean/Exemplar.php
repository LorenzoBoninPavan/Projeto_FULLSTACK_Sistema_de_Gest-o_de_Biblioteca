<?php
    class Exemplar {
        private $id;
        private $data_aquisicao;
        private $status;
        private $id_livro;
        

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getdataA() {
            return $this->data_aquisicao;
        }

        public function setdataA($data_aquisicao) {
            $this->data_aquisicao = $data_aquisicao;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getId_livro() {
            return $this->id_livro;
        }

        public function setId_livro($id_livro){
            $this->id_livro = $id_livro;
        }
        }