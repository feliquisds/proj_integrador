<?php
    namespace src\controller\professor;
    use src\model\repository\professorRepository;

    class professorController {
        private $professorRepo;

        public function __construct() {
            $this->professorRepo = new professorRepository();
        }

        public function listar() {
            return $this->professorRepo->listarProfessor();
        }
    }
?>
