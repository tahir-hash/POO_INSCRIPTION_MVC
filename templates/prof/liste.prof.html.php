<div class="container mt-5">
  <h1 class="card-title">LISTE DES PROFS</h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom complet</th>
        <th scope="col">Grade</th>
        <th scope="col">Role</th>
      </tr>
    </thead>
    <tbody>
      <!--  <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->

      
    <?php  foreach ($data  as $value) : ?>
        <tr>
          <th scope="row"><?= $value->id ?></th>
          <td><?= $value->nom_complet ?></td>
          <td><?= $value->grade ?></td>
          <td><?= $value->role ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>