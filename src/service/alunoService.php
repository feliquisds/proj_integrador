<?php
    namespace src\service;
    use src\model\entity\Aluno;
    use src\model\repository\alunoRepository;
    
    class alunoService {
        private $repo;
        
        public function __construct() {
            $this->repo = new alunoRepository();
        }
        
        public function save($data) {
            $aluno = new aluno();

            $aluno->setMatricula($data['matricula']);
            $aluno->setNome($data['nome']);
            $aluno->setSobrenome($data['sobrenome']);
            $aluno->setCpf($data['cpf']);
            $aluno->setDataNascimento($data['data_nascimento']);
            $aluno->setContatoResponsavel($data['contato_responsavel']);
            $aluno->setEndereco($data['endereco']);
            $aluno->setEmailResponsavel($data['email_responsavel']);
            $aluno->setTipoSanguineo($data['tipo_sanguineo']);
            $aluno->setIdTurma($data['id_turma']);

            $this->repo->save($aluno);
        }

        public function update($data) {
            $aluno = new aluno();

            $aluno->setID($data['id']);
            $aluno->setMatricula($data['matricula']);
            $aluno->setNome($data['nome']);
            $aluno->setSobrenome($data['sobrenome']);
            $aluno->setCpf($data['cpf']);
            $aluno->setDataNascimento($data['data_nascimento']);
            $aluno->setContatoResponsavel($data['contato_responsavel']);
            $aluno->setEndereco($data['endereco']);
            $aluno->setEmailResponsavel($data['email_responsavel']);
            $aluno->setTipoSanguineo($data['tipo_sanguineo']);
            $aluno->setIdTurma($data['id_turma']);

            $this->repo->update($aluno);
        }

        public function list() {
            return $this->repo->list();
        }

        public function find($id) {
            return $this->repo->find($id);
        }
            
    }
?>
