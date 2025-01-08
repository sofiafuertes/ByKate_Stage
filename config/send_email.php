<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name'], $_POST['email'], $_POST['message'])) { //Check if the required fileds are filled and sanitaze them
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $option = htmlspecialchars(trim($_POST['options']));
        $message = htmlspecialchars(trim($_POST['message']));

        $to = "sofi.fuertes@gmail.com"; //The email address to send the message
        $subject = "Nuevo mensaje del formulario de contacto: $option"; //Subject of the email

        //Body of the email
        $emailContent = "Nombre: $name\n";
        $emailContent .= "Correo electrónico: $email\n";
        $emailContent .= "Opción seleccionada: $option\n\n";
        $emailContent .= "Mensaje: \n$message\n";

        $headers = "From: $email" . "\r\n" .
            "Reply-To: $email" . "\r\n" .
            "Content-Type: text/plain; charset=UTF-8";

        if (mail($to, $subject, $emailContent, $headers)) {
            echo 'succes';

        } else {
            echo 'error';
        }

    }

}
