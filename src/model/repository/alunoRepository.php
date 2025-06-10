<?php
include_once(__DIR__ . '/../../config/connection.php');
use src\models\entity\aluno;
// use PDO;

class alunoRepository {
    private $conn;

    public function __construct() {
        $this->conn = $GLOBALS['connection'];
    }

    public function listarAlunos() {
        $sql = "SELECT * FROM Alunos";
        $stmt = $this -> conn -> prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save(Aluno $aluno) {
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
    
        // Atribuição dos valores a variáveis locais
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
    
        // bindParam exige referência de variáveis
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
    



    // Aqui podem ser adicionados métodos como:
    // adicionarAluno(), atualizarAluno(), deletarAluno()...
}
?>
