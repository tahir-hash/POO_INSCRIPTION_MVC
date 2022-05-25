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
        //dd("je suis dans le controller classe dans l action lister classe");
    }

    public function creerClasse()
    {
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            } else {
                $classe = [
                    "id" => 0,
                    "libelle" => "",
                    "filiere" => "",
                    "niveau" => ""
                ];
                $this->render('classe/create.html.php', $data = [
                    'classe' => $classe
                ]);
            }
        }
        if ($this->request->isPost()) {
            $classe = $this->instance(Classe::class, $_POST);
            $validator = Validation::createValidator();
            $violations = $validator->validate($_POST['filiere'], [
                new NotBlank(),
            ]);
            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    $this->session->setSession('errors',$violation->getMessage());
                    $this->redirectToRoute('add-classe');
                }

            }
            else
            {
                dd("insert");
               /*  $classe->insert();
                $this->redirectToRoute('add-classe'); */
            }
            
        }
    }
    public function deleteClasse()
    {
        if ($this->request->isGet()) {

            $id = explode('=', $this->request->query()[0]);
            $id = intval($id[1]);
            Classe::delete($id);
            $this->redirectToRoute('classes');
        }
    }
    public function updateClasse()
    {
        if ($this->request->isGet()) {
            $id = explode('=', $this->request->query()[0]);
            $id = intval($id[1]);
            $test = Classe::findById($id);
            $classe = json_decode(json_encode($test), true);
            $this->render('classe/create.html.php', $data = [
                'classe' => $classe
            ]);
        }
        if ($this->request->isPost()) {
            $classe = $this->instance(Classe::class, $_POST);
            $classe->update();
            $this->redirectToRoute('add-classe');
        }
    }
}
