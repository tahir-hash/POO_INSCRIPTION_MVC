<?php

namespace App\Model;

use App\Core\Model;

class Inscription extends Model
{
    //Attributs Instances
    //Attributs navigationnels => attributs issus des associations
    private int $id;
    private string $etat;

    public function __construct(?int $etudiant_id = null, ?int $classe = null,?int $annee_id=null)
    {
      $this->etudiant_id = $etudiant_id;
      $this->classe  = $classe;
      ///$this->matricule=$matricule;
      $this->annee_id=$annee_id;
    }

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
        $sql = "INSERT INTO " . self::table() . " (`etudiant_id`,`classe_id`,`annee_id`,`ac_id`,`etat_ins`) VALUES (?,?,?,?,?);";
        $result =  $db->executeUpdate($sql, [$this->etudiant_id,$this->classe,2,$_SESSION['user']->id,"en cours"]);
        $db->closeConnexion();
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

    public static function findAll(): array
    {
        $sql="select i.etat_ins,p.nom_complet,p.matricule,p.sexe,c.libelle as 'libClasse',a.libelle
                from " . self::table() . " i,personne p,classe c,annee_scolaire a
              where i.etudiant_id=p.id
              and i.classe_id=c.id
              and i.annee_id=a.id
              and p.role='ROLE_ETUDIANT' order by i.id desc";
        return parent::findBy($sql);
    }
    public static function demandes($idsess):array
    {
        $sql="select d.*              
              from " . self::table() . " i,personne p,demande d
              where i.id=d.inscription_id
              and p.id=i.etudiant_id
              and p.role='ROLE_ETUDIANT'
              and p.id=? order by d.id desc";
        return parent::findBy($sql,[$idsess]);
    }

    public function update($id): int
    {
        $db = self::database();
        $db->connexionBD();
        $sql = "UPDATE"." ". self::table() ." SET `etat_ins` = ? WHERE `id` = ?";
        $result =  $db->executeUpdate($sql, ["ANNULEE",$id]);
        $db->closeConnexion();
        return $result;
    }
    public static function inscription($id):object|null
    {
        $sql = "select  i.id from " . self::table() . " i, personne p
        where    p.id=i.etudiant_id
        and p.id=?";
       return parent::findBy($sql, [$id],true);
    }
}
