<?php

use App\Core\Router;
use App\Controller\ClasseController;
use App\Controller\PersonneController;
use App\Controller\SecurityController;
use App\Controller\ProfesseurController;
use App\Exception\RouteNotFoundException;


$router = new Router;
$router->route('/login',[SecurityController::class,"authentification"]);
$router->route('/logout',[SecurityController::class,"deconnexion"]);
$router->route('/classes',[ClasseController::class,"listerClasse"]);
$router->route('/add-classe',[ClasseController::class,"creerClasse"]);
$router->route('/personnes',[PersonneController::class,"lister"]);
$router->route('/lister-profs',[ProfesseurController::class,"listerProf"]);






try {
  $router->resolve();
} catch (RouteNotFoundException $ex) {
  echo $ex->message; 
}