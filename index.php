<?php
header("Content-Type: application/json");

// URL del servidor remoto que deseas consultar (el PHP en InfinityFree)
$remoteUrl = "http://final00project.fwh.is/nose%20que%20hago.php"; 

// Parámetros a enviar al servidor remoto
$apiKey = "1234"; // La clave API para autorización
$query = "SELECT * FROM LED_Status"; // La consulta que deseas ejecutar en tu base de datos

// Construir la URL con parámetros
$remoteUrlWithParams = $remoteUrl . "?key=" . urlencode($apiKey) . "&query=" . urlencode($query);

// Usamos cURL para realizar la solicitud al servidor remoto
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $remoteUrlWithParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutamos la solicitud
$response = curl_exec($ch);

// Si hay error en la solicitud, devuelve un mensaje de error
if ($response === false) {
    echo json_encode(["error" => "Error al consultar el servidor remoto: " . curl_error($ch)]);
    curl_close($ch);
    exit;
}

// Cerramos la conexión cURL
curl_close($ch);

// Devolvemos la respuesta obtenida del servidor remoto
echo $response;
?>
