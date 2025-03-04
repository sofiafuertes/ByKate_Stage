<?php
class Users
{
    private ?string $login;
    private ?string $pwd;
    private ?string $newPwd;

    public function __construct(string $login = null, string $pwd = null, string $newPwd = null)
    {
        $this->login = $login;
        $this->pwd = $pwd;
        $this->newPwd = $newPwd;
    }

    // Getters and Setters
    public function getLogin(): ?string
    {
        return $this->login;
    }
    public function setLogin(?string $login): self
    {
        $this->login = $login;
        return $this;
    }
    public function getPwd(): ?string
    {
        return $this->pwd;
    }
    public function setPwd(?string $pwd): self
    {
        $this->pwd = $pwd;
        return $this;
    }
    public function getNewPwd(): ?string
    {
        return $this->newPwd;
    }
    public function setNewPwd(?string $newPwd): self
    {
        $this->newPwd = $newPwd;
        return $this;
    }
}
