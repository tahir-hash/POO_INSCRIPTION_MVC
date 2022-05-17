<?php
namespace App\Model;

use App\Core\Model;

class ModuleProfesseur extends Model
{
    private int $id;
    private int $profId;
    private int $moduleId;
    

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
}