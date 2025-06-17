<?php
    namespace src\service\aluno;
    use src\controller\aluno\alunoController;
    $viewPath = __DIR__ . '/../../../public/admin/pagina_alunos.php';
    
    $controller = new alunoController();
    $controller->save();
    include $viewPath;

?>