<?php
namespace App\Model;

use App\Core\Model;

class Module extends Model
{
    private int $id;
    private string $libelle;

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
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }
    public static function table()
    {
        return parent::$table = "module";
    }
    public function rp():RP
    {
        $sql = "select p.* from " . self::table() . " m,personne p
        where  p.id=m.rp_id
        and p.role='ROLE_RP'
       and m.id=?";
       return parent::findBy($sql, [$this->id],true);
    }
}