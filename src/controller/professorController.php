<?php
    namespace src\controller;
    use src\service\professorService;

    class professorController {
        private $service;

        public function __construct() {
            $this->service = new professorService();
        }

        public function list() {
            return json_encode($this->service->list());
        }

        public function save() {
            return json_encode($this->service->save($_POST), true);
        }

            /**
     * Busca um professor por ID e retorna JSON
     * @param int $id
     * @return string
     */
    public function find(int $id): string
    {
        $result = $this->service->find($id);
        return json_encode($result);
    }

    /**
     * Atualiza um professor existente
     * @param array $data ($_POST)
     * @return bool
     */
    public function update(array $data): bool
    {
        return $this->service->update($data);
    }


    }
?>
