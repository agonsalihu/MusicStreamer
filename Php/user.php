<?php

class User{
    protected $username;
    protected $email;
    protected $password;
    protected $role;

    public function __construct($username, $email, $password, $role)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
    public function setSession()
    {
        $_SESSION["role"] = "0";
        $_SESSION['roleName'] = "User";
    }

    public function setCookie()
    {
        setcookie("username", $this->getUsername(), time() + 2 * 24 * 60 * 60);
    }
    public function getUsername()
    {
        return $this->username;
    }
}