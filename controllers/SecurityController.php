<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\Role;
use App\Model\User;

class SecurityController extends Controller
{
    public function authentification()
    {
        //get
        if ($this->request->isGet()) {
            $this->layout="connected";
            $this->render('security/login.html.php');
        }
        if ($this->request->isPost()) {
            //validation
            $user_connect = User::findUserByLoginAndPassword($_POST['login']);
            if ($user_connect != NULL) 
            {
                if(password_verify($_POST['password'],$user_connect->password))
                {
                    $this->session->setSession('user', $user_connect);
                    $this->session->setSession('annee',"2020-2021");
                    if(Role::isRP())
                    {
                        $this->redirectToRoute('lister-profs');
                    }
                    if(Role::isEtudiant())
                    {
                        $this->redirectToRoute('lister-own');
                    }
                    if(Role::isAC())
                    {
                        $this->redirectToRoute('add-inscription'); 
                    }
                }  
                else
                {
                    dd('password invalide');
                }
            } 
            else
            {
                dd('identifiant invalide');
            }
        }
    }

    public function deconnexion()
    {
        session_destroy();
        session_unset();
        $this->redirectToRoute('login');
    }
}
