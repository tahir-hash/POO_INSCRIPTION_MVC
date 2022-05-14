<?php

namespace App\Controller;

use App\Core\Controller;

class SecurityController extends Controller
{
    public function authentification()
    {
        //get
        if ($this->request->isGet()) {
            $this->render('security/login.html.php');
        }
    }

    public function deconnexion()
    {
        $this->redirectToRoute('login');
    }
}
