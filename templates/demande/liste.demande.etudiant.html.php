<div class="container mt-5">

  <h1 class="card-title">La Liste des demandes de <?= strtoupper($_SESSION['user']->nom_complet);?></h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Libelle</th>
        <th scope="col">Etat demande</th>
      </tr>
    </thead>
    <tbody>
    <?php  foreach ($data  as $value) : ?>
        <tr>
          <td><?= $value->libelle ?></td>
          <td><?= $value->etat_demande ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
