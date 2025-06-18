<?php
    namespace src\service;
    use src\model\entity\Professor;
    use src\model\repository\professorRepository;
    
    class professorService {
        private $repo;
        
        public function __construct() {
            $this->repo = new professorRepository();
        }

        public function list() {
            return $this->repo->list();
        }


        public function save($data) {
            $professor = new professor();

            $professor->setNome($data['nome']);
            $professor->setSobrenome($data['sobrenome']);
            $professor->setDataNascimento($data['data_nascimento']);
            $professor->setCPF($data['cpf']);
            $professor->setContato($data['contato']);
            $professor->setEmail($data['email']);

            $this->repo->save($professor);
        }

    }
?>
