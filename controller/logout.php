<?php 

class Logout{
    public function logoutSession(){
        
        //Je détruis la session
        session_destroy();

        //Je redirige vers la page d'accueil index.php
        header('Location:/ByKate_Stage/');
        exit;
    }
}