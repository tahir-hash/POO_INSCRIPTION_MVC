<div class="container mt-5">

  <h1 class="card-title">La Liste des demandes de <?= strtoupper($_SESSION['user']->nom_complet);?></h1>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Libelle</th>
        <th scope="col">Etat demande</th>
        <th scope="col">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
    <?php  foreach ($demande as $value) : ?>
        <tr>
          <td><?= $value->libelle ?></td>
          <td><?= $value->etat_demande ?></td>
          <td>
            <button type="submit" class="btn btn-primary m-3">
              <a class="badge" href="<?= $Constantes::WEB_ROOT . "logout" ?>"> DETAILS</a>
            </button>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
