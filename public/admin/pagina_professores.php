<?php

    require_once '../../vendor/autoload.php';
    use src\controller\professorController;
    $controller = new professorController();
    $professores = json_decode($controller->list(), true);
    $found = null; // variável para guardar o professor encontrado

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          switch ($_POST['action'] ?? '') {
            case 'find':
                // 1) busca pelo ID e carrega em $found
                $tmp   = json_decode(
                    $controller->find((int) $_POST['id']),
                    true
                );
                $found = $tmp[0] ?? null;
                break;

            case 'update':
                // 2) atualiza e volta à lista
                $controller->update($_POST);
                header('Location: pagina_professores.php');
                exit;

            case 'delete':
                $controller->delete((int) $_POST['id']);
                header('Location: pagina_professores.php');
                exit;

            default:
                // 3) salva novo professor
                $controller->save($_POST);
                header('Location: pagina_professores.php');
                exit;
          }
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
            <button class="button" onclick="showFindForm()">Editar professor</button>
        </div>

         <form method="POST" id="findForm" style="display:none; margin:1em 0;">
            <input type="hidden" name="action" value="find">
            <input type="number" name="id" placeholder="ID do professor" required>
            <button type="submit">Buscar</button>
            <button type="button" onclick="hideFindForm()">Cancelar</button>
         </form> 

         <?php if ($found): ?>
          <form method="POST" id="updateForm" style="display:grid; gap:.5em; margin:1em 0;">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id"     value="<?= htmlspecialchars($found['ID']) ?>">
            <label for="nome">Nome</label>
            <input type="text"   name="nome"            value="<?= htmlspecialchars($found['nome']) ?>"            placeholder="Nome"            required>
            <label for="nome">Sobrenome</label>
            <input type="text"   name="sobrenome"       value="<?= htmlspecialchars($found['sobrenome']) ?>"       placeholder="Sobrenome"       required>
            <label for="nome">Data de Nascimento</label>
            <input type="date"   name="data_nascimento" value="<?= htmlspecialchars($found['data_nascimento']) ?>" placeholder="Data de Nasc."   required>
            <label for="nome">CPF</label>
            <input type="text"   name="cpf"             value="<?= htmlspecialchars($found['cpf']) ?>"             placeholder="CPF"             required>
            <label for="nome">Contato</label>
            <input type="text"   name="contato"         value="<?= htmlspecialchars($found['contato']) ?>"         placeholder="Contato"         required>
            <label for="nome">Email</label>
            <input type="email"  name="email"           value="<?= htmlspecialchars($found['email']) ?>"           placeholder="Email"           required>

            <div>
              <button type="submit">Atualizar</button>
              <button type="submit"name="action"value="delete"onclick="return confirm('Confirma exclusão deste aluno?')"style="background:#e74c3c; color:white;">Excluir</button>
              <button type="button" onclick="cancelUpdate()">Cancelar</button>
            </div>
          </form>
        <?php endif; ?>


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
      // Se já vierem dados em $found, mostramos automaticamente
      <?php if ($found): ?>
        document.getElementById('updateForm').style.display = 'grid';
      <?php endif; ?>
    </script>


</body>
</html>
