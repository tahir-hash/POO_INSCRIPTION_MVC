<?php

namespace App\Core;


abstract class Model implements IModel
{
  protected static string $table;


  protected  static function database(): Database
  {
    return new Database;
  }

  public static function table()
  {
    return self::$table = '';
  }
  //Redefinition des Fonction IModel  
  public function insert(): int
  {
    return 0;
  }
  public  function update($id): int
  {
    return 0;
  }
  public static function delete(int $id): int
  {

    $db = self::database();
    $db->connexionBD();
    $sql = "delete from " . get_called_class()::table() . " where id=?";
    $result =  $db->executeUpdate($sql, [$id]);
    $db->closeConnexion();
    return $result;
  }
  public static function findAll(): array
  {
    $sql = "select * from " . get_called_class()::table()." " . "order by id desc";
    return self::findBy($sql);
  }
  public static function findById(int $id): object|null
  {
    $sql = "select * from " . get_called_class()::table() . " " . "where id=?";
    return self::findBy($sql, [$id], true);
  }
  public static function findBy(string $sql, array $data = [], $single = false): object|null|array
  {
    $db = self::database();
    $db->connexionBD();
    $result =  $db->executeSelect($sql, $data, $single);
    $db->closeConnexion();
    return $result;
  }
}
