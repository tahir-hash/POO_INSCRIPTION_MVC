<?php 

namespace App\Model;

use App\Core\Model;

class AnneeScolaire extends Model{

    //Fonctions navigationnelles

    //OneToMany
    public function inscriptions():array{
        return [];
    }

  
}