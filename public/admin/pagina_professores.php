<?php
    require_once '../../vendor/autoload.php';
    use src\controller\professorController;
    $controller = new professorController();
    $professores = json_decode($controller->list(), true);
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
        <h2>Lista de professores</h2>
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
</body>
</html>
