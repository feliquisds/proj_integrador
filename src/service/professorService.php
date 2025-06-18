<?php
    namespace src\service;
    use src\model\entity\professor;
    use src\model\repository\professorRepository;
    
    class professorService {
        private $repo;
        
        public function __construct() {
            $this->repo = new professorRepository();
        }

        public function list() {
            return $this->repo->list();
        }
    }
?>
