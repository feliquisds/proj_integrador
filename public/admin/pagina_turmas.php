<?php
    require_once '../../vendor/autoload.php';
    use src\controller\turmaController;
    $controller = new turmaController();
    $turmas = json_decode($controller->list(), true);
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
        <h2>Lista de turmas</h2>
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
</body>
</html>
