<?php

namespace App\Model;

class Etudiant extends User
{
  private string $matricule;
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
    $sql = "select * from " . parent::table() . " where role  like ?";
    return parent::findBy($sql, [self::getRole()]);
  }
}
