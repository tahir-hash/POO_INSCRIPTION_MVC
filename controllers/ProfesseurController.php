<?php

namespace App\Controller;

use App\Core\Role;
use App\Model\Classe;
use App\Model\Module;
use App\Core\Controller;
use App\Model\Professeur;
use App\Model\ClasseProfesseur;
use App\Model\ModuleProfesseur;


class ProfesseurController extends Controller
{
    public function ajouterProf()
    {
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            } else {
                $classes = Classe::findAll();
                $modules = Module::findAll();
                // dd(end($profs));
                $this->render('prof/create.html.php', $data = [
                    "classes" => $classes,
                    "modules" => $modules
                ]);
            }
        }
        if ($this->request->isPost()) {
            dd($_POST['module']);
            $profs = $this->instance(Professeur::class, [
                'nomComplet' => $_POST['nomComplet'],
                'sexe' => $_POST['sexe'],
                'grade' => $_POST['grade']
            ]);
            $id_prof = $profs->insert();
            foreach ($_POST['classe'] as $classeId) {
                $prof_classe = $this->instance(ClasseProfesseur::class, [
                    'profId' => $id_prof,
                    'classeId' => $classeId
                ]);
                $prof_classe->insert();
            }
            foreach ($_POST['module'] as $moduleId) {
                $prof_module = $this->instance(ModuleProfesseur::class, [
                    'profId' => $id_prof,
                    'moduleId' => $moduleId
                ]);
                $prof_module->insert();
            }
            $this->redirectToRoute('lister-profs');
        }
    }
    public function listerProf()
    {
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            } else {
                $pagination=$this->paginate(Professeur::class,Professeur::findAll(),5,"findTest");
                $modules = Module::findAll();
                $this->render('prof/liste.prof.html.php', $data = [
                    "modules" => $modules,
                    "pagination"=>$pagination
                ]);
            }
        }
        if ($this->request->isPost()) {
            /* $profs = Module::professeurs($_POST['module']);
            $modules = Module::findAll();
            // dd(end($profs));
            //dd($profs);
            $this->render('prof/liste.prof.html.php', $data = [
                "profs" => $profs,
                "modules" => $modules
            ]); */
            $pagination=$this->paginate(Professeur::class,Professeur::findAll(),5,"findTest");
            $pagination['profs']=Module::professeurs($_POST['module']);
          //  $pagination['profs'] = ;
                $modules = Module::findAll();
                $this->render('prof/liste.prof.html.php', $data = [
                    "modules" => $modules,
                    "pagination"=>$pagination
                ]);
        }
    }
}
