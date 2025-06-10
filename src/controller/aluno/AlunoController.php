<?php

include_once(__DIR__ . '/../../model/repository/alunoRepository.php');
include_once __DIR__ . '/../../model/entity/aluno.php';

use src\models\entity\Aluno;


class AlunoController {
    private $alunoModel;

    public function __construct() {
        $this->alunoModel = new alunoRepository();
    }

    public function listar() {
        return $this->alunoModel->listarAlunos();
    }

    // public function save() {
    //     return $this->alunoModel->save();
    // }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['matricula'])) {
                $aluno = new Aluno();
                $aluno->setMatricula($_POST['matricula']);
                $aluno->setNome($_POST['nome']);
                $aluno->setSobrenome($_POST['sobrenome']);
                $aluno->setCpf($_POST['cpf']);
                $aluno->setDataNascimento($_POST['data_nascimento']);
                $aluno->setContatoResponsavel($_POST['contato_responsavel']);
                $aluno->setEndereco($_POST['endereco']);
                $aluno->setEmailResponsavel($_POST['email_responsavel']);
                $aluno->setTipoSanguineo($_POST['tipo_sanguineo']);
                $aluno->setIdTurma($_POST['id_turma']);
    
                return $this->alunoModel->save($aluno);

                header("Location: proj_integrador/src/view/dashboard.php");



            } else {
                echo "Nenhum dado recebido do formulário.";
            }
        } else {
            echo "Método inválido.";
        }
    }

    
}
?>
