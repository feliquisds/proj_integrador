<?php
namespace src\models\entity;
// Matricula, Nome, Sobrenome, CPF, DataNascimento, ContatoResponsavel, Endereco, EmailResponsavel, TipoSanguineo, ID_Turma
class Aluno{
    private $id;
    private $nome;
    private $genero;

//    public function __construct($nome, $genero){
//         $this->nome = $nome;
//         $this->genero = $genero;
//     } 

    // Matricula
    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    public function getMatricula(){
        return $this->matricula;
    }

    // Nome
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    // Sobrenome
    public function setSobrenome($sobrenome){
        $this->sobrenome = $sobrenome;
    }

    public function getSobrenome(){
        return $this->sobrenome;
    }

    // CPF
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getCpf(){
        return $this->cpf;
    }

    // Data de Nascimento
    public function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }

    public function getDataNascimento(){
        return $this->dataNascimento;
    }

    // Contato do Responsável
    public function setContatoResponsavel($contatoResponsavel){
        $this->contatoResponsavel = $contatoResponsavel;
    }

    public function getContatoResponsavel(){
        return $this->contatoResponsavel;
    }

    // Endereço
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    // Email do Responsável
    public function setEmailResponsavel($emailResponsavel){
        $this->emailResponsavel = $emailResponsavel;
    }

    public function getEmailResponsavel(){
        return $this->emailResponsavel;
    }

    // Tipo Sanguíneo
    public function setTipoSanguineo($tipoSanguineo){
        $this->tipoSanguineo = $tipoSanguineo;
    }

    public function getTipoSanguineo(){
        return $this->tipoSanguineo;
    }

    // ID da Turma
    public function setIdTurma($idTurma){
        $this->idTurma = $idTurma;
    }

    public function getIdTurma(){
        return $this->idTurma;
    }

}
?>