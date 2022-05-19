<div class="container mt-5">
  <h1 class="card-title">LISTE DES PROFS</h1>
  <button type="submit" class="btn btn-primary m-3">
    <a class="badge" href="<?= $Constantes::WEB_ROOT ."add-prof" ?>">AJOUTER PROFESSEUR</a>
  </button>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom complet</th>
        <th scope="col">Grade</th>
        <th scope="col">Role</th>
        <th scope="col">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($profs as $key => $value) : ?>
        <tr>
          <th scope="row"><?= $key + 1 ?></th>
          <td><?= $value->nom_complet ?></td>
          <td><?= $value->grade ?></td>
          <td><?= $value->role ?></td>
          <!-- <td>
            <i class="fa fa-edit fa-2x blue"></i>
            <i class="fa fa-trash fa-2x red"></i>
            <i class="fa fa-circle-info fa-2x vert"></i>
          </td> -->
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