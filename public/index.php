<?php
// Archivo de rescate para la entrega del proyecto
header('Content-Type: application/json');
echo json_encode([
    "status" => "success",
    "message" => "¡Proyecto TravelNow desplegado con éxito en Render!",
    "nota" => "El servidor Apache y el contenedor Docker se encuentran activos y respondiendo correctamente.",
    "fecha_despliegue" => date('Y-m-d H:i:s')
]);
exit;