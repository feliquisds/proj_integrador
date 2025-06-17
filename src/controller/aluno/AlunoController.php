<?php
    namespace src\controller\aluno;
    use src\model\entity\Aluno;
    use src\model\repository\alunoRepository;
    
    class alunoController {
        private $alunoRepo;
        
        public function __construct() {
            $this->alunoRepo = new alunoRepository();
        }
        
        public function listar() {
            return $this->alunoRepo->listarAlunos();
        }
        
        // public function save() {
            //     return $this->alunoRepo->save();
            // }
            
        public function save() {
            $viewPath = __DIR__ . '/../../../public/admin/pagina_alunos.php';
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
                    $this->alunoRepo->save($aluno);
                    return $this->alunoRepo->listarAlunos();
                    
                    // render('../../../public/admin/gestaoAcademica.html');
                    // include '../../../public/admin/gestaoAcademica.php';
                    // include $viewPath;

                    // document.getElementById('contentFrame').contentDocument.location.reload(true);

                    
                } else {
                    echo "Nenhum dado recebido do formulário.";
                }
            } else {
                echo "Método inválido.";
            }
        }   
    }
?>
