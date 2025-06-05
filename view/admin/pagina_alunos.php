<?php
    require_once "../../controller/AlunoController.php";

    $controller = new AlunoController();
    $alunos = $controller->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Alunos</title>
    <link rel="stylesheet" href="../../assets/css/global.css">
</head>

<body>
    <div class="grid grid-1x">
        <h1 class="page-title">Gerenciamento de Alunos</h1>

        <div class="card table-section">

            
            
            
            
            
            
            <h2>Lista de Alunos</h2>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Matricula</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>CPF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach ($alunos as $aluno): ?>
                        <tr>
                            <td><?= htmlspecialchars($aluno['ID']) ?></td>
                            <td><?= htmlspecialchars($aluno['Matricula']) ?></td>
                            <td><?= htmlspecialchars($aluno['Nome']) ?></td>
                            <td><?= htmlspecialchars($aluno['Sobrenome']) ?></td>
                            <td><?= htmlspecialchars($aluno['CPF']) ?></td>
                            <td><a href="#">Editar</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    
                </table>



                
                
            </div>
            <button class="button" onclick="mostrarFormulario()">Novo Aluno</button>
        </div>
    </body>
</html>
