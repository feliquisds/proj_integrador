<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once '../../vendor/autoload.php';
    use src\controller\turmaController;
    $controller = new turmaController();
    $turmas = json_decode($controller->list(), true);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->save();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Turmas</title>
    <link rel="stylesheet" href="../assets/css/global.css">
</head>
<body>


    <div class="card table-section grid grid-1x">



        <div class="grid polar-grid">
            <h2>Lista de Turmas</h2>
            <button class="button" onclick="showForm()" id="formbutton">Nova Turma</button>
        </div>

        <form action="" method="POST" class="subcard grid grid-1x" id="new" style="display: none;">
            <div class="grid button-grid">
                <input type="number" name="num_turma" placeholder="Número da Turma" required>
                <input type="text" name="letra_turma" placeholder="Letra da Turma" required>
                <input type="number" name="ano_letivo" placeholder="Ano Letivo" required>
            </div>
            <div class="grid polar-grid">
                <button type="submit">Salvar</button>
            </div>
        </form>




        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NumTurma</th>
                    <th>LetraTurma</th>
                    <th>AnoLetivo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($turmas as $turma): ?>
                    <tr>
                        <td><?= htmlspecialchars($turma['ID']) ?></td>
                        <td><?= htmlspecialchars($turma['NumTurma']) ?></td>
                        <td><?= htmlspecialchars($turma['LetraTurma']) ?></td>
                        <td><?= htmlspecialchars($turma['AnoLetivo']) ?></td>
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
