<?php

use App\Model\test;
use App\Model\Classe;
use App\Model\Demande;
use App\Model\Etudiant;
use App\Model\Professeur;
use App\Controller\ProfesseurController;

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require("../vendor/autoload.php");  

  require_once("../core/Fonctions.php");

  require_once("../routes/Route.web.php");
