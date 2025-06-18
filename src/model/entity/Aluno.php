<?php
    namespace src\model\entity;

    class aluno {
        private $id;
        private $matricula;
        private $nome;
        private $sobrenome;
        private $cpf;
        private $dataNascimento;
        private $contatoResponsavel;
        private $endereco;
        private $emailResponsavel;
        private $tipoSanguineo;
        private $idTurma;

        // ID
        public function setID($id) {
            $this->id = $id;
        }
        public function getID() {
            return $this->id;
        }

        // Matricula
        public function setMatricula($matricula) {
            $this->matricula = $matricula;
        }
        public function getMatricula() {
            return $this->matricula;
        }

        // Nome
        public function setNome($nome) {
            $this->nome = $nome;
        }
        public function getNome() {
            return $this->nome;
        }

        // Sobrenome
        public function setSobrenome($sobrenome) {
            $this->sobrenome = $sobrenome;
        }
        public function getSobrenome() {
            return $this->sobrenome;
        }

        // CPF
        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }
        public function getCpf() {
            return $this->cpf;
        }

        // Data de nascimento
        public function setDataNascimento($dataNascimento) {
            $this->dataNascimento = $dataNascimento;
        }
        public function getDataNascimento() {
            return $this->dataNascimento;
        }

        // Contato do responsável
        public function setContatoResponsavel($contatoResponsavel) {
            $this->contatoResponsavel = $contatoResponsavel;
        }
        public function getContatoResponsavel() {
            return $this->contatoResponsavel;
        }

        // Endereço
        public function setEndereco($endereco) {
            $this->endereco = $endereco;
        }
        public function getEndereco() {
            return $this->endereco;
        }

        // Email do responsável
        public function setEmailResponsavel($emailResponsavel) {
            $this->emailResponsavel = $emailResponsavel;
        }
        public function getEmailResponsavel() {
            return $this->emailResponsavel;
        }

        // Tipo sanguíneo
        public function setTipoSanguineo($tipoSanguineo) {
            $this->tipoSanguineo = $tipoSanguineo;
        }
        public function getTipoSanguineo() {
            return $this->tipoSanguineo;
        }

        // ID da turma
        public function setIdTurma($idTurma) {
            $this->idTurma = $idTurma;
        }
        public function getIdTurma() {
            return $this->idTurma;
        }
    }
?>