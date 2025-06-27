<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once '../../vendor/autoload.php';
    use src\controller\turmaController;
    $controller = new turmaController();
    $turmas = json_decode($controller->list(), true);
    $found      = null;

// ─── Tratamento de POST: find / update / save ───
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        switch ($_POST['action'] ?? '') {
            case 'find':
                // busca e armazena em $found
                $tmp   = json_decode($controller->find((int) $_POST['id']), true);
                $found = $tmp[0] ?? null;
                break;

            case 'update':
                // atualiza e recarrega lista
                $controller->update($_POST);
                header('Location: pagina_turmas.php');
                exit;
            
            case 'delete':
                $controller->delete((int) $_POST['id']);
                header('Location: pagina_turmas.php');
                exit;    
            
            default:
                // cria nova turma
                $controller->save($_POST);
                header('Location: pagina_turmas.php');
                exit;
        }
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
            <button onclick="showFindForm()">Editar turma</button>
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

        <form method="POST" id="findForm" style="display:none; margin:1em 0;">
            <input type="hidden" name="action" value="find">
            <label for="id_find">ID da Turma</label>
            <input id="id_find" type="number" name="id" placeholder="Informe o ID" required>
            <button type="submit">Buscar</button>
            <button type="button" onclick="hideFindForm()">Cancelar</button>
        </form>

        <?php if ($found): ?>
            <form method="POST" id="updateForm" style="display:grid; gap:1em; margin:1em 0;">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id"     value="<?= htmlspecialchars($found['ID']) ?>">

                <div class="form-group">
                <label for="num_turma">Número da Turma</label>
                <input
                    id="num_turma"
                    type="number"
                    name="num_turma"
                    value="<?= htmlspecialchars($found['num_turma']) ?>"
                    required
                >
                </div>

                <div class="form-group">
                <label for="letra_turma">Letra da Turma</label>
                <input
                    id="letra_turma"
                    type="text"
                    name="letra_turma"
                    value="<?= htmlspecialchars($found['letra_turma']) ?>"
                    required
                >
                </div>

                <div class="form-group">
                <label for="ano_letivo">Ano Letivo</label>
                <input
                    id="ano_letivo"
                    type="text"
                    name="ano_letivo"
                    value="<?= htmlspecialchars($found['ano_letivo']) ?>"
                    required
                >
                </div>

                <div class="form-actions">
                <button type="submit">Atualizar</button>
                <button type="submit"name="action"value="delete"onclick="return confirm('Confirma exclusão deste aluno?')"style="background:#e74c3c; color:white;">Excluir</button>
                <button type="button" onclick="cancelUpdate()">Cancelar</button>
                </div>
            </form>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NumTurma</th>
                    <th>LetraTurma</th>
                    <th>AnoLetivo</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($turmas as $turma): ?>
                    <tr>
                        <td><?= htmlspecialchars($turma['ID']) ?></td>
                        <td><?= htmlspecialchars($turma['NumTurma']) ?></td>
                        <td><?= htmlspecialchars($turma['LetraTurma']) ?></td>
                        <td><?= htmlspecialchars($turma['AnoLetivo']) ?></td>
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
    <script>
        function showFindForm()   { document.getElementById('findForm').style.display  = 'block'; }
        function hideFindForm()   { document.getElementById('findForm').style.display  = 'none';  }
        function cancelUpdate() {
            document.getElementById('updateForm').style.display = 'none';
            hideFindForm();
        }
        <?php if ($found): ?>
            document.getElementById('updateForm').style.display = 'grid';
        <?php endif; ?>
    </script>


</body>
</html>
