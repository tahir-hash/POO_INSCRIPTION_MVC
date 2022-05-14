<?php 

namespace App\Model;


class AC extends User{

   public function inscriptions():array{
       return [];
   }
  public function __construct()
  {
      parent::$role="ROLE_AC";
  } 
  
  public static function findAll(): array
  {
    $sql = "select * from " . parent::table() . " where role  like ?";
    return parent::findBy($sql, [self::getRole()]);
  }

  public function insert():int{
    $db = self::database();
    $db->connexionBD();
    $sql="INSERT INTO `personne` (`nom_complet`, `role`) VALUES (?,?);";
    $result =  $db->executeUpdate($sql,[$this->nomComplet,parent::$role]);
    $db->closeConnexion();
    echo $sql;
    return $result;
  }
  
}