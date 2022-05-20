<?php

use App\Core\Role;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
  <link rel="stylesheet" href="<?= $Constantes::WEB_ROOT . 'css/login.style.css' ?>">
  <link rel="stylesheet" href="<?= $Constantes::WEB_ROOT . 'bootstrap/bootstrap.min.css' ?>">
  <title>Document</title>
</head>

<body>
  <?php if (!$_SESSION == NULL) : ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar brand -->
          <a class="navbar-brand mt-2 mt-lg-0" href="#">
            <img src="<?= $Constantes::WEB_ROOT . 'image/logo.png' ?>" height="100" alt="MBAYE PRO Logo" loading="lazy" />
          </a>
          <!-- Left links -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php if (Role::isRP()) : ?>
              <li class="nav-item">
                <a class="nav-link text-light h5" href="<?= $Constantes::WEB_ROOT . 'add-classe' ?>">Creer classe</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light h5" href="<?= $Constantes::WEB_ROOT . 'classes' ?>">Lister classe</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light h5" href="<?= $Constantes::WEB_ROOT . 'add-module' ?>">Ajouter module</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light h5" href="<?= $Constantes::WEB_ROOT . 'lister-module' ?>">Lister Module</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light h5" href="<?= $Constantes::WEB_ROOT . 'add-prof' ?>">Ajouter prof</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light h5" href="<?= $Constantes::WEB_ROOT . 'lister-profs' ?>">lister prof</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light h5" href="<?= $Constantes::WEB_ROOT . 'lister-inscription' ?>">lister etudiant inscrits</a>
              </li>
            <?php endif ?>
            <?php if (Role::isAC()) : ?>
              <li class="nav-item">
                <a class="nav-link text-light h5" href="<?= $Constantes::WEB_ROOT . 'add-inscription' ?>">Inscrire un etudiant</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light h5" href="<?= $Constantes::WEB_ROOT . 'lister-inscription' ?>">lister etudiant inscrits</a>
              </li>
            <?php endif ?>
            <?php if (Role::isEtudiant()) : ?>
              <li class="nav-item">
                <a class="nav-link text-light h5" href="<?= $Constantes::WEB_ROOT . 'lister-own' ?>">Lister mes demandes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light h5" href="<?= $Constantes::WEB_ROOT . 'add-demande' ?>">Formuler Demandes</a>
              </li>
            <?php endif ?>

          </ul>
          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
          <button type="submit" class="btn btn-danger m-3">
            <a class="badge" href="<?= $Constantes::WEB_ROOT . "logout" ?>"> LOG OUT</a>
          </button>

        </div>
    </nav>
  <?php endif ?>
  <!-- END NAVBAR-->
  <?= $contents_for_views ?>
  <script src="<?= $Constantes::WEB_ROOT . 'bootstrap/bootstrap.bundle.min.js' ?>"></script>
</body>

</html>