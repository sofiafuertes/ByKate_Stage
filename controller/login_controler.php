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
            if (is_string($data)) {
                $this->setMessage($data);
                return;
            }
            $login = $data[0];
            $password = $data[1];

            $usersManager = new Users_manager();
            $user = $usersManager->readUserByMail($login);

            if (empty($user)) {
                $this->setMessage('El mail no existe');
            } else {
                // var_dump($password, $user['pwd_user']);
                // echo 'test3';
                if (password_verify($password, $user['pwd_user'])) {
                    $this->setMessage('Estás conectado');
                    $_SESSION['login'] = $user['login_user'];
                    // print_r($_SESSION);
                    // echo 'test4';
                    header('Location: /ByKate_Stage/gestion'); // Redirect to the gestion page after registration
                    exit(); // Ensures the script stops after the redirect
                } else {
                    $this->setMessage('La contraseña no es correcta');
                }
            }
        }
    }

}
