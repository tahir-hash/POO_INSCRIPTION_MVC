<?php
namespace App\Controller;

use App\Core\Role;
use App\Model\Demande;
use App\Core\Controller;
use App\Model\Inscription;

class DemandeController extends Controller{
    private string $validate="VALIDER";
    private string $refus="REFUSER";

    public function listOwnDemand(){
        if ($this->request->isGet()) {
            if (!Role::isEtudiant()) {
                $this->redirectToRoute('login');
            }
            else
            {
                $demande=Inscription::demandes($this->session->getSession('user')->id);
            $this->render('demande/liste.demande.etudiant.html.php',$data=[
                "demande"=>$demande
            ]);
            }
        }
        if ($this->request->isPost()) {
            $id_user=$this->session->getSession('user')->id;
            $inscription=Inscription::inscription($id_user)->id;
            //dd($inscription);
            $demande_etud = $this->instance(Demande::class, $_POST);
            $demande_etud->insertDemand($inscription);
            $demande=Inscription::demandes($this->session->getSession('user')->id);
            $this->render('demande/liste.demande.etudiant.html.php',$data=[
                "demande"=>$demande
            ]);
        }
    }
    public function allDemand(){
        if ($this->request->isGet()) {
            if (!Role::isAC() && !Role::isRP()) {
                $this->redirectToRoute('login');
            }
            else
            {
                $demande=Demande::alldemandes();
                $this->render('demande/listerAll.html.php',$data=[
                    "demande"=>$demande
                ]);
            }
        }
    }

    public function traiterDemand(){ 
        if ($this->request->isPost()) {
            if($this->request->request()['action']=='refus')
            {
            $id=$this->request->request()['refus'];
            $rp=$this->session->getSession('user')->id;
            $demande=new Demande("","");
            $demande->refusDemande($id,$rp);
            $this->redirectToRoute('lister-demandes');
            }
            else
            {
                $id=$this->request->request()['validate'];
                $rp=$this->session->getSession('user')->id;
                $demande=new Demande("","");
                $demande->validerDemande($id,$rp);
                $inscription=new Inscription(null,null,null);
                $inscription->update($id);
                $this->redirectToRoute('lister-demandes');
            }
        }
    }
    
}