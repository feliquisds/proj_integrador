<?php
    namespace src\service;
    use src\model\entity\turma;
    use src\model\repository\turmaRepository;
    
    class turmaService {
        private $repo;
        
        public function __construct() {
            $this->repo = new turmaRepository();
        }

        public function list() {
            return $this->repo->list();
        }
    }
?>
