<?php

include_once(__DIR__ . '/../model/Turma.php');


class TurmaController {
    private $turmaModel;

    public function __construct() {
        $this->turmaModel = new Turma();
    }

    public function listar() {
        return $this->turmaModel->listarTurmas();
    }
}
?>
