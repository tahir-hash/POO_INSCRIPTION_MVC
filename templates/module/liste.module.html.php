<div class="container mt-5">
  <h1 class="card-title">LISTE DES MODULES DE L'ECOLE</h1>
  <form action="<?= $Constantes::WEB_ROOT . "add-module" ?>" method="POST">

    <div class="row">
      <div class="col-md-6 mb-4">

        <div class="form-outline">
          <label class="form-label" for="firstName">Ajouter Module</label>
          <input type="text" id="firstName" name="libelle" class="form-control form-control-lg" />
        </div>
      </div>
      <div class="col-md-6 mt-4">
        <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
      </div>
    </div>
  </form>
  <!-- Ajouter module -->
  <!-- filtrer -->
  <form action="<?= $Constantes::WEB_ROOT . "lister-module" ?>" method="POST">
    <select class="form-select w-50" aria-label="Default select example" name="prof">
      <option value="" selected disabled>Filtrer par Professeur</option>
      <?php foreach ($profs  as $prof) : ?>
        <option value="<?= $prof->id ?>"><?= $prof->nom_complet ?></option>
      <?php endforeach ?>
    </select>
    <input class=" col-1  btn btn-primary btn-lg mt-2" type="submit" value="Search" id="submit_prof" />
  </form>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Libelle </th>
        <th scope="col">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($module  as $key => $value) : ?>
        <tr>
          <th scope="row"><?= $key + 1 ?></th>
          <td><?= ucwords($value->libelle) ?></td>
          <td>
            <button type="submit" class="btn btn-info m-3">
              <a class="badge"> INFO</a>
            </button>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>