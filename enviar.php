<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];
    $withdrawAddress = $_POST['withdraw-address'];
    $email = $_POST['email'];

    $to = $email;
    $subject = "Confirmación de Retiro";
    $message = "Se ha procesado su retiro de $amount a la dirección $withdrawAddress.";
    $headers = "From: magneginvip@gmail.com\r\n" .
               "Reply-To: magneginvip@gmail.com\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "Correo enviado correctamente.";
    } else {
        echo "Error al enviar el correo.";
    }
}
?>
