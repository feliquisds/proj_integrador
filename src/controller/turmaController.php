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


    }
?>
