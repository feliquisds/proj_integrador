<?php
    namespace src\model\repository;
    use src\config\connection;
    use src\models\entity\professor;
    use PDO;

    class professorRepository {
        private $conn;

        public function __construct() {
            $this->conn = new connection();
            $this->conn = $this->conn->getConnection();
        }

        public function list() {
            $sql = "SELECT * FROM Professores";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
