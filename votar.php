<?php
$candidatos = ["Candidato A", "Candidato B", "Candidato C"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Votar</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Elegí tu candidato</h1>
    <form action="procesar.php" method="POST">
        <?php foreach ($candidatos as $c): ?>
            <label>
                <input type="radio" name="candidato" value="<?= $c ?>" required> <?= $c ?>
            </label><br>
        <?php endforeach; ?>
        <button type="submit">Enviar voto</button>
    </form>
</body>
</html>
