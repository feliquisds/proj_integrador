<?php
    include_once "../../php/connection.php";


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Professor</title>
    <link rel="stylesheet" href="../../css/global.css">
</head>

<body>
    <div class="grid grid-1x">
        <h1 class="page-title">Gerenciamento de Professores</h1>

        <div class="card">
            <h2>Adicionar Professor</h2>
            <div class="grid grid-1x-10px">
                <input type="text" placeholder="Nome do Professor">
                <input type="email" placeholder="Sobrenome do Professor">
                <input type="text" placeholder="Email">
                <input type="text" placeholder="Data de Nascimento">
                <button class="button">Adicionar</button>
            </div>
        </div>

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
                    </tr>
                </thead>

                <tbody>
                    <?php
                        
                        $sql = "SELECT * FROM Professores";
                        $stmt = $connection->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // echo var_dump( $stmt->fetchAll(PDO::FETCH_ASSOC));


                        foreach ($result as $row) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Nome']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Sobrenome']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['DataNascimento']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['CPF']) . "</td>";
                            echo "<td>" . '<a href="#">Editar</a>' . "</td>";
                            // echo "<td>" . . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</body>
</html>
