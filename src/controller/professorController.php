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
    }
?>
