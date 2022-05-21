<?php

use App\Controller\ProfesseurController;
use App\Model\Professeur;

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require("../vendor/autoload.php");  

  require_once("../core/Fonctions.php");

  require_once("../routes/Route.web.php");

 //dd(Professeur::modules(24));
//dd(ProfesseurController::getMatricule(3));
  