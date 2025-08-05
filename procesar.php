<?php
$ip = $_SERVER['REMOTE_ADDR'];
if (isset($_COOKIE['voto']) || file_exists("bloqueo/$ip")) {
    die("Ya votaste.");
}
$candidato = $_POST['candidato'] ?? '';
if (!$candidato) die("Candidato inválido.");
$conn = new mysqli("localhost", "pablo", "pp", "votoar");
$conn->query("INSERT INTO votos (candidato, ip, fecha) VALUES ('$candidato', '$ip', NOW())");
setcookie("voto", "1", time()+3600*24);
file_put_contents("bloqueo/$ip", "1");
header("Location: resultados.php");
?>
