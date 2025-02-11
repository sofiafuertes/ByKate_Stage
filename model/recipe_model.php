<?php

class Recipe
{
    private int $id_recipe;
    private string $title;
    private string $category;
    private int $difficulty;
    private int $cookingTime;
    private string $mainPhoto;
    private string $createdAt;

    public function __construct($id_recipe, $title, $category, $difficulty, $cookingTime, $mainPhoto, $createdAt)
    {
        $this->idRecipe = $id_recipe;
        $this->title = $title;
        $this->category = $category;
        $this->difficulty = $difficulty;
        $this->cookingTime = $cookingTime;
        $this->mainPhoto = $mainPhoto;
        $this->createdAt = $createdAt;
    }

    public function getIdRecipe()
    {
        return $this->id_recipe;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getDifficulty()
    {
        return $this->difficulty;
    }
    public function getCookingTime()
    {
        return $this->cookingTime;
    }
    public function getMainPhoto()
    {
        return $this->mainPhoto;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }


    public function setIdRecipe(int $id_recipe): self
    {
        $this->id_recipe = $id_recipe;
        return $this;
    }


    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }


    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }


    public function setDifficulty(int $difficulty): self
    {
        $this->difficulty = $difficulty;
        return $this;
    }


    public function setCookingTime(int $cookingTime): self
    {
        $this->cookingTime = $cookingTime;
        return $this;
    }


    public function setMainPhoto(string $mainPhoto): self
    {
        $this->mainPhoto = $mainPhoto;
        return $this;
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}
