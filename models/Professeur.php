<?php

namespace App\Model;

class Professeur extends Personne
{
  private string $grade;

  public function __construct(?string $nomComplet = null, ?string $sexe = null, ?string $grade=null)
  {
    $this->nomComplet = $nomComplet;
    $this->sexe  = $sexe;
    $this->grade=$grade;
    parent::$role = "ROLE_PROFESSEUR";
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
    $sql = "INSERT INTO " . parent::table() . "(`nom_complet`, `role`,`grade`,`sexe`) VALUES (?,?,?,?);";
    $result =  $db->executeUpdate($sql, [$this->nomComplet, self::$role, $this->grade, $this->sexe]);
    $db->closeConnexion();
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
