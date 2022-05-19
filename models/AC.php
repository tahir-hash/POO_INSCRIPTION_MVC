<?php

namespace App\Model;


class AC extends User
{

 
  public function __construct()
  {
    parent::$role = "ROLE_AC";
  }
  public static function getRole()
  {
    return parent::$role = 'ROLE_AC';
  }
  /* public static function findAll(): array
  {
    $sql = "select id,nom_complet, role,sexe,login,password from " . parent::table() . " where role  like ?";
    return parent::findBy($sql, [self::getRole()]);
  } */

  public function insert(): int
  {
    $db = self::database();
    $db->connexionBD();
    $sql = "INSERT INTO " .parent::table()." (`nom_complet`, `role`,`sexe`,`login`,`password`) VALUES (?,?,?,?,?);";
    $result =  $db->executeUpdate($sql, [$this->nomComplet, parent::$role,$this->sexe,$this->login,$this->password]);
    $db->closeConnexion();
    return $result;
  }

  public function inscriptions(): array
  {
    $sql = "select i.* from " . parent::table() . " p,inscription i 
    where  p.id=i.ac_id
    and p.role like ?
    and p.id=?";
      return parent::findBy($sql, [$this->id,AC::getRole()]);
  }
}
