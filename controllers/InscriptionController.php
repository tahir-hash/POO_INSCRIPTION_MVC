<?php

namespace App\Controller;

use App\Core\Role;
use App\Core\Controller;
use App\Model\Classe;
use App\Model\Etudiant;
use App\Model\Inscription;

class InscriptionController extends Controller
{

    public function listerEtudiant()
    {
        if ($this->request->isGet()) {
            if (!Role::isRP() && !Role::isAC()) {
                $this->redirectToRoute('login');
            } else {
                $inscrire = Inscription::findAll();
                $this->render('inscription/liste.etudiant.html.php', $data = [
                    'inscrire' => $inscrire
                ]);
            }
        }
    }

    public function inscrireEtudiant()
    {
        if ($this->request->isGet()) {
            if (!Role::isAC()) {
                $this->redirectToRoute('login');
            } else {
                $classe = Classe::findAll();
                $title = "INSCRIRE UN ETUDIANT";
                $this->render('inscription/inscrire.etudiant.html.php', $data = [
                    'classe' => $classe,
                    'title' => $title,
                    "disabled" => ""
                ]);
            }
        }
        if ($this->request->isPost()) {
            $etudiant = $this->instance(Etudiant::class, [
                'nomComplet' => $_POST['nomComplet'],
                'sexe' => $_POST['sexe'],
                'adresse' => $_POST['adresse']
            ]);
            $id_etu = $etudiant->insert();
            $inscriptio_etu = $this->instance(Inscription::class, [
                'etudiant_id'                => $id_etu,
                'classe'                 => $_POST['classe']
            ]);
            $inscriptio_etu->insert();
            $this->redirectToRoute("add-inscription");
        }
    }
    public function reinscriptionEtudiant()
    {
        if ($this->request->isGet()) {
            $id = explode('=', self::decode($this->request->query()[0]));
            $id = intval($id[1]);
            $classe = Classe::findAll();
            $test = Inscription::findById($id);
            $inscription = json_decode(json_encode($test), true);
            //dd($inscription);
            $title = "REINSCRIRE UN ETUDIANT";
            $this->render('inscription/inscrire.etudiant.html.php', $data = [
                'classe' => $classe,
                'title' => $title,
                'inscription' => $inscription,
            ]);
        }
        if ($this->request->isPost()) {
            $id_etu=$this->request->request()['id'];
            $id_ins=$this->request->request()['id_ins'];
            $inscriptio_etu = $this->instance(Inscription::class, [
                'etudiant_id'=> $id_etu,
                'classe'=> $_POST['classe']
            ]);
            $inscriptio_etu->insert();
            $inscriptio_etu->updateReinscription($id_ins);
            $this->redirectToRoute("lister-inscription");
        }
    }
}
