<?php 

namespace App\Model;

use App\Core\Model;

class Inscription extends Model{
   //Attributs Instances
     //Attributs navigationnels => attributs issus des associations
    private int $id;
   
    public function __construct()
    {

    }
    //ManyToOne => AC
   public function ac():AC{
       $sql="select p.* from ".parent::table()." i,personne 
                      p where  p.id=i.ac_id
                      and p.role like 'ROLE_AC'
                      and i.id=?";
        return parent::findBy($sql,[$this->id]);
   }
    //ManyToOne => AnneeScolaire
    public function anneeScolaire():AnneeScolaire{
         $sql="select a.* from annee_scolaire a,inscription i 
                       where  a.id=i.annee_id
                      and i.id=?";
        return parent::findBy($sql,[$this->id]) ;
    }


}