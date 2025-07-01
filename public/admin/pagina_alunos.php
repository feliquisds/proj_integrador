<?php

    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once '../../vendor/autoload.php';
    use src\controller\alunoController;
    $controller = new alunoController();

    $found = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        switch ($_POST['action'] ?? '') {
            case 'find':
                // busca pelo ID informado
                $tmp = json_decode($controller->find($_POST['id']), true);
                $found = $tmp[0] ?? null;
                break;
            case 'update':
                // grava as alterações
                $controller->update();
                // redireciona para limpar POST/mostra lista
                header('Location: pagina_alunos.php');
                exit;
            case 'delete':
                $controller->delete((int) $_POST['id']);
                header('Location: pagina_alunos.php');
                exit;
            default:
                // salva novo registro
                $controller->save();
                header('Location: pagina_alunos.php');
                exit;
        }
    }
    
    // carrega lista atualizada
    $alunos = json_decode($controller->list(), true);
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
            <button class="button" onclick="showEditForm()" id="editbutton">Editar aluno</button>
        </div>



        <form method="POST" id="editForm" style="display:none;">
            <input type="hidden" name="action" value="find">
            <div class="grid button-grid">
                <input type="number" name="id" placeholder="Digite o ID do aluno" required>
            </div>
            <div class="grid polar-grid">
                <button type="submit">Buscar</button>
                <button type="button" onclick="hideEditForm()">Cancelar</button>
            </div>
        </form>

        <?php if ($found): ?>
            <form method="POST" id="updateForm" class="subcard grid grid-1x">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?= htmlspecialchars($found['ID']) ?>">

                <div class="grid button-grid">
                    <label for="nome">Matrícula</label>
                    <input type="text" name="matricula"      value="<?= htmlspecialchars($found['Matricula']) ?>" required>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome"           value="<?= htmlspecialchars($found['Nome']) ?>" required>
                    <label for="nome">Sobrenome</label>
                    <input type="text" name="sobrenome"      value="<?= htmlspecialchars($found['Sobrenome']) ?>" required>
                    <label for="nome">CPF</label>
                    <input type="text" name="cpf"            value="<?= htmlspecialchars($found['CPF']) ?>" required>
                </div>
                <div class="grid button-grid">
                    <label for="nome">Data de nascimento</label>
                    <input type="date"   name="data_nascimento"     value="<?= htmlspecialchars($found['DataNascimento']) ?>" required>
                    <label for="nome">Contato responsável</label>
                    <input type="text"   name="contato_responsavel" value="<?= htmlspecialchars($found['ContatoResponsavel']) ?>" required>
                    <label for="nome">Endereço</label>
                    <input type="text"   name="endereco"            value="<?= htmlspecialchars($found['Endereco']) ?>" required>
                    <label for="nome">Email responsável</label>
                    <input type="email"  name="email_responsavel"   value="<?= htmlspecialchars($found['EmailResponsavel']) ?>" required>
                </div>
                <div class="grid button-grid">
                    <label for="nome">Tipo sanguíneo</label>
                    <input type="text"   name="tipo_sanguineo" value="<?= htmlspecialchars($found['TipoSanguineo']) ?>" required>
                    <label for="nome">ID da turma</label>
                    <input type="number" name="id_turma"        value="<?= htmlspecialchars($found['ID_Turma']) ?>" required>
                </div>
                <div class="grid polar-grid">
                    <button type="submit">Atualizar</button>
                    <button type="submit"name="action"value="delete"onclick="return confirm('Confirma exclusão deste aluno?')"style="background:#e74c3c; color:white;">Excluir</button>
                    <button type="button" onclick="cancelUpdate()">Cancelar</button>
                </div>
            </form>
        <?php endif; ?>


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
        function showEditForm() {
            const f = document.getElementById('editForm');
            f.style.display = 'grid';  // ou 'block' dependendo do seu CSS de grid
        }
        function hideEditForm() {
            const f = document.getElementById('editForm');
            f.style.display = 'none';
        }

        function cancelUpdate() {
            document.getElementById('updateForm').style.display = 'none';
            hideEditForm();
        }
        // <?php if ($found): ?>
        //    echo '<script> document.getElementById("updateForm").style.display = "grid";</script>'
        // <?php endif; ?>
</script>

    

</body>
</html>