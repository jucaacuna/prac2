<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <?php require 'miMenu.php'; ?>
    <section class="container">
    <article  class='news-item'>
    <h1> Ejercicio Prac 2</h1>
    <p> Este es un ejercicio para atacar con SQLi un formulario sencillo.</p>
    <p> El valor debe ser pasado por metodo GET.</p>
    </article>

         <!-- Formulario para buscar noticias. -->  
         <form action="./news.php" method="get">
        <label for="buscar_noticia">Buscar:</label>
        <input type="text" id="id" name="id">
        <input type="submit" value="Buscar">
    </form>
    </section>


</body>
</html>