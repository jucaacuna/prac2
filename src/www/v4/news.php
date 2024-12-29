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
            try {
                // Conexión a la base de datos
                $conexion = new mysqli('serverBD', 'root', 'jaja', 'prac2');

                // Verificar la conexión
                if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }

                // Obtener el parámetro de la URL
                $id = $_GET['id'];

                /* Consulta preparada para obtener los detalles de la noticia. 
                Este es el primer cambio para evitar sqli y tomo la sugerencia del material del curso y
                del libro Robin Nixon (2021) Learning PHP, MySQL & JavaScript.
                */ 
                $stmt = $conexion->prepare("SELECT title, body, dateTime FROM News WHERE newsId = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $resultado = $stmt->get_result();

                if ($resultado->num_rows > 0) {
                /* Mostrar cada noticia. 
                Segunda modificación para evitar sqli: 
                    - Se quita el bucle while para evitar que se muestre mas de un elemento. En definitiva,
                     el identificador es unico.
                */
                $fila = $resultado->fetch_assoc();
                    echo "\n    <article class='news-item'> \n";
                    echo "      <h2>" . $fila["title"] . "</h2> \n";
                    echo "      <p>" . $fila["body"] . "</p> \n";
                    echo "      <span class='date'>" . $fila["dateTime"] . "</span> \n";
                    echo "    </article> \n";
                
                } else {
                    echo "La noticia no existe.";
                }

                $stmt->close();
            } catch (Exception $e) {
                echo "Se produjo un error: " . $e->getMessage();
            }

            $conexion->close();
            ?>
        </div>
    </section>
</body>
</html>
