<?php

namespace App\Model;

class Etudiant extends User
{
  public string $matricule;
  private string $adresse;
  public function __construct()
  {
    self::$role = "ROLE_ETUDIANT";
  }
  /**
   * Get the value of matricule
   */
  public function getMatricule()
  {
    return $this->matricule;
  }

  /**
   * Set the value of matricule
   *
   * @return  self
   */
  public function setMatricule($matricule)
  {
    $this->matricule = $matricule;

    return $this;
  }



  /**
   * Get the value of adresse
   */
  public function getAdresse()
  {
    return $this->adresse;
  }

  public function setAdresse($adresse)
  {
    $this->adresse = $adresse;

    return $this;
  }

  public static function getRole()
  {
    return parent::$role = 'ROLE_ETUDIANT';
  }
  public static function findAll(): array
  {
    $sql = "select (`id`,`nom_complet`, `role`,`sexe`,`login`,`password`) from " . parent::table() . " where role  like ?";
    return parent::findBy($sql, [self::getRole()]);
  }
  public function insert(): int
  {
    $db = self::database();
    $db->connexionBD();
    $sql = "INSERT INTO " .parent::table()." (`nom_complet`, `role`,`sexe`,`login`,`password`) VALUES (?,?,?,?,?);";
    $result =  $db->executeUpdate($sql, [$this->nomComplet, parent::$role,$this->sexe,$this->login,$this->password]);
    $db->closeConnexion();
    echo $sql;
    return $result;
  }

  public function inscriptions():array
  {
    $sql = "select i.* from " . self::table() . " p,inscription i
        where  p.id=i.etudiant_id
        and p.id=?";
       return parent::findBy($sql, [$this->id]);
  }
}
