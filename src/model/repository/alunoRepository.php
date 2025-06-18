<?php
    namespace src\model\repository;
    use src\config\connection;
    use src\model\entity\aluno;
    use PDO;

    class alunoRepository {
        private $conn;

        public function __construct() {
            $this->conn = new connection();
            $this->conn = $this->conn->getConnection();
        }

        public function save(aluno $aluno) {
            $query = "INSERT INTO Alunos (
                Matricula,
                Nome,
                Sobrenome,
                CPF,
                DataNascimento,
                ContatoResponsavel,
                Endereco,
                EmailResponsavel,
                TipoSanguineo,
                ID_Turma
            ) VALUES (
                :matricula,
                :nome,
                :sobrenome,
                :cpf,
                :data_nascimento,
                :contato_responsavel,
                :endereco,
                :email_responsavel,
                :tipo_sanguineo,
                :id_turma
            )";
        
            $stmt = $this->conn->prepare($query);
        
            $matricula = $aluno->getMatricula();
            $nome = $aluno->getNome();
            $sobrenome = $aluno->getSobrenome();
            $cpf = $aluno->getCpf();
            $dataNascimento = $aluno->getDataNascimento();
            $contatoResponsavel = $aluno->getContatoResponsavel();
            $endereco = $aluno->getEndereco();
            $emailResponsavel = $aluno->getEmailResponsavel();
            $tipoSanguineo = $aluno->getTipoSanguineo();
            $idTurma = $aluno->getIdTurma();
        
            $stmt->bindParam(":matricula", $matricula);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":sobrenome", $sobrenome);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":data_nascimento", $dataNascimento);
            $stmt->bindParam(":contato_responsavel", $contatoResponsavel);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->bindParam(":email_responsavel", $emailResponsavel);
            $stmt->bindParam(":tipo_sanguineo", $tipoSanguineo);
            $stmt->bindParam(":id_turma", $idTurma);
        
            $stmt->execute();
        }

        public function update(aluno $aluno) {
            $query = "UPDATE Alunos SET
                Matricula = :matricula,
                Nome = :nome,
                Sobrenome = :sobrenome,
                CPF = :cpf,
                DataNascimento = :data_nascimento,
                ContatoResponsavel = :contato_responsavel,
                Endereco = :endereco,
                EmailResponsavel = :email_responsavel,
                TipoSanguineo = :tipo_sanguineo,
                ID_Turma = :id_turma
            WHERE id = :id";
        
            $stmt = $this->conn->prepare($query);
            
            $id = $aluno->getID();
            $matricula = $aluno->getMatricula();
            $nome = $aluno->getNome();
            $sobrenome = $aluno->getSobrenome();
            $cpf = $aluno->getCpf();
            $dataNascimento = $aluno->getDataNascimento();
            $contatoResponsavel = $aluno->getContatoResponsavel();
            $endereco = $aluno->getEndereco();
            $emailResponsavel = $aluno->getEmailResponsavel();
            $tipoSanguineo = $aluno->getTipoSanguineo();
            $idTurma = $aluno->getIdTurma();
        
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":matricula", $matricula);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":sobrenome", $sobrenome);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":data_nascimento", $dataNascimento);
            $stmt->bindParam(":contato_responsavel", $contatoResponsavel);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->bindParam(":email_responsavel", $emailResponsavel);
            $stmt->bindParam(":tipo_sanguineo", $tipoSanguineo);
            $stmt->bindParam(":id_turma", $idTurma);
        
            $stmt->execute();
        }

        public function list() {
            $sql = "SELECT * FROM Alunos";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function find($id) {
            $sql = "SELECT * FROM Alunos WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
