<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\Role;
use App\Model\Classe;
use Digia\InstanceFactory\InstanceFactory;

class ClasseController extends Controller
{
    public function listerClasse()
    {
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            }
             else {
                 $classe=Classe::findAll();
                $this->render('classe/liste.classe.html.php',$data=[
                    'classe'=>$classe
                ]);
            }
        }
        //dd("je suis dans le controller classe dans l action lister classe");
    }

    public function creerClasse()
    {
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            }
             else {
                $this->render('classe/create.html.php');
            }
        }
        if ($this->request->isPost()) {
            $classe = $this->instance(Classe::class, $_POST);
            $classe->insert();
            $this->render('classe/create.html.php');
        }
    }
}
