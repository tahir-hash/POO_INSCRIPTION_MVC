<div class="container mt-5">
  <h1 class="card-title">LISTE DES PROFS</h1>
  <button type="submit" class="btn btn-primary m-3">
    <a class="badge" href="<?= $Constantes::WEB_ROOT . "add-prof" ?>">AJOUTER PROFESSEUR</a>
  </button>
  <form action="<?= $Constantes::WEB_ROOT . "lister-profs" ?>" method="POST" id="form">
    <select class="form-select w-50" aria-label="Default select example" id="selection" name="module">
      <option value="" selected disabled>Filtrer par Module</option>
      <?php foreach ($modules as $module) : ?>
        <option value="<?= $module->id ?>"><?= $module->libelle ?></option>
      <?php endforeach ?>
    </select>
    <input class=" col-1  btn btn-primary btn-lg" type="submit" value="Search" id="submit_prof" />

  </form>
  <table class="table table-striped" id="test">
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
          <td><?= ucwords($value->nom_complet) ?></td>
          <td><?= ucwords($value->grade) ?></td>
          <td><?= ucwords($value->role) ?></td>
          <td>
            <button type="submit" class="btn btn-primary m-3">
              <a class="badge" href="<?= $Constantes::WEB_ROOT . "logout" ?>"> AFFECTER CLASSE</a>
            </button>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  
</div>