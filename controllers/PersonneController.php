<?php
namespace App\Controller;

use App\Core\Controller;

class PersonneController extends Controller{
    
    public function lister(){
        $this->render('personne/liste.html.php');
    }
}