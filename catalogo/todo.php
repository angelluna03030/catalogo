<?php

require_once 'Database.php';

// Creamos una conexión a la base de datos
$database = new Database();
$base = $database->connect();

if (isset($_GET['insert'])) {
    $consulta = $_GET['insert'];
    $resultado = mysqli_query($base, $consulta);

    $query = 'SELECT * FROM productos'; // Cambia 'productos' al nombre de tu tabla
    $resultado = mysqli_query($base, $query);

    // Verificamos si la consulta se realizó con éxito
    if (!$resultado) {
        exit('Error en la consulta: '.mysqli_error($base));
    }

    $productos = [];

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $productos[] = $fila;
    }

    // Convertimos el arreglo de productos a formato JSON
    $json = json_encode($productos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    echo $json; //                Guardamos el JSON en un archivo llamado "catalogo.json"
    file_put_contents('catalogo.json', $json);
}
