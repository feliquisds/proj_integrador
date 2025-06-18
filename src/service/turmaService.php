<?php
    namespace src\service;
    use src\model\entity\Turma;
    use src\model\repository\turmaRepository;
    
    class turmaService {
        private $repo;
        
        public function __construct() {
            $this->repo = new turmaRepository();
        }

        public function list() {
            return $this->repo->list();
        }

        public function save($data) {
            $turma = new turma();

            $turma->setNumTurma($data['num_turma']);
            $turma->setLetraTurma($data['letra_turma']);
            $turma->setAnoLetivo($data['ano_letivo']);

            $this->repo->save($turma);
        }

    }
?>
