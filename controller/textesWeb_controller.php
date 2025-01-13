<?php
class TextesWeb_controller
{
    private $text;
    private ?string $message;

    public function __construct()
    {
        $this->text = new TextesWeb_manager();
        $this->message = "";
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

    public function displayText(?string $page_path, ?string $section)
    {

        if (empty($page_path) || empty($section)) {
            $this->setMessage("Parametros invalidos");
            return null;
        }

        $text = $this->text->readTextesByPathSection($page_path, $section);

        if ($text === null) {
            $this->setMessage("No se encontro contenido para la ruta '$page_path' y seccion '$section");
            return null;
        }

        return $text['content'];


    }
}