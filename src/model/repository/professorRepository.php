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

        public function listarProfessor() {
            $sql = "SELECT * FROM Professores";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Aqui podem ser adicionados métodos como:
        // adicionarAluno(), atualizarAluno(), deletarAluno()...
    }
?>
