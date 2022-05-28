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
        $this->etat = "EN COURS";
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
    public static function alldemandes():array
    {
        $sql="select d.*,i.id as 'etud', p.nom_complet,p.matricule              
              from " . self::table() . " d,personne p,inscription i
              where i.id=d.inscription_id
              and   i.etudiant_id=p.id
              and p.role='ROLE_ETUDIANT'
              and d.etat_demande like 'en cours' order by d.id desc";
        return parent::findBy($sql);
    }
    public function rp():RP
    {
        $sql = "select p.* from " . self::table() . " d,personne p
        where  p.id=d.rp_id
        and p.role='ROLE_RP'
       and d.id=?";
       return parent::findBy($sql, [$this->id],true);
    }
    public static function findInscription($id):object|null
    {
        $sql = "select i.* from " . self::table() . " d,inscription i
        where  i.id=d.inscription_id
       and i.id=?";
       return parent::findBy($sql, [$id],true);
    }
   
    public function insertDemand($idIns): int
    {
        $db = self::database();
        $db->connexionBD();
        $sql = "INSERT INTO " . self::table() . " (`libelle`,`etat_demande`,`inscription_id`,`rp_id`) VALUES (?,?,?,?);";
        $result =  $db->executeUpdate($sql, [$this->libelleDemande, $this->etat,$idIns,null]);
        $db->closeConnexion();
        return $result;
    }
    public function refusDemande($id,$rp): int
    {
        $db = self::database();
        $db->connexionBD();
        $sql = "UPDATE"." ". self::table() ." SET `etat_demande`= ?,`rp_id`=? WHERE `id` = ?";
        $result =  $db->executeUpdate($sql, ["REFUSER",$rp,$id]);
        $db->closeConnexion();
        return $result;
    }
    public function validerDemande($id,$rp): int
    {
        $db = self::database();
        $db->connexionBD();
        $sql = "UPDATE"." ". self::table() ." SET `etat_demande`= ?,`rp_id`=? WHERE `id` = ?";
        $result =  $db->executeUpdate($sql, ["VALIDER",$rp,$id]);
        $db->closeConnexion();
        return $result;
    }
}