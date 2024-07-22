<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $withdrawAddress = $_POST['withdraw-address'];
    $userEmail = $_POST['email']; // Correo electrónico del usuario

    $to = 'magneginvip@gmail.com'; // Correo del destinatario
    $subject = 'Nuevo Retiro de Fondos';
    $message = "Se ha solicitado un retiro de fondos.\n\n";
    $message .= "Monto: $amount\n";
    $message .= "Dirección de retiro: $withdrawAddress\n";
    $message .= "Correo electrónico del solicitante: $userEmail\n";

    $headers = "From: magneginvip@gmail.com \r\n";
    $headers .= "Reply-To: $userEmail\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo 'Correo enviado con éxito.';
    } else {
        echo 'Error al enviar el correo.';
    }
} else {
    echo 'Método de solicitud no válido.';
}
?>
