<?php

namespace App\Model;

use LDAP\Result;
use User;

class Professeur extends Personne
{

  private string $grade;

  public function __construct()
    {
        parent::$role = "ROLE_RP";
    }
  /**
   * Get the value of grade
   */
  public function getGrade()
  {
    return $this->grade;
  }

  /**
   * Set the value of grade
   *
   * @return  self
   */
  public function setGrade($grade)
  {
    $this->grade = $grade;

    return $this;
  }
  //Fonctions navigationnelles
  //ManyToMany avec Classe
  public function classes(): array
  {
    return [];
  }
  public static function table()
  {
    return self::$table = 'personne';
  }
  public static function getRole()
  {
    return parent::$role = 'ROLE_PROFESSEUR';
  }
  public static function findAll(): array
  {
    $sql = "select * from " . parent::table() . " where role  like ?";
    return parent::findBy($sql, [self::getRole()]);
  }

  public static function delete(int $id): int
  {
    $db = self::database();
    $db->connexionBD();
    $sql = "delete from personne where id=?";
    $result = $db->executeUpdate($sql, [$id]);
    $db->closeConnexion();
    echo $sql;
    return $result;
  }

  public function insert(): int
  {
    $db = self::database();
    $db->connexionBD();
    $sql = "INSERT INTO `personne` (`nom_complet`, `role`,`grade`) VALUES (?,?,?);";
    $result =  $db->executeUpdate($sql, [$this->nomComplet, parent::$role, $this->grade]);
    $db->closeConnexion();
    echo $sql;
    return $result;
  }
}
