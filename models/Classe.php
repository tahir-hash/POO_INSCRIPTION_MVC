<?php 

namespace App\Model;

use App\Core\Model;

class Classe extends Model{

    public function __construct()
    {
        
    }
    public static function table()
    {
        return parent::$table="classe";
    }
    //Fonctions navigationnelles
//ManyToMany avec Professeur
public function professeurs():array|null{
    $sql="select ...";
    $result = parent::findBy($sql,[$this->id]);
    return $result;
}

public static function findAll():array{
    $sql="select * from '".parent::table()."'";
   return parent::findBy($sql);
}

public static function delete(int $id):int{
    $sql="delete from '".self::table()."' where id=$id";
    echo $sql;
  return 0;
}
public static function findById(int $id):object|null{
    $sql="select * from '".self::table()."' where id=$id";
    echo $sql;
  return null;
}

}