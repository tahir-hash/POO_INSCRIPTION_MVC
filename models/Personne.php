<?php

namespace App\Model;

use App\Core\Model;


abstract class Personne extends Model
{
    //Attributs Intances =>  
    protected int $id;
    protected string $nomComplet;
    protected static string $role;
    //Attributs classes ou static 
    private static int $nbrePersonne;
    //Methodes Abstraites

    //Constructeur Par defaut
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
    public static function getNbrePersonne(): int
    {
        return self::$nbrePersonne;
    }
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
    public  static function setNbrePersonne(int $nbrePersonne): void
    {
        self::$nbrePersonne = $nbrePersonne;
    }
}
