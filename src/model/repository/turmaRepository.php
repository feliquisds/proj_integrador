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

        /**
         * Retorna um array associativo com a turma de dado ID
         */
        public function findById(int $id): array
        {
            $sql = "
                SELECT
                    ID,
                    NumTurma    AS num_turma,
                    LetraTurma  AS letra_turma,
                    AnoLetivo   AS ano_letivo
                FROM turmas
                WHERE ID = :id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        /**
         * Atualiza os campos de uma turma
         */
        public function update(
            int $id,
            int $num,
            string $letra,
            string $ano
        ): bool {
            $sql = "
                UPDATE turmas SET
                    NumTurma   = :num,
                    LetraTurma = :letra,
                    AnoLetivo  = :ano
                WHERE ID = :id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':num',   $num,   PDO::PARAM_INT);
            $stmt->bindParam(':letra', $letra);
            $stmt->bindParam(':ano',   $ano);
            $stmt->bindParam(':id',    $id,    PDO::PARAM_INT);
            return $stmt->execute();
        }

        public function delete(int $id): bool
        {
            $sql  = "DELETE FROM turmas WHERE ID = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }

    }
?>
