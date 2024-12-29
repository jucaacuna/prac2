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

            <!-- Aquí la consulta PHP -->
            <?php
            // Conexión a la base de datos
            $conexion = new mysqli('serverBD', 'root', 'jaja', 'prac2');

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Obtener el parámetro de la URL
            $id = $_GET['id'];

            /* Consulta para verificar si la noticia existe. Siguiendo la pista
             del foro del curso, se divide en dos consultas. */
            $sql_check = "SELECT 1 FROM News WHERE newsId = $id";
            $existencia = $conexion->query($sql_check);

            if ($existencia->num_rows > 0) {
                // La noticia existe, realizar la segunda consulta para obtener los detalles
                $sql = "SELECT title, body, dateTime FROM News WHERE newsId = $id";
                $resultado = $conexion->query($sql);

                if ($resultado->num_rows > 0) {
                    // Mostrar cada noticia
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "\n    <article class='news-item'> \n";
                        echo "      <h2>" . $fila["title"] . "</h2> \n";
                        echo "      <p>" . $fila["body"] . "</p> \n";
                        echo "      <span class='date'>" . $fila["dateTime"] . "</span> \n";
                        echo "    </article> \n";
                    }
                } else {
                    echo "No hay noticias disponibles.";
                }
            } else {
                echo "La noticia no existe.";
            }

            $conexion->close();
            ?>
        </div>
    </section>
</body>
</html>
