<?php

class Login_controler
{
    private ?string $message;
    public function __construct()
    {
        $this->message = '';
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }
    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }

    //Method for validating the data entered in the registration form

    public function testLoginData(): array|string
    {
        if (empty($_POST["login"]) || empty($_POST["password"])) {
            return 'Llene todos los campos, por favor.';
        }

        $mail = sanitize($_POST['login']);
        $password = sanitize($_POST['password']);

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return 'El formato de mail no es válido.';
        }
        return [$mail, $password];
    }

    //Method for user login

    public function connexionUser()
    {
        if (isset($_POST['connexionSubmit'])) {
            $data = $this->testLoginData();
            var_dump($data );
            echo 'test1';
            $managerUsers = new ManagerUsers();
            $user = $managerUsers->readUserByMail();
            var_dump( empty($user));
            echo 'test2';
            if (empty($user)) {
                $this->setMessage('El mail no existe');
            } else {
                var_dump($data[1], $user[0]["password_user"]);
                echo 'test3';
                if (password_verify($data[1], $user[0]["pwd"])) {
                    $this->setMessage('Estás conectado');
                    $_SESSION['login'] = $user[0]['login'];
                    print_r($_SESSION);
                    echo 'test4';
                    header('Location:/ByKate/gestion'); // Redirect to the gestion page after registration
                    exit(); // Ensures the script stops after the redirect
                } else {
                    $this->setMessage('La contraseña no es correcta');
                }
            }
        }
    }

}
