<?php

namespace App\Model;

use App\Core\Model;


abstract class Personne extends Model
{
    //Attributs Intances =>  
    protected int $id;
    protected string $nomComplet;
    protected string $sexe;
    protected static string $role;
   
    public function __construct()
    {
    }
    public static function getRole()
    {
        return self::$role = '';
    }
    public static function table()
    {
        return parent::$table = "personne";
    }
    //Getters 
    public function getId(): int
    {
        return $this->id;
    }
    public function getNomComplet(): string
    {
        return $this->nomComplet;
    }
    //:: Operateur de portee de classe
    //Setters
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    public function setNomComplet(string $nomComplet): self
    {
        $this->nomComplet = $nomComplet;
        return $this;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }
    public static function findAll(): array
    {
        $sql = "select * from " . self::table() . " where role  like ?";
        return parent::findBy($sql, [get_called_class()::getRole()]);
    }
}
