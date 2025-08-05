<?php

function obtener_ip_real() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Puede haber varias IP separadas por coma
        return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}



$ip = obtener_ip_real();
$candidato = $_POST['candidato'] ?? '';

if (!$candidato) {
    die("Candidato no seleccionado.");
}

$db = new PDO("mysql:host=localhost;dbname=votoar", "pablo", "pp");

// Verificar si la IP ya votó
$stmt = $db->prepare("SELECT COUNT(*) FROM votos WHERE ip = ?");
$stmt->execute([$ip]);
if ($stmt->fetchColumn() > 0) {
    $db->prepare("INSERT INTO intentos (ip, candidato, intento_fecha) VALUES (?, ?, NOW())")->execute([$ip, $candidato]);
    die("Ya has votado. Solo se permite un voto por IP.");
}

// Insertar voto
$stmt = $db->prepare("INSERT INTO votos (candidato, ip, fecha) VALUES (?, ?, NOW())");
$stmt->execute([$candidato, $ip]);

echo "Gracias por tu voto a $candidato.";
?>
