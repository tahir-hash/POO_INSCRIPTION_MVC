<?php

namespace App\Controller;

use App\Core\Role;
use App\Core\Controller;
use App\Model\Professeur;

class ProfesseurController extends Controller{
    public function affecterClasse(){
        
    }
    public function listerProf(){
        if ($this->request->isGet()) {
            if (!Role::isConnect()) {
                $this->redirectToRoute('login');
            } else {
                $data=Professeur::findAll();
                $this->render('prof/liste.prof.html.php',$data);
            }
        }
        /* if ($this->request->isPost()) {
            //validation
            $user_connect = User::findUserByLoginAndPassword($_POST['login'], $_POST['password']);
            if ($user_connect != NULL) {
                $this->session->setSession('user', $user_connect);
                $this->render('personne/acceuil.html.php');
            } else {
                dd('error');
            }
        } */
    }
}