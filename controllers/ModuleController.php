<?php

namespace App\Controller;

use App\Core\Role;
use App\Core\Controller;
use App\Model\Module;

class ModuleController extends Controller
{
    public function listerModule()
    {
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            } else {
                $module = Module::findAll();
                $this->render('module/liste.module.html.php', $data = [
                    "module" => $module
                ]);
            }
        }
    }
    public function ajouterModule()
    {
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            } else {
                $this->render('module/create.html.php');
            }
        }
        if ($this->request->isPost()) {
            /* $classe= InstanceFactory::fromProperties(Classe::class, [
                'libelleClasse'                => $_POST['libelleClasse'],
                'filiere'                 => $_POST['filiere'],
                'niveau' => $_POST['niveau']
            ]); */
            $module = $this->instance(Module::class, $_POST);
            $module->insert();
            //dd($classe);
        }
    }

    public function listerProf()
    {
    }
}
