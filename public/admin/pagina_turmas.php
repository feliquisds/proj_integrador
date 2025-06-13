<?php
    require_once "../../controller/TurmaController.php";
    $controller = new TurmaController();
    $turmas = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Turmas</title>
    <link rel="stylesheet" href="../../assets/css/global.css">

</head>

<body>
    <div class="grid grid-1x">
        <h1 class="page-title">Gerenciamento de Turmas</h1>


        <div class="card table-section">
            <h2>Lista de Turmas</h2>

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
    </div>


</body>
</html>
