<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $withdrawAddress = $_POST['withdraw-address'];

    $to = 'magneginvip@gmail.com';
    $subject = 'Nuevo Retiro de Fondos';
    $message = "Se ha solicitado un retiro de fondos.\n\n";
    $message .= "Monto: $amount\n";
    $message .= "Dirección de retiro: $withdrawAddress\n";

    $headers = "From: magneginvip@gmail.com \r\n";
    $headers .= "Reply-To: no-reply@yourdomain.com\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo 'Correo enviado con éxito.';
    } else {
        echo 'Error al enviar el correo.';
    }
} else {
    echo 'Método de solicitud no válido.';
}
?>
