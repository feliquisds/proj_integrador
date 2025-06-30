<?php

session_start();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['usuario']['tipo'])) {
    header("Location: ../index.html");
    exit();
}

$tipo = $_SESSION['usuario']['tipo'];

// Define os arquivos de acordo com o tipo
if ($tipo == "Professor") {
    $sidebar = "../professor/sidebar-prof.html";
    $relatorio = "../professor/relatorios.html";
} 

elseif ($tipo == "Administrador") {
    $sidebar = "../admin/sidebar-admin.html";
    $relatorio = "../admin/gestaoAcademica.php";
} 

else {
    // Se for outro tipo, bloqueia ou redireciona
    echo "Acesso não autorizado.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/global.css">
    <script src="../assets/js/theme.js"></script>
</head>

<body>
    <!-- Menu superior -->
    <div class="top-menu">
        <input id="top-menu-toggle" class="top-menu-toggle" type="checkbox">
        <label class="top-menu-button" for="top-menu-toggle"><span class="hamburger"></span></label>
        <div class="top-menu-overlay">
            <iframe src="<?php echo $sidebar; ?>" frameborder="0"></iframe>
        </div>
    </div>

    <!-- Sidebar lateral -->
    <div class="sidebar">
        <iframe src="<?php echo $sidebar; ?>" frameborder="0"></iframe>
    </div>

    <!-- Conteúdo principal -->
    <iframe src="<?php echo $relatorio; ?>" frameborder="0" name="frame" id="frame"></iframe>

</body>

</html>
