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

    public function updateText(?string $page_path, ?string $section, ?string $newContent){
        if(empty($page_path) || empty ($section) || empty ($newContent)){
            $this->setMessage('Todos los campos son obligatorios');
            return false;
        }

        $success = $this->text->updateTextByPathSection($page_path, $section, $newContent);
        if($success){
            $this->setMessage('Texto actualizado con éxito');
        }else{
            $this->setMessage('Error al actualizar el texto');
        }
        return $success;
    } 

    public function getAllTextes()
{
    return $this->text->readAllTextes();
}

}