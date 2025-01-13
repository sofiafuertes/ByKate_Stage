<?php

class TextesWeb_model
{
    private ?int $id_textes_web;
    private ?string $page_path;
    private ?string $section;
    private ?string $content;


    public function __construct(?int $id_textes_web = null, ?string $page_path = null, ?string $section = null, ?string $content = null)
    {
        $this->id_textes_web = $id_textes_web;
        $this->page_path = $page_path;
        $this->section = $section;
        $this->content = $content;
    }
    
//Getters and Setters 
    public function getIdTextesWeb(): ?int
    {
        return $this->id_textes_web;
    }
    public function setIdTextesWeb(?int $id_textes_web): self
    {
        $this->id_textes_web = $id_textes_web;
        return $this;
    }
    public function getPagePath(): ?string
    {
        return $this->page_path;
    }
    public function setPagePath(?string $page_path): self
    {
        $this->page_path = $page_path;
        return $this;
    }
    public function getSection(): ?string
    {
        return $this->section;
    }
    public function setSection(?string $section): self
    {
        $this->section = $section;
        return $this;
    }
    public function getContent(): ?string
    {
        return $this->content;
    }
    public function setContent(?string $content): self
    {
        $this->content = $content;
        return $this;
    }
}