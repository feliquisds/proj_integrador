<?php
    require_once "../../src/assets/controller/ProfessorController.php";
   include_once "../../src/assets/routes/routes.php";
    $controller = new ProfessorController();
    $professores = $controller->listar();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Professor</title>
    <link rel="stylesheet" href="../../src/assets/css/global.css">

    <style>
        #form-professor{
            display: none;
        }
    </style>
</head>


<body>
    <div class="grid grid-1x">
        <h1 class="page-title">Gerenciamento de Professores</h1>

        
        <!-- Lista dos Professores -->
        <div class="card table-section">
            <h2>Lista de Professores</h2>
            
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
            <!-- Botão para abrir o formulário -->
            <button class="button" onclick="mostrarFormulario()">Novo Professor</button>
    
            <!-- Formulário de cadastro  -->
            <div class="card" id="form-professor">
                <h2>Adicionar Professor</h2>
                <div class="grid grid-1x-10px">
                    <input type="text" placeholder="Nome do Professor">
                    <input type="email" placeholder="Sobrenome do Professor">
                    <input type="text" placeholder="Email">
                    <input type="text" placeholder="Data de Nascimento">
                    <button class="button">Adicionar</button>
                </div>
            </div>
        </div>

    <!-- Script para abrir e fechar o formulário -->
     <script>
        function mostrarFormulario() {
            const form = document.getElementById('form-professor');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }
    </script> 
</body>
</html>
