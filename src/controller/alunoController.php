<?php
    namespace src\controller;
    use src\service\alunoService;

    class alunoController {
        private $service;
        
        public function __construct() {
            $this->service = new alunoService();
        }

        public function save() {
            return json_encode($this->service->save($_POST), true);
        }
        
        public function update() {
            return json_encode($this->service->update($_POST), true);
        }
        
        public function list() {
            return json_encode($this->service->list());
        }
        
        public function find($id) {
            return json_encode($this->service->find($id));
        }
    }
?>
