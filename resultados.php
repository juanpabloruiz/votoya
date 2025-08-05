<?php
$conn = new mysqli("localhost", "pablo", "pp", "votoar");
$res = $conn->query("SELECT candidato, COUNT(*) as votos FROM votos GROUP BY candidato");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Resultados</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Resultados</h1>
    <ul>
        <?php while($row = $res->fetch_assoc()): ?>
            <li><?= htmlspecialchars($row['candidato']) ?>: <?= $row['votos'] ?> votos</li>
        <?php endwhile; ?>
    </ul>
    <a href="index.php" class="boton">Volver</a>
</body>
</html>
