<?php
    require_once "connection.php";
    session_start();

    $email = trim($_POST['email']);
    $senha = hash('sha512', $_POST['password']);

    $query = "SELECT * FROM Usuarios WHERE Email = '$email' AND Senha = '$senha'";

    $info = $connection->query($query)->fetch();

    if ($info['Email'] == $email && $info['Senha'] == $senha)
    {
        $_SESSION['usuario'] = array("email" => $info['Email'],
                                     "senha" => $info['Senha'],
                                     "tipo" => $info['Tipo']);
        header("Location: ../dashboard.html");
    }
    else
    {
        header("Location: ../index.html");
    }