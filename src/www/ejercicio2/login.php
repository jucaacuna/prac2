<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="/css/estiloLogin.css">
</head>
<body>
    <section class="container">
        <h1>Iniciar Sesión</h1>
        <form action="procesarLogin.php" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Iniciar Sesión">
        </form>
    </section>

</body>
</html>
