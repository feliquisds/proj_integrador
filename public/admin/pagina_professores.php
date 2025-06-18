<?php

    require_once '../../vendor/autoload.php';
    use src\controller\professorController;
    $controller = new professorController();
    $professores = json_decode($controller->list(), true);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->save();
        }




?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Professor</title>
    <link rel="stylesheet" href="../assets/css/global.css">
</head>
<body>

    <div class="card table-section grid grid-1x">

        <div class="grid polar-grid">
            <h2>Lista de Professor</h2>
            <button class="button" onclick="showForm()" id="formbutton">Novo Professor</button>
        </div>

        <form action="" method="POST" class="subcard grid grid-1x" id="new" style="display: none;">
            <div class="grid button-grid">
                <input type="text" name="nome" placeholder="Digite o nome" required>
                <input type="text" name="sobrenome" placeholder="Digite o sobrenome" required>
                <input type="text" name="cpf" placeholder="Digite o CPF" required>
            </div>
            <div class="grid button-grid">
                <input type="date" name="data_nascimento" placeholder="Data de nascimento" required>
                <input type="text" name="contato" placeholder="Digite o contato" required>
                <input type="email" name="email" placeholder="Digite o e-mail" required>
            </div>
            <div class="grid polar-grid">
                <button type="submit">Salvar</button>
            </div>
        </form>


        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Data de Nascimento</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($professores as $prof): ?>
                    <tr>
                        <td><?= htmlspecialchars($prof['ID']) ?></td>
                        <td><?= htmlspecialchars($prof['Nome']) ?></td>
                        <td><?= htmlspecialchars($prof['Sobrenome']) ?></td>
                        <td><?= htmlspecialchars($prof['DataNascimento']) ?></td>
                        <td><?= htmlspecialchars($prof['CPF']) ?></td>
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
