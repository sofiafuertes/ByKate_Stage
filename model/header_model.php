<?php 

class Header{
    private ?string $classConnexion;

    public function __construct(){
        $this->classConnexion = "displayNone";
    }

    public function getclassConnexion(): ?string {
        return $this->classConnexion;
    }

    public function setclassConnexion(?string $classConnexion): self {
        $this->classConnexion = $classConnexion;
        return $this;
    }

    public function displayNav(){
        if(isset($_SESSION['login'])){
            $this->setclassConnexion('');
        }
    }
}