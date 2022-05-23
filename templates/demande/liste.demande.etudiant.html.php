
<div class="container mt-5">
  <h1 class="card-title">La Liste des demandes de <?= strtoupper($_SESSION['user']->nom_complet); ?></h1>
  <form action="<?= $Constantes::WEB_ROOT . "lister-own" ?>" method="POST">

<div class="row">
  <div class="col-md-6 mb-4">

    <div class="form-outline">
      <label class="form-label w-50" for="firstName">Libelle Demande</label>
      <input type="text" id="firstName" name="libelleDemande" class="form-control form-control-lg" />
    </div>
  </div>
</div>


  <input class="btn btn-primary btn-lg" type="submit" value="Submit" />


</form>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Libelle</th>
        <th scope="col">Etat demande</th>
        <th scope="col">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($demande as $key => $value) : ?>
        <tr>
          <td><?= ucwords($value->libelle) ?></td>
          <td><?= ucwords($value->etat_demande) ?></td>
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