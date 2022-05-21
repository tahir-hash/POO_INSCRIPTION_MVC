<?php
namespace App\Model;

use App\Core\Model;

class Demande extends Model
{
    private  int $id;
    private string $libelleDemande;
    private string $etat;

    public function __construct(?string $libelleDemande=null)
    {
        $this->libelleDemande = $libelleDemande;
        $this->etat = "En cours";
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
     * Get the value of libelleDemande
     */ 
    public function getLibelleDemande()
    {
        return $this->libelleDemande;
    }

    /**
     * Set the value of libelleDemande
     *
     * @return  self
     */ 
    public function setLibelleDemande($libelleDemande)
    {
        $this->libelleDemande = $libelleDemande;

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
        return parent::$table = "demande";
    }

    public function rp():RP
    {
        $sql = "select p.* from " . self::table() . " d,personne p
        where  p.id=d.rp_id
        and p.role='ROLE_RP'
       and d.id=?";
       return parent::findBy($sql, [$this->id],true);
    }

    public function inscription():Inscription
    {
        $sql = "select p.* from " . self::table() . " d,inscription i
        where  i.id=d.inscription_id
       and d.id=?";
       return parent::findBy($sql, [$this->id],true);
    }
    public function insert(): int
    {
        $db = self::database();
        $db->connexionBD();
        $sql = "INSERT INTO " . self::table() . " (`libelle`,`etat_demande`,`inscription_id`,`rp_id`) VALUES (?,?,?,?);";
        $result =  $db->executeUpdate($sql, [$this->libelleDemande, $this->etat,1,8]);
        $db->closeConnexion();
        return $result;
    }
    
}