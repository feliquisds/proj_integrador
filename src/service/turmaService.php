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

        /**
         * @param int $id
         * @return array dados da turma
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
                (int) $data['id'],
                (int) $data['num_turma'],
                $data['letra_turma'],
                $data['ano_letivo']
            );
        }


    }
?>
