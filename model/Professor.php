<?php
include_once(__DIR__ . '/../config/connection.php');

class Professor {
    private $conn;

    public function __construct() {
        $this->conn = $GLOBALS['connection'];
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
