<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = array();

    if (isset($_POST['name'], $_POST['email'], $_POST['message'])) { //Check if the required fileds are filled and sanitaze them
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $option = htmlspecialchars(trim($_POST['options']));
        $message = htmlspecialchars(trim($_POST['message']));

        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/", $name)) {
            $response['error'] = 'El nombre solo puede contener letras y espacios.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['error'] = 'Correo electrónico no válido.';
        }
        if (strlen($message) < 20) {
            $response['error'] = 'El mensaje debe tener al menos 30 caracteres.';
        }

        if (!isset($response['error'])) {
        $to = "sofi.fuertes@gmail.com"; //The email address to send the message
        $subject = "Nuevo mensaje del formulario de contacto: $option"; //Subject of the email
        $emailContent = "Nombre: $name\nCorreo: $email\nOpción: $option\n\nMensaje:\n$message";//Body of the email
        $headers = "From: $email" . "\r\n" .
            "Reply-To: $email" . "\r\n" .
            "Content-Type: text/plain; charset=UTF-8";

        //Send email
        if (mail($to, $subject, $emailContent, $headers)) {
            $response['succes'] = 'Mensaje enviado con éxito. Te responderemos lo antes posible.';
        } else {
            $response['error'] = 'Hubo un error al enviar el mensaje. Intenta nuevamente más tarde.';
        }
    }
    }else{
        $response['error'] = 'Por favor, complete todos los campos obligatorios.';
    }

    echo json_encode($response);
    exit;
}
