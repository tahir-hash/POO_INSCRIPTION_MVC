<?php
namespace App\Controller;

use App\Core\Role;
use App\Core\Controller;
use App\Model\Inscription;

class InscriptionController extends Controller{
    public function listerEtudiant(){
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            }
             else
            {
                $inscrire=Inscription::findAll();
                $this->render('inscription/liste.etudiant.html.php',$data=[
                    'inscrire'=>$inscrire
                ]);
            }
        }
    }

}