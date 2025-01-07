<?php

class Product
{
    private ?int $id_product;
    private ?string $product_name;
    private ?string $product_description;
    private ?string $allergies;
    private ?string $servings;
    private ?string $photo_principal;
    private ?string $photo1;
    private ?string $photo2;
    private ?string $photo3;

    public function __construct(?int $id_product = null, ?string $product_name = null, ?string $product_description = null, ?string $allergies = null, ?string $servings = null, ?string $photo_principal = null, ?string $photo1 = null, ?string $photo2 = null, ?string $photo3 = null)
    {
        $this->id_product = $id_product;
        $this->product_name = $product_name;
        $this->product_description = $product_description;
        $this->allergies = $allergies;
        $this->servings = $servings;
        $this->photo_principal = $photo_principal;
        $this->photo1 = $photo1;
        $this->photo2 = $photo2;
        $this->photo3 = $photo3;
    }

    // Getters and Setters
    public function getId_product(): ?int
    {
        return $this->id_product;
    }

    public function getName_product(): ?string
    {
        return $this->product_name;
    }

    public function getDescription_product(): ?string
    {
        return $this->product_description;
    }

    public function getAllergies(): ?string
    {
        return $this->allergies;
    }

    public function getServings(): ?string
    {
        return $this->servings;
    }

    public function getPhotoPrincipal(): ?string
    {
        return $this->photo_principal;
    }

    public function getPhoto1(): ?string
    {
        return $this->photo1;
    }

    public function getPhoto2(): ?string
    {
        return $this->photo2;
    }

    public function getPhoto3(): ?string
    {
        return $this->photo3;
    }

    // Setters
    public function setName_product(string $name): void
    {
        $this->product_name = $name;
    }

    public function setDescription_product(string $description): void
    {
        $this->product_description = $description;
    }

    public function setAllergies(string $allergies): void
    {
        $this->allergies = $allergies;
    }

    public function setServings(string $servings): void
    {
        $this->servings = $servings;
    }

    public function setPhotoPrincipal(string $photo): void
    {
        $this->photo_principal = $photo;
    }

    public function setPhoto1(string $photo): void
    {
        $this->photo1 = $photo;
    }

    public function setPhoto2(string $photo): void
    {
        $this->photo2 = $photo;
    }

    public function setPhoto3(string $photo): void
    {
        $this->photo3 = $photo;
    }

}