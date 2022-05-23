<div class="container mt-5">
  <h1 class="card-title">LISTE DES MODULES DE L'ECOLE</h1>
  <button type="submit" class="btn btn-primary m-3">
    <a class="badge" href="<?= $Constantes::WEB_ROOT . "add-module" ?>">AJOUTER UN MODULE</a>
  </button>
  <form action="<?= $Constantes::WEB_ROOT . "lister-module" ?>" method="POST">
  <select class="form-select w-50" aria-label="Default select example" name="prof">
    <option value="" selected disabled>Filtrer par Professeur</option>
    <?php foreach ($profs  as $prof) : ?>
      <option value="<?= $prof->id ?>"><?= $prof->nom_complet ?></option>
    <?php endforeach ?>
  </select>
  <input class=" col-1  btn btn-primary btn-lg" type="submit" value="Search" id="submit_prof" />
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
      <?php foreach ($module  as $key=> $value) : ?>
        <tr>
          <th scope="row"><?= $key+1 ?></th>
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