<?php
    namespace src\model\repository;
    use src\config\connection;
    use src\models\entity\turma;
    use PDO;

    class turmaRepository {
        private $conn;

        public function __construct() {
            $this->conn = new connection();
            $this->conn = $this->conn->getConnection();
        }

        public function listarTurmas() {
            $sql = "SELECT * FROM Turmas";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Aqui podem ser adicionados métodos como:
        // adicionarAluno(), atualizarAluno(), deletarAluno()...
    }
?>
