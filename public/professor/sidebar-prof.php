<?php

session_start();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['usuario']['tipo'])) {
    header("Location: ../index.html");
    exit();
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/global.css">
</head>

<body>
    <aside>
        <div class="grid grid-1x">
            <img src="../assets/media/diplomado.png" style="width: 120px; height: auto;">
            <div class="grid grid-1x-10px">
                <a href="relatorios.html" target="frame" class="button secondary-button button-left-aligned">
                    <span class="material">dashboard</span>Relatórios
                </a>

                <a href="turmas.html" target="frame" class="button secondary-button button-left-aligned">
                    <span class="material">school</span>Minhas turmas
                </a>

                <a href="atividades.html" target="frame" class="button secondary-button button-left-aligned">
                    <span class="material">assignment</span>Atividades
                </a>

                <a href="mensagens.html" target="frame" class="button secondary-button button-left-aligned">
                    <span class="material">chat_bubble</span>Mensagens
                </a>

                <a href="agendas.html" target="frame" class="button secondary-button button-left-aligned">
                    <span class="material">note_stack</span>Agendas
                </a>
            </div>
        </div>
        <a href="../general/configuracoes.html" target="frame" class="button">
            <span class="material">settings</span>Configurações
        </a>
    </aside>
</body>

</html>