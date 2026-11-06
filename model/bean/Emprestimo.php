<?php
    class Emprestimo {
        private $id_emprestimo;
        private $data_emprestimo;
        private $data_devolucao;
        private $data_prev_devolucao;
        private $id_usu_emprestimo;
        private $id_usu_funcionario;
        private $id_status_emprestimo;
        

        public function getId_emprestimo() {
            return $this->id_emprestimo;
        }

        public function setId_emprestimo($id_emprestimo) {
            $this->id_emprestimo = $id_emprestimo;
        }

        public function getdataEmprestimo() {
            return $this->data_emprestimo;
        }

        public function setdataEmprestimo($data_emprestimo) {
            $this->data_emprestimo = $data_emprestimo;
        }
        public function getdataDevolucao() {
            return $this->data_devolucao;
        }

        public function setdataDevolucao($data_devolucao) {
            $this->data_devolucao = $data_devolucao;
        }
        public function getdataPreDevolucao() {
            return $this->data_prev_devolucao;
        }

        public function setdataPreDevolucao($data_prev_devolucao) {
            $this->data_prev_devolucao = $data_prev_devolucao;
      
        }
        public function getEmprestimo() {
                return $this->id_usu_emprestimo;
            }

        public function setEmprestimo($id_usu_emprestimo) {
            $this->id_usu_emprestimo = $id_usu_emprestimo;
        }
        public function getFuncionario() {
            return $this->id_usu_funcionario;
        }

        public function setFuncionario($id_usu_funcionario) {
            $this->id_usu_funcionario = $id_usu_funcionario;
        }


        public function getStatusEmprestimo() {
            return $this->id_status_emprestimo;
        }

        public function setStatusEmprestimo($id_status_emprestimo) {
            $this->id_status_emprestimo = $id_status_emprestimo;
        }

        }