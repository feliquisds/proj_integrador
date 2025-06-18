<?php
    namespace src\config;
    require_once '../../vendor/autoload.php';
    use src\config\connection;
    use PDO;
    
    $db = new connection();
    $connection = $db->getConnection();
    session_start();

    $email = trim($_POST['email']);
    $senha = hash('sha512', $_POST['password']);

    $query = "SELECT * FROM Usuarios WHERE Email = :email AND Senha = :senha";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha);
    $stmt->execute();

    $info = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($info['Email'] == $email && $info['Senha'] == $senha)
    {
        $_SESSION['usuario'] = array("email" => $info['Email'],
                                     "senha" => $info['Senha'],
                                     "tipo" => $info['Tipo'],
                                     "id_prof" => $info['ID_Professor']);
        header("Location: ../../public/general/dashboard.html");
    }
    else
    {
        header("Location: ../../public/index.html");
    }
?>