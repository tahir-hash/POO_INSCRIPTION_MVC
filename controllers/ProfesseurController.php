<?php

namespace App\Controller;

use App\Core\Role;
use App\Core\Controller;
use App\Model\Professeur;


class ProfesseurController extends Controller{
    public function ajouterProf(){
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            }
             else {
                $this->render('prof/create.html.php');
            }
        }
        if ($this->request->isPost()) {
            $profs = $this->instance(Professeur::class, $_POST);
            $profs->insert();
            $this->render('prof/create.html.php');
        }
    }
    public function listerProf(){
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            } else {
                $profs=Professeur::findAll();
               //dd($data);
                $this->render('prof/liste.prof.html.php',$data=[
                    "profs"=>$profs
                ]);
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