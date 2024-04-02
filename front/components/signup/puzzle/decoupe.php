<?php
// Exécute le script Python pour découper l'image
$output = shell_exec("python script.py");

// Vérifie la sortie du script Python pour déterminer si la découpe a réussi
if ($output !== null) {
    echo $output;
    exit;
} else {
    echo "Erreur lors de l'exécution du script Python.";
    exit(1);
}
?>
