<div class="container mt-5">
  <h1 class="card-title">LISTE DES MODULES DE L'ECOLE</h1>
  <button type="submit" class="btn btn-primary m-3">
    <a class="badge" href="<?= $Constantes::WEB_ROOT . "add-module" ?>">AJOUTER UN MODULE</a>
  </button>
  <select class="form-select w-50" aria-label="Default select example">
    <option selected>Filtrer par Prof</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Libelle </th>
        <th scope="col">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($module  as $value) : ?>
        <tr>
          <th scope="row"><?= $value->id ?></th>
          <td><?= $value->libelle ?></td>
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