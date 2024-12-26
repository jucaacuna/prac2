<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <?php require 'miMenu.php'; ?>

    <section class="container">
        <h1>Noticias</h1>
        <div class="news-lista">

            <!-- Aquí la cosnulta PHP -->
            <?php

            // Conexión a la base de datos
            $conexion = new mysqli('serverBD', 'root', 'jaja', 'prac2');

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Consulta para obtener las noticias
            $sql = "SELECT title, body, dateTime FROM News WHERE newsId = " . $_GET['id'];

            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar cada noticia
                while($row = $result->fetch_assoc()) {
                    echo "\n    <article class='news-item'> \n";
                    echo "      <h2>" . $row["title"] . "</h2> \n";
                    echo "      <p>" . $row["body"] . "</p> \n";
                    echo "      <span class='date'>" . $row["dateTime"] . "</span> \n";
                    echo "    </article> \n";
                }
            } else {
                echo "No hay noticias disponibles.";
            }

            $conexion->close();
            ?>
        </div>
        </section>
</body>
</html>