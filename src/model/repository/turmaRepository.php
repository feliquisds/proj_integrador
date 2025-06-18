<?php
    namespace src\model\repository;
    use src\config\connection;
    use src\model\entity\turma;
    use PDO;

    class turmaRepository {
        private $conn;

        public function __construct() {
            $this->conn = new connection();
            $this->conn = $this->conn->getConnection();
        }

        public function list() {
            $sql = "SELECT * FROM Turmas";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        public function save(turma $turma) {
            $query = "INSERT INTO Turmas (
                NumTurma,
                LetraTurma,
                AnoLetivo
            ) VALUES (
                :num_turma,
                :letra_turma,
                :ano_letivo
            )";

            $stmt = $this->conn->prepare($query);

            $numTurma = $turma->getNumTurma();
            $letraTurma = $turma->getLetraTurma();
            $anoLetivo = $turma->getAnoLetivo();

            $stmt->bindParam(":num_turma", $numTurma);
            $stmt->bindParam(":letra_turma", $letraTurma);
            $stmt->bindParam(":ano_letivo", $anoLetivo);

            $stmt->execute();
        }



    }
?>
