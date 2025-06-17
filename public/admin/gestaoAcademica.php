<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão Acadêmica</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/overrides/dashboard.css">
    <style>
        .button {
            padding: 10vh 1vw;
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .grid {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="grid grid-1x">
        <div class="header">
            <h1>Gestão Acadêmica</h1>
        </div>

        <div class="grid button-grid">
                <a href="pagina_alunos.php" class="button card" >
                    <div class=""><span class="material">person</span></div>
                    <h2>Alunos</h2>
                    <p>Gerenciar cadastro e informações dos alunos</p>
                </a>

                <a href="pagina_professor.php" class="button card">
                    <div class=""><span class="material">co_present</span></div>
                    <h2>Professores</h2>
                    <p>Gerenciar cadastro e informações dos professores</p>
                </a>

                <a href="pagina_professor.php" class="button card">
                    <div class=""><span class="material">groups</span></div>
                    <h2>Turmas</h2>
                    <p>Gerenciar turmas e distribuição de alunos</p>
                </a>
        </div>
    </div>

    
</body>
</html>