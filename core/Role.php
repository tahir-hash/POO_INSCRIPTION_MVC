<?php
namespace App\Core;


class Role 
{
    private  Session $session;

    public function __construct(Session $session)
    {
        $this->session=$session;
    }
    public static function   isConnect()
    {
        //a revoir apres
        return isset($_SESSION['user']);
    }

    public static function   isRP()
    {
        return self::isConnect() && $_SESSION['user']->role=="ROLE_RP";

    }

    public static function   isAC()
    {
        return self::isConnect() && $_SESSION['user']->role=="ROLE_AC";

    }

    public static function   isEtudiant()
    {
        return self::isConnect() && $_SESSION['user']->role=="ROLE_ETUDIANT";

    }
}