<?php
    namespace src\controller\turma;
    use src\model\repository\turmaRepository;

    class turmaController {
        private $turmaRepo;

        public function __construct() {
            $this->turmaRepo = new turmaRepository();
        }

        public function listar() {
            return $this->turmaRepo->listarTurmas();
        }
    }
?>
