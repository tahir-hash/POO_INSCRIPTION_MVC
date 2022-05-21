<?php
namespace App\Model;

use App\Core\Model;

class ModuleProfesseur extends Model
{
    private int $id;
    private int $moduleId;
    private int $profId;
    
    public function __construct(?int $moduleId = null, ?int $profId = null)
    {
        $this->moduleId = $moduleId;
        $this->profId  = $profId;
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

    /**
     * Get the value of moduleId
     */ 
    public function getModuleId()
    {
        return $this->moduleId;
    }

    /**
     * Set the value of moduleId
     *
     * @return  self
     */ 
    public function setModuleId($moduleId)
    {
        $this->moduleId = $moduleId;

        return $this;
    }
    public static function table()
    {
        return parent::$table = "prof_module";
    }
    public function insert(): int
    {
        $db = self::database();
        $db->connexionBD();
        $sql = "INSERT INTO " . self::table() . " (`module_id`,`prof_id`) VALUES (?,?);";
        $result =  $db->executeUpdate($sql, [$this->moduleId, $this->profId]);
        $db->closeConnexion();
        return $result;
    }
}