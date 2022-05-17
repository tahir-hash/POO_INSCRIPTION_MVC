<?php

namespace App\Model;

use App\Core\Model;

class Inscription extends Model
{
    //Attributs Instances
    //Attributs navigationnels => attributs issus des associations
    private int $id;
    private string $etat;



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
     * Get the value of etat
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    public static function table()
    {
        return parent::$table = "inscription";
    }

    public function insert(): int
    {
        $db = self::database();
        $db->connexionBD();
        $sql = "INSERT INTO " . self::table() . " (`etat_ins`,`ac_id`,`etudiant_id`,`classe_id`,`annee_id`) VALUES (?,?,?,?,?);";
        $result =  $db->executeUpdate($sql, [$this->etat,13,5,3,2]);
        $db->closeConnexion();
        echo $sql;
        return $result;
    }


    //ManyToOne => AC
    public function ac(): AC
    {
        $sql = "select p.* from " . self::table() . " i,personne 
                   p where  p.id=i.ac_id
                   and p.role like 'ROLE_AC'
                   and i.id=?";
        return parent::findBy($sql, [$this->id],true);
    }
    public function etudiant(): Etudiant
    {
        $sql = "select p.* from " . self::table() . " i,personne 
                   p where  p.id=i.ac_id
                   and p.role like 'ROLE_ETUDIANT'
                   and i.id=?";
        return parent::findBy($sql, [$this->id],true);
    }
    //ManyToOne => AnneeScolaire
    public function anneeScolaire(): AnneeScolaire
    {
        $sql = "select a.* from annee_scolaire a,inscription i 
                    where  a.id=i.annee_id
                   and i.id=?";
        return parent::findBy($sql, [$this->id]);
    }

    public  function classe():Classe
    {
        $sql = "select c.* from " . self::table() . " i,classe c
        where  c.id=i.classe_id
        and i.id=?";
       return parent::findBy($sql, [$this->id],true);
    }
}
