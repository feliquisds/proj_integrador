<?php
    namespace src\model\repository;
    use src\config\connection;
    use src\model\entity\professor;

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

        public function save(professor $professor) {
            $query = "INSERT INTO Professores (
                Nome,
                Sobrenome,
                DataNascimento,
                CPF,
                Contato,
                Email
            ) VALUES (
                :nome,
                :sobrenome,
                :data_nascimento,
                :cpf,
                :contato,
                :email
            )";

            $stmt = $this->conn->prepare($query);

            $nome = $professor->getNome();
            $sobrenome = $professor->getSobrenome();
            $dataNascimento = $professor->getDataNascimento();
            $cpf = $professor->getCPF();
            $contato = $professor->getContato();
            $email = $professor->getEmail();

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":sobrenome", $sobrenome);
            $stmt->bindParam(":data_nascimento", $dataNascimento);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":contato", $contato);
            $stmt->bindParam(":email", $email);

            $stmt->execute();
        }

        /**
         * Retorna um array associativo com o professor de dado ID
         */
        public function findById(int $id): array
        {
            $sql = "
                SELECT
                    ID,
                    nome             AS nome,
                    sobrenome        AS sobrenome,
                    DataNascimento   AS data_nascimento,
                    CPF              AS cpf,
                    Contato          AS contato,
                    Email            AS email
                FROM professores
                WHERE ID = :id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        /**
         * Atualiza os campos de um professor
         */
        public function update(
            int $id,
            string $nome,
            string $sobrenome,
            string $dataNascimento,
            string $cpf,
            string $contato,
            string $email
        ): bool {
            $sql = "
                UPDATE professores SET
                    nome           = :nome,
                    sobrenome      = :sobrenome,
                    DataNascimento = :dataNascimento,
                    CPF            = :cpf,
                    Contato        = :contato,
                    Email          = :email
                WHERE ID = :id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome',           $nome);
            $stmt->bindParam(':sobrenome',      $sobrenome);
            $stmt->bindParam(':dataNascimento', $dataNascimento);
            $stmt->bindParam(':cpf',            $cpf);
            $stmt->bindParam(':contato',        $contato);
            $stmt->bindParam(':email',          $email);
            $stmt->bindParam(':id',             $id, PDO::PARAM_INT);
            return $stmt->execute();
        }

        public function delete(int $id): bool
        {
            $sql  = "DELETE FROM professores WHERE ID = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }


    }
?>
