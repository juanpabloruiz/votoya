<?php
$db = new PDO("mysql:host=localhost;dbname=votoar", "pablo", "pp");

$resultado = $db->query("SELECT candidato, COUNT(*) as votos FROM votos GROUP BY candidato");

echo "<h2>Resultados en tiempo real</h2><ul>";
while ($row = $resultado->fetch()) {
    echo "<li>{$row['candidato']}: {$row['votos']} votos</li>";
}
echo "</ul><a href='index.php'>Volver</a>";
?>
