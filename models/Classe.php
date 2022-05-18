<?php

namespace App\Model;

use App\Core\Model;

class Classe extends Model
{

    private int $id;
    private string $libelleClasse;
    private string $filiere;
    private string $niveau;

    public function __construct(?string $libelleClasse=null,?string $filiere=null, ?string $niveau=null)
    {
        $this->libelleClasse                = $libelleClasse;
        $this->filiere                 = $filiere;
        $this->niveau = $niveau;
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
     * Get the value of libelleClasse
     */
    public function getLibelleClasse()
    {
        return $this->libelleClasse;
    }

    /**
     * Set the value of libelleClasse
     *
     * @return  self
     */
    public function setLibelleClasse($libelleClasse)
    {
        $this->libelleClasse = $libelleClasse;

        return $this;
    }

    /**
     * Get the value of filiere
     */
    public function getFiliere()
    {
        return $this->filiere;
    }

    /**
     * Set the value of filiere
     *
     * @return  self
     */
    public function setFiliere($filiere)
    {
        $this->filiere = $filiere;

        return $this;
    }

    /**
     * Get the value of niveau
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set the value of niveau
     *
     * @return  self
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }
    //others fonctions
    public static function table()
    {
        return parent::$table = "classe";
    }
    //Fonctions navigationnelles
    //ManyToMany avec Professeur

    //  (`libelle`,`filiere`,`niveau`,`rp_id`)
    public function insert(): int
    {
        $db = self::database();
        $db->connexionBD();
        $sql = "INSERT INTO " . self::table() . " (`libelle`,`filiere`,`niveau`,`rp_id`) VALUES (?,?,?,?);";
        $result =  $db->executeUpdate($sql, [$this->libelleClasse, $this->filiere,$this->niveau,$_SESSION['user']->id]);
        $db->closeConnexion();
        echo $sql;
        return $result;
    }
    //fonctions navigationnelles
    public function rp(): object
    {
        $sql = "select p.* from " . self::table() . " c,personne p
        where  p.id=c.rp_id
        and p.role='ROLE_RP'
       and c.id=?";
        return parent::findBy($sql, [1], true);
    }

    public function inscriptions(): array
    {
        $sql = "select i.* from " . self::table() . " c,inscription i
        where  c.id=i.classe_id
        and c.id=?";
        return parent::findBy($sql, [$this->id]);
    }
}
