<?php
namespace App\Controller;

use App\Core\Role;
use App\Core\Controller;
use App\Model\Classe;
use App\Model\Etudiant;
use App\Model\Inscription;

class InscriptionController extends Controller{
    
    public function listerEtudiant(){
        if ($this->request->isGet()) {
            if (!Role::isRP()&& !Role::isAC()) {
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

    public function inscrireEtudiant(){
        if ($this->request->isGet()) {
            if (!Role::isAC()) {
                $this->redirectToRoute('login');
            }
             else
            {
                $classe=Classe::findAll();
                $this->render('inscription/inscrire.etudiant.html.php',$data=[
                    'classe'=>$classe
                ]);
            }
        }
        if ($this->request->isPost()) {
            $etudiant= $this->instance(Etudiant::class, [
                'nomComplet'=> $_POST['nomComplet'],
                'sexe'=>$_POST['sexe'],
                'adresse'=> $_POST['adresse']
            ]);
            $id_etu=$etudiant->insert();
            
            //dd($id_etu);
            $inscriptio_etu=$this->instance(Inscription::class,[
                'etudiant_id'                => $id_etu,
                'classe'                 => $_POST['classe']
            ]);
            $inscriptio_etu->insert();
            $this->redirectToRoute("add-inscription");
        }
    }

}