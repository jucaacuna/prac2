<?php

use MongoDB\Client;


$us = $_POST['usuario'];
$contraseña = $_POST['password'];

// Conexión a MongoDB apuntando a mi maquina virtual creada en el pec1.
$mongoUri = 'mongodb://juan:1234567890@192.168.0.103:27017/prac2'; 

try {
    $mongo = new MongoDB\Client($mongoUri);
    $db = $mongo->selectDatabase('prac2');
    $colleccion = $db->selectCollection('Users'); 

    $usuario = $colleccion->findOne([
        'usuario' => $us, 
        'password' => $contraseña 
    ]);

    if ($usuario) {
        // Usuario y contraseña válidos
        echo 'Inicio de sesión exitoso';
        // Aquí puedes redirigir al usuario a la página principal o a su perfil
    } else {
        // Usuario o contraseña incorrectos
        echo 'Usuario o contraseña incorrectos';
    }

} catch (Exception $e) {
    echo 'Error al conectar a MongoDB: ' . $e->getMessage();
}

?>