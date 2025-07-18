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

        /**
         * @param int $id
         * @return array dados do professor
         */
        public function find(int $id): array
        {
            return $this->repo->findById($id);
        }

        /**
         * @param array $data ($_POST)
         * @return bool
         */
        public function update(array $data): bool
        {
            return $this->repo->update(
                (int)    $data['id'],
                $data['nome'],
                $data['sobrenome'],
                $data['data_nascimento'],
                $data['cpf'],
                $data['contato'],
                $data['email']
            );
        }

        /**
         * @param int $id
         * @return bool
         */
        public function delete(int $id): bool
        {
            return $this->repo->delete($id);
        }

    }
?>
