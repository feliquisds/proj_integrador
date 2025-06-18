<?php
namespace src\model\entity;

class professor {
    private $nome;
    private $sobrenome;
    private $DataNascimento;
    private $CPF;
    private $Contato;
    private $Email;

    // Getter e Setter para Nome
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    // Getter e Setter para Sobrenome
    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    // Getter e Setter para DataNascimento
    public function getDataNascimento() {
        return $this->DataNascimento;
    }

    public function setDataNascimento($DataNascimento) {
        $this->DataNascimento = $DataNascimento;
    }

    // Getter e Setter para CPF
    public function getCPF() {
        return $this->CPF;
    }

    public function setCPF($CPF) {
        $this->CPF = $CPF;
    }

    // Getter e Setter para Contato
    public function getContato() {
        return $this->Contato;
    }

    public function setContato($Contato) {
        $this->Contato = $Contato;
    }

    // Getter e Setter para Email
    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
    }
}
?>
