<?php

namespace App\Model;

class Professeur extends Personne
{

  private string $grade;

  public function __construct()
  {
    parent::$role = "ROLE_RP";
  }

  public function getGrade()
  {
    return $this->grade;
  }


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
    $sql = "INSERT INTO `personne` (`nom_complet`, `role`,`grade`,`sexe`) VALUES (?,?,?,?);";
    $result =  $db->executeUpdate($sql, [$this->nomComplet, parent::$role, $this->grade, $this->sexe]);
    $db->closeConnexion();
    echo $sql;
    return $result;
  }


  public function rp(): RP
  {
    $sql = "select p.* from " . parent::table() . " m,personne p
    where  p.id=m.rp_id
    and p.role='ROLE_RP'
    and m.id=?";
    return parent::findBy($sql, [$this->id], true);
  }
}
