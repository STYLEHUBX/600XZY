<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $withdrawAddress = $_POST['withdraw-address'];
    $userEmail = $_POST['email'];

    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Reemplaza con tu host SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@example.com'; // Reemplaza con tu correo electrónico
        $mail->Password = 'your_email_password'; // Reemplaza con tu contraseña de correo
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remitente y destinatario
        $mail->setFrom('no-reply@yourdomain.com', 'Retiro de Fondos');
        $mail->addAddress('magneginvip@gmail.com');
        $mail->addReplyTo($userEmail);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo Retiro de Fondos';
        $mail->Body = "
            <p>Se ha solicitado un retiro de fondos.</p>
            <p><strong>Monto:</strong> $$amount</p>
            <p><strong>Dirección de retiro:</strong> $withdrawAddress</p>
            <p><strong>Correo electrónico del solicitante:</strong> $userEmail</p>
        ";
        $mail->AltBody = "
            Se ha solicitado un retiro de fondos.\n
            Monto: $$amount\n
            Dirección de retiro: $withdrawAddress\n
            Correo electrónico del solicitante: $userEmail
        ";

        $mail->send();
        echo 'Correo enviado con éxito.';
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
} else {
    echo 'Método de solicitud no válido.';
}
?>
