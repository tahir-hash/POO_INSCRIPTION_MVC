<div class="container mt-5">
  <h1 class="card-title">LISTE DES PROFS</h1>

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
      <?php foreach ($profs as $value) : ?>
        <tr>
          <th scope="row"><?= $value->id ?></th>
          <td><?= $value->nom_complet ?></td>
          <td><?= $value->grade ?></td>
          <td><?= $value->role ?></td>
          <td>
            <i class="fa fa-edit fa-2x blue"></i>
            <i class="fa fa-trash fa-2x red"></i>
            <i class="fa fa-circle-info fa-2x vert"></i>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>