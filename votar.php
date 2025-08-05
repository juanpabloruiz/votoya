<?php
$candidatos = ["Ana", "Luis", "Carlos", "María"];
echo "<h2>Seleccioná tu candidato</h2>";
echo "<form method='POST' action='procesar.php'>";
foreach ($candidatos as $c) {
    echo "<input type='radio' name='candidato' value='$c' required> $c<br>";
}
echo "<button type='submit'>Votar</button>";
echo "</form>";
?>
