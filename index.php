<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Votación</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Elección de Candidato</h1>
    <form action="votar.php" method="get">
        <button type="submit">Votar ahora</button>
    </form>
    <br>
    <a href="resultados.php">Ver resultados</a>
</body>
</html>
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

echo "IP del visitante: " . obtener_ip_real();
?>
