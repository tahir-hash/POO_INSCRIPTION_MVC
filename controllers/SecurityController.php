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

            $this->render('security/login.html.php');
        }
        if ($this->request->isPost()) {
            //validation
            $user_connect = User::findUserByLoginAndPassword($_POST['login'], $_POST['password']);
            if ($user_connect != NULL) {
                $this->session->setSession('user', $user_connect);
                $this->render('personne/acceuil.html.php');
            } else {
                dd('error');
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
