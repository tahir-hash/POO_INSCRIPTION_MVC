<?php

namespace App\Core;
use App\Core\Request;
use App\Model\Etudiant;
use Digia\InstanceFactory\InstanceFactory;

class Controller{

    protected Request $request;
    protected Session $session;
    public function __construct(Request $request){

        $this->request = $request;
        $this->session=new Session;
    }
    
    public function instance(string $classe, array $data)
    {
        return $instanced= InstanceFactory::fromProperties($classe,$data);
    }
    
    public function render(string $path, array $data=[]){
        $data["Constantes"]=Constantes::class;
       // $data["request"]=$this->request;
        ob_start();
        extract($data);
        require_once(Constantes::ROOT()."templates/".$path);
        $contents_for_views=ob_get_clean();
        require_once(Constantes::ROOT()."templates/layout/base.html.php");
    }
    

    public function redirectToRoute($uri){
        header("location:".Constantes::WEB_ROOT.$uri);
        exit();
    }
}