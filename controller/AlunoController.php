<?php

include_once(__DIR__ . '/../model/Aluno.php');


class AlunoController {
    private $alunoModel;

    public function __construct() {
        $this->alunoModel = new Aluno();
    }

    public function listar() {
        return $this->alunoModel->listarAlunos();
    }
}
?>
