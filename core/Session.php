<?php
namespace App\Core;

use App\Model\User;

class Session
{
    private User $user;
    public function __construct()
    {
        if(session_status()==PHP_SESSION_NONE)
        {
            session_start();
        }
    }

    public function setSession(string $key,$data)
    {
        $_SESSION[$key]=$data;
    }

    public  function getSession(string $key)
    {
        return $_SESSION[$key];
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
}