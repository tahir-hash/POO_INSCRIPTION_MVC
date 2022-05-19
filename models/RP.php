<?php

namespace App\Model;

use App\Model\User;

class RP extends User
{
    public function __construct()
    {
        parent::$role = "ROLE_RP";
    }
    public static function getRole()
    {
        return parent::$role = 'ROLE_RP';
    }
    
    public function insert(): int
    {
      $db = self::database();
      $db->connexionBD();
      $sql = "INSERT INTO " .parent::table()." (`nom_complet`, `role`,`sexe`,`login`,`password`) VALUES (?,?,?,?,?);";
      $result =  $db->executeUpdate($sql, [$this->nomComplet, parent::$role,$this->sexe,$this->login,$this->password]);
      $db->closeConnexion();
      return $result;
    }
    //fonctions navigationnelles
    public function professeurs():array
    {
        return [];
    }

    public function classes():array
    {
        $sql = "select c.* from " . parent::table() . " p,classe c
        where  p.id=c.rp_id
        and p.role='ROLE_RP'
       and p.id=?";
       return parent::findBy($sql, [$this->id]);
    }

    public function demandes():array
    {
        $sql = "select d.* from " . parent::table() . " p,demande d
        where  p.id=d.rp_id
        and p.role='ROLE_RP'
       and p.id=?";
       return parent::findBy($sql, [$this->id]);
    }
}
