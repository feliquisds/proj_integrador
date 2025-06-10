<?php

include_once(__DIR__ . '/../model/Professor.php');


class ProfessorController {
    private $professorModel;

    public function __construct() {
        $this->professorModel = new Professor();
    }

    public function listar() {
        return $this->professorModel->listarProfessor();
    }
}
?>
