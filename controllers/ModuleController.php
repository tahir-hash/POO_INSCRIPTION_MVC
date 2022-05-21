<?php

namespace App\Controller;

use App\Core\Role;
use App\Core\Controller;
use App\Model\Module;
use App\Model\Professeur;

class ModuleController extends Controller
{
    public function listerModule()
    {
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            } else {
                $module = Module::findAll();
                $profs = Professeur::findAll();
                //dd($profs);
                $this->render('module/liste.module.html.php', $data = [
                    "module" => $module,
                    "profs" => $profs
                ]);
            }
        }
        if ($this->request->isPost()) {
            $module = Professeur::modules($_POST['prof']);
            $profs = Professeur::findAll();
            // dd(end($profs));
            //dd($profs);
            $this->render('module/liste.module.html.php', $data = [
                "module" => $module,
                "profs" => $profs
            ]);
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
            $this->render('module/create.html.php');

            //dd($classe);
        }
    }

    public function listerProfModule()
    {
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            } else {
                dd($_GET);
                $profs = Module::professeurs(2);
                $modules = Module::findAll();
                // dd(end($profs));
                $this->render('prof/liste.prof.html.php', $data = [
                    "profs" => $profs,
                    "modules" => $modules
                ]);
            }
        }
    }
}
