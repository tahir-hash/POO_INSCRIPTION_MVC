<?php
namespace App\Model;

use App\Core\Model;

class ClasseProfesseur extends Model
{
    private  int $id;
    private  int $classeId;
    private  int $profId;

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
     * Get the value of classeId
     */ 
    public function getClasseId()
    {
        return $this->classeId;
    }

    /**
     * Set the value of classeId
     *
     * @return  self
     */ 
    public function setClasseId($classeId)
    {
        $this->classeId = $classeId;

        return $this;
    }

    /**
     * Get the value of profId
     */ 
    public function getProfId()
    {
        return $this->profId;
    }

    /**
     * Set the value of profId
     *
     * @return  self
     */ 
    public function setProfId($profId)
    {
        $this->profId = $profId;

        return $this;
    }

    public static function table()
    {
        return parent::$table = "prof_classe";
    }

    public function anneeScolaire():AnneeScolaire
    {
        $sql = "select a.* from " . self::table() . " c,annee_scolaire a
        where  a.id=c.annee_id
        and c.id=?";
       return parent::findBy($sql, [$this->id],true);
    }

}