<?php
    require_once "../../src/assets/controller/aluno/AlunoController.php";
    // include_once "../../routes/routes.php";

    $controller = new AlunoController();
    $alunos = $controller->listar();
    // $controller->save();

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Alunos</title>
    <link rel="stylesheet" href="../../src/assets/css/global.css">
    <style>
        body{
            display: flex;
            flex-direction: column;
        }
    </style>
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




        
        <form action="../../src/assets/controller/aluno/salvar_aluno.php" method="POST">
            <input type="text" name="matricula" placeholder="Digite a matrícula" required>
            <input type="text" name="nome" placeholder="Digite o nome" required>
            <input type="text" name="sobrenome" placeholder="Digite o sobrenome" required>
            <input type="text" name="cpf" placeholder="Digite o CPF" required>
            <input type="date" name="data_nascimento" placeholder="Data de nascimento" required>
            <input type="text" name="contato_responsavel" placeholder="Digite o contato do responsável" required>
            <input type="text" name="endereco" placeholder="Digite o endereço" required>
            <input type="email" name="email_responsavel" placeholder="Digite o e-mail do responsável" required>
            <input type="text" name="tipo_sanguineo" placeholder="Digite o tipo sanguíneo" required>
            <input type="number" name="id_turma" placeholder="Digite o ID da turma" required>
            <button type="submit">Salvar</button>
        </form>








    </body>
</html>
