<?php
namespace App\Controller;

use App\Core\Role;
use App\Model\Demande;
use App\Core\Controller;
use App\Model\Inscription;

class DemandeController extends Controller{
    public function listOwnDemand(){
        if ($this->request->isGet()) {
            if (!Role::isEtudiant()) {
                $this->redirectToRoute('login');
            }
            else
            {
                $data=Inscription::demandes($this->session->getSession('user')->id);
                //$data[]=$this->session->getSession('user')->nom_complet;
              //  dd($data);
                $this->render('demande/liste.demande.etudiant.html.php',$data);
            }
        }
    }
}