
<div class="container mt-5">
  <h1 class="card-title">La Liste des demandes</h1>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Libelle</th>
        <th scope="col">Etat demande</th>
        <th scope="col">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($demande as $key => $value) : ?>
        <tr>
          <td><?= $key +1 ?></td>
          <td><?= ucwords($value->libelle) ?></td>
          <td><?= ucwords($value->nom_complet) ?></td>
          <td><?= ucwords($value->matricule) ?></td>
          <td><?= ucwords($value->etat_demande) ?></td>
          <td>
            <button type="submit" class="btn btn-primary m-3">
              <a class="badge" href="#"> DETAILS</a>
            </button>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>