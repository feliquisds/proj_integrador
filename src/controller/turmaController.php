<?php
    namespace src\controller;
    use src\service\turmaService;

    class turmaController {
        private $service;

        public function __construct() {
            $this->service = new turmaService();
        }

        public function list() {
            return json_encode($this->service->list());
        }

        public function save() {
            return json_encode($this->service->save($_POST), true);
        }

        /**
         * Busca uma turma por ID e retorna JSON
         * @param int $id
         * @return string
         */
        public function find(int $id): string
        {
            return json_encode($this->service->find($id));
        }

        /**
         * Atualiza uma turma existente
         * @param array $data ($_POST)
         * @return bool
         */
        public function update(array $data): bool
        {
            return $this->service->update($data);
        }


    }
?>
