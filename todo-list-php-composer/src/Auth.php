<?php

namespace Act\TodoList;

class Auth
{
    public function __construct()
    {
        $this->init();
    }
    
    public function init(): void
    {
        session_start();
    }

    public function isAuthenticated(): bool
    {
        return isset($_SESSION['status']) && $_SESSION['status'] === true;
    }

    public function signout(): void
    {
        session_destroy();
    }

    public function login(string $username, string $password): bool
    {
        if ($username !== "act") {
            return false;
        }

        if ($password !== "act") {
            return false;
        }

        $_SESSION["status"] = true;
        $_SESSION["user"] = 'act';
        
        return true;
    }
}