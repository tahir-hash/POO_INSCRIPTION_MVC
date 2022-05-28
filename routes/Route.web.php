<?php

use App\Core\Router;
use App\Controller\ClasseController;
use App\Controller\ModuleController;
use App\Controller\DemandeController;
use App\Controller\PersonneController;
use App\Controller\SecurityController;
use App\Controller\ProfesseurController;
use App\Controller\InscriptionController;
use App\Exception\RouteNotFoundException;


$router = new Router;
$router->route('/login',[SecurityController::class,"authentification"]);
$router->route('/logout',[SecurityController::class,"deconnexion"]);
$router->route('/classes',[ClasseController::class,"listerClasse"]);
$router->route('/update-classe',[ClasseController::class,"updateClasse"]);
$router->route('/delete-classe',[ClasseController::class,"deleteClasse"]);
$router->route('/add-classe',[ClasseController::class,"creerClasse"]);
$router->route('/personnes',[PersonneController::class,"lister"]);
$router->route('/lister-profs',[ProfesseurController::class,"listerProf"]);
$router->route('/add-prof',[ProfesseurController::class,"ajouterProf"]);
$router->route('/lister-inscription',[InscriptionController::class,"listerEtudiant"]);
$router->route('/add-inscription',[InscriptionController::class,"inscrireEtudiant"]);
$router->route('/lister-own',[DemandeController::class,"listOwnDemand"]);
$router->route('/lister-demandes',[DemandeController::class,"allDemand"]);
$router->route('/valider-demande',[DemandeController::class,"validDemand"]);
$router->route('/traiter-demande',[DemandeController::class,"traiterDemand"]);
$router->route('/lister-module',[ModuleController::class,"listerModule"]);
$router->route('/add-module',[ModuleController::class,"ajouterModule"]);
$router->route('/lister-prof-mod',[ModuleController::class,"listerProfModule"]);

try {
  $router->resolve();
} catch (RouteNotFoundException $ex) {
  echo $ex->message; 
}