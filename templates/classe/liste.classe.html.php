<div class="container mt-5">
  <h1 class="card-title">LISTE DES CLASSES DE L'ECOLE</h1>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Libelle	</th>
        <th scope="col">Filiere	</th>
        <th scope="col">Niveau</th>

      </tr>
    </thead>
    <tbody>
    <?php  foreach ($classe  as $value) : ?>
        <tr>
          <th scope="row"><?= $value->id ?></th>
          <td><?= $value->libelle ?></td>
          <td><?= $value->filiere ?></td>
          <td><?= $value->niveau ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
  </table>
</div>