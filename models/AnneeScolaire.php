<?php

namespace App\Model;

use App\Core\Model;

class AnneeScolaire extends Model
{
    private int $id;
    private string $anne;
    private string $etat;

    public static function table()
    {
        return parent::$table = "annee_scolaire";
    }
    //getters and setter
       /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of anne
     */
    public function getAnne()
    {
        return $this->anne;
    }

    public function setAnne($anne)
    {
        $this->anne = $anne;

        return $this;
    }

    /**
     * Get the value of etat
     */
    public function getEtat()
    {
        return $this->etat;
    }

    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }
    //others
   
    public function insert(): int
    {
      $db = self::database();
      $db->connexionBD();
      $sql = "INSERT INTO " .self::table()." (`libelle`,`etat`) VALUES (?,?);";
      $result =  $db->executeUpdate($sql, [$this->anne,$this->etat]);
      $db->closeConnexion();
      echo $sql;
      return $result;
    }

    public function inscriptions(): array
    {
        $sql = "select a.* from " . self::table() . " a,inscription i
         where  a.id=i.annee_id
        and a.id=?";
        return parent::findBy($sql, [$this->id]);

    }

    public function classProf():array
    {
        $sql = "select a.* from " . self::table() . " a,prof_classe pc
        where  a.id=pc.annee_id
        and a.id=?";
       return parent::findBy($sql, [$this->id]);
    }


 
}
