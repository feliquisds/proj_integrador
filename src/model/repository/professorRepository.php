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
    }
?>
