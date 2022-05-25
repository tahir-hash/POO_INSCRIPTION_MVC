<?php

namespace App\Model;

class Etudiant extends User
{
  public string $matricule;
  private string $adresse;
  public function __construct(?string $nomComplet = null, ?string $sexe = null, ?string $adresse = null)
  {
    $this->nomComplet = $nomComplet;
    $this->sexe  = $sexe;
    ///$this->matricule=$matricule;
    $this->adresse = $adresse;
    parent::$role = "ROLE_ETUDIANT";
  }
  /**
   * Get the value of matricule
   */
  public  function getMatricule()
  {
    $sql="select id FROM personne WHERE role ='ROLE_ETUDIANT' ORDER BY id DESC LIMIT 1";
    $test=parent::findBy($sql);
    $id=$test[0]->id+1;
    return "ETU".$id;
  }
  public function getLoginUser()
  {
    $name=explode(" ",$this->nomComplet);
    $sql="select id FROM personne WHERE role ='ROLE_ETUDIANT' ORDER BY id DESC LIMIT 1";
    $test=parent::findBy($sql);
    $id=$test[0]->id+1;
    $login=$name[0].$id."@proacademy.com";
    return $login;
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

  public function insert(): int
  {
    $password= password_hash("academy",PASSWORD_DEFAULT);
    $db = self::database();
    $db->connexionBD();
    $sql = "INSERT INTO " . parent::table() . " (`nom_complet`, `role`,`sexe`,`matricule`,`login`,`password`) VALUES (?,?,?,?,?,?);";
    $result =  $db->executeUpdate($sql, [$this->nomComplet, parent::$role, $this->sexe,$this->getMatricule(),$this->getLoginUser(),$password]);
    $db->closeConnexion();
    return $result;
  }
  //select password from personne where role like 'ROLE_ETUDIANT' and id !=82 and id !=83;

  
  public function inscriptions(): array
  {
    $sql = "select i.* from " . self::table() . " p,inscription i
        where  p.id=i.etudiant_id
        and p.id=?";
    return parent::findBy($sql, [$this->id]);
  }
}
