<?php
    class Livro {
        private $id;
        private $titulo;
        private $edicao;
        private $ano;
        private $assunto;
        private $editora;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getEdicao() {
            return $this->edicao;
        }

        public function setEdicao($edicao) {
            $this->edicao = $edicao;
        }

        public function getAno() {
            return $this->ano;
        }

        public function setAno($ano) {
            $this->ano = $ano;
        }

        public function getAssunto() {
            return $this->assunto;
        }

        public function setAssunto($assunto) {
            $this->assunto = $assunto;
        }

        public function getEditora() {
            return $this->editora;
        }

        public function setEditora($editora) {
            $this->editora = $editora;
        }
    }