<div class="container mt-5">
  <h1 class="card-title">LISTE DES MODULES DE L'ECOLE</h1>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Libelle	</th>
      </tr>
    </thead>
    <tbody>
    <?php  foreach ($module  as $value) : ?>
        <tr>
          <th scope="row"><?= $value->id ?></th>
          <td><?= $value->libelle ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
  </table>
</div>