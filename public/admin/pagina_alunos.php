<?php
    require_once '../../vendor/autoload.php';
    use src\controller\alunoController;
    $controller = new alunoController();
    $alunos = json_decode($controller->list(), true);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->save();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Alunos</title>
    <link rel="stylesheet" href="../assets/css/global.css">
    <style>
    </style>
</head>
<body>




    <div class="card table-section grid grid-1x">
        
        <div class="grid polar-grid">
            <h2>Lista de alunos</h2>
            <button class="button" onclick="showForm()" id="formbutton">Novo aluno</button>
        </div>



        <form action="" method="POST" class="subcard grid grid-1x" id="new" style="display: none;">
            <div class="grid button-grid">
                <input type="text" name="matricula" placeholder="Digite a matrícula" required>
                <input type="text" name="nome" placeholder="Digite o nome" required>
                <input type="text" name="sobrenome" placeholder="Digite o sobrenome" required>
                <input type="text" name="cpf" placeholder="Digite o CPF" required>
            </div>
            <div class="grid button-grid">
                <input type="date" name="data_nascimento" placeholder="Data de nascimento" required>
                <input type="text" name="contato_responsavel" placeholder="Digite o contato do responsável" required>
                <input type="text" name="endereco" placeholder="Digite o endereço" required>
                <input type="email" name="email_responsavel" placeholder="Digite o e-mail do responsável" required>
            </div>
            <div class="grid polar-grid">
                <div class="grid button-grid">
                    <input type="text" name="tipo_sanguineo" placeholder="Digite o tipo sanguíneo" required>
                    <input type="number" name="id_turma" placeholder="Digite o ID da turma" required>
                </div>
                <button type="submit">Salvar</button>
            </div>
        </form>




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
    <script>
        function showForm() {
            const form = document.getElementById('new');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'grid';
            } else {
                form.style.display = 'none';
            }
        }
    </script>
</body>
</html>