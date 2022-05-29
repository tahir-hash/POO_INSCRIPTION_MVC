<?php

namespace App\Controller;

use App\Core\Role;
use App\Model\Classe;
use App\Core\Controller;
use Digia\InstanceFactory\InstanceFactory;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\NotBlank;

class ClasseController extends Controller
{
    private array $niveau = ["L1", "L2", "L3", "M1", "M2", "DOCTORAT"];
    private array $filiere = [
        "INFORMATIQUE DE GESTION", "GENIE LOGICIEL", "MARKETING", "GESTION DE PROJET",
        "MANAGEMENT", "DROIT DES AFFAIRES"
    ];

    public function listerClasse()
    {
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            } else {
                $classe = Classe::findAll();
                $this->render('classe/liste.classe.html.php', $data = [
                    'classe' => $classe
                ]);
            }
        }
    }

    public function creerClasse()
    {
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            } else {
                $title = "AJOUTER CLASSE";
                $this->render('classe/create.html.php', $data = [
                    'title' => $title,
                    'filiere'=>$this->filiere,
                    'niveau'=>$this->niveau
                ]);
            }
        }
        if ($this->request->isPost()) {
            $classe = $this->instance(Classe::class, $_POST);
            $validator = Validation::createValidator();
            $violations = $validator->validate($_POST['filiere'], [
                new NotBlank(),
            ]);
            $violation2 = $validator->validate($_POST['libelleClasse'], [
                new NotBlank(),
            ]);
            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    $this->session->setSession('errors', $violation->getMessage());
                    $this->redirectToRoute('add-classe');
                }
            }
            else if (0 !== count($violation2)) {
                // there are errors, now you can show them
                foreach ($violation2 as $violation) {
                    $this->session->setSession('test', $violation->getMessage());
                    $this->redirectToRoute('add-classe');
                }
            }
             else {
                //dd("insert");
                $classe->insert();
                $this->redirectToRoute('add-classe');
            }
        }
    }
    public function deleteClasse()
    {
        if ($this->request->isPost()) {
            $id = $this->request->request()['id_delete'];
            //  dd($id);
            Classe::delete($id);
            $this->redirectToRoute('classes');
        }
    }
    public function updateClasse()
    {
        if ($this->request->isGet()) {
            $id = explode('=', self::decode($this->request->query()[0]));
            $id = intval($id[1]);
            //dd();
            $test = Classe::findById($id);
            $classe = json_decode(json_encode($test), true);
            $title = "MODIFIER CLASSE";
            $this->render('classe/create.html.php', $data = [
                'classe' => $classe,
                'title' => $title,
                'niveau'=>$this->niveau,
                'filiere'=>$this->filiere,
                "selected"=>""

            ]);
        }
        if ($this->request->isPost()) {
            $id=$this->request->request()['id'];
            $classe = $this->instance(Classe::class, $this->request->request());
            $classe->update($id);
            $this->redirectToRoute('add-classe');
        }
    }
}
