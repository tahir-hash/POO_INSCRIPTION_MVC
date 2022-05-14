<?php 

namespace App\Core;


abstract class Model implements IModel{
protected static string $table;


  protected  static function database():Database{
    return new Database;
  }

  public static function table()
  {
      return self::$table='';
  }
  //Redefinition des Fonction IModel  
  public function insert():int{
      return 0;
  }
  public function update():int{
    return 0;
  }
  public static function delete(int $id):int{

      $db = self::database();
      $db->connexionBD();
      $sql="delete from ".self::table()." where id=?";
      $result =  $db->executeUpdate($sql,[$id]);
      $db->closeConnexion();
      echo $sql;
      return $result;
  }
  public static function findAll():array{
      $db = self::database();
      $db->connexionBD();
      $sql="select * from ".self::table();
      $result =  $db->executeSelect($sql);
      $db->closeConnexion();
      echo $sql;
      return $result;
  }
  public static function findById(int $id):object|null
  {
      $db = self::database();
      $db->connexionBD();
      $sql="select * from ".self::table()."where id=?";
      $result =  $db->executeSelect($sql,[$id]);
      $db->closeConnexion();
      echo $sql;
      return $result;
  }
  public static function findBy(string $sql,array $data=null,$single=false):object|null|array{
      $db = self::database();
      $db->connexionBD();
      $result =  $db->executeSelect($sql,$data,$single );
      $db->closeConnexion();
      return $result;
  }
}