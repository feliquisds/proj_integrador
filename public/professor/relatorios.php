<?php

session_start();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['usuario']['tipo'])) {
    header("Location: ../index.html");
    exit();
}

$user_id = $_SESSION['usuario']['id_prof'];




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/overrides/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../assets/js/relatorios.js"></script>
</head>

<body>
    <div class="grid grid-1x">
        <h1>
            Bom dia, 
            <?php echo $user_id; ?> 
        </h1>
        <div class="grid grid-2x-2-1">
            <div class="grid grid-1x-10px card">
                <h2>Notas</h2>
                <canvas id="chartNotas"></canvas>
            </div>
            <div class="grid grid-1x-10px card">
                <h2>Frequência</h2>
                <canvas id="chartFrequencia"></canvas>
            </div>
            <div class="grid grid-1x-10px card">
                <div class="grid button-grid">
                    <h2>Calendário</h2>
                    <h5>Maio</h5>
                </div>
                <div class="calendar" id="calendar-date">Carregando...</div>
            </div>
            <div class="grid grid-1x-10px card">
                <h2>Eventos</h2>
                <div class="grid grid-1x-10px">
                    <div class="subcard">Passeio ao ar livre</div>
                    <div class="subcard">Tech Rock</div>
                    <div class="subcard">Excursão</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>