<?php

$archivo = "datos/prueba.json";

// Verificamos si el archivo existe
if (file_exists($archivo)) {
    // Si existe, obtenemos el contenido del archivo y decodificamos el JSON
    $datosexistentes = file_get_contents($archivo);
    $datosexistentesjson = json_decode($datosexistentes);

    // Verificamos si la decodificación fue exitosa
    if ($datosexistentesjson === null) {
        // Si no fue exitosa, asignamos un array vacío
        $datosexistentesjson = [];
    }
} else {
    // Si no existe, inicializamos un array vacío
    $datosexistentesjson = [];
}

// Nuevos datos a agregar
$datos = [
    'archivo' => $_GET['archivo'],
    'elemento' => $_GET['patron'],
    'datos' => json_decode($_GET['datos'])
];

// Agregamos los nuevos datos al array existente
$datosexistentesjson[] = $datos;

// Codificamos el array actualizado a formato JSON
$json = json_encode($datosexistentesjson, JSON_PRETTY_PRINT);

// Guardamos el JSON actualizado en el archivo
file_put_contents($archivo, $json);

?>

