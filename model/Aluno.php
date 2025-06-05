<?php
include_once(__DIR__ . '/../config/connection.php');

class Aluno {
    private $conn;

    public function __construct() {
        $this->conn = $GLOBALS['connection'];
    }

    public function listarAlunos() {
        $sql = "SELECT * FROM Alunos";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Aqui podem ser adicionados métodos como:
    // adicionarAluno(), atualizarAluno(), deletarAluno()...
}
?>
