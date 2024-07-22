<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $withdrawAddress = $_POST['withdraw-address'];

    $file = 'RetirosUsuarios.txt';
    $content = "Monto: $amount, Dirección: $withdrawAddress\n";

    // Escribir en el archivo
    if (file_put_contents($file, $content, FILE_APPEND)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
