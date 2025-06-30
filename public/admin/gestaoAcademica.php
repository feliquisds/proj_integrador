<?php
    
    session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão Acadêmica</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/overrides/dashboard.css">
    <style>
    </style>
    <script>
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
        }
    </script>
</head>

<body>
    <div class="grid grid-1x">
        <div class="header">
            <h1>Gestão Acadêmica</h1>
        </div>

        <div class="grid button-grid">
                <a href="pagina_alunos.php" class="card grid grid-1x" target="subframe">
                    <div class=""><span class="material">person</span></div>
                    <h2>Alunos</h2>
                    <p>Gerenciar cadastro e informações dos alunos</p>
                </a>

                <a href="pagina_professores.php" class="card grid grid-1x" target="subframe">
                    <div class=""><span class="material">co_present</span></div>
                    <h2>Professores</h2>
                    <p>Gerenciar cadastro e informações dos professores</p>
                </a>

                <a href="pagina_turmas.php" class="card grid grid-1x" target="subframe">
                    <div class=""><span class="material">groups</span></div>
                    <h2>Turmas</h2>
                    <p>Gerenciar turmas e distribuição de alunos</p>
                </a>
        </div>
        <iframe frameborder="0" name="subframe" id="subframe" onload="resizeIframe(this)"></iframe>
    </div>
</body>
</html>