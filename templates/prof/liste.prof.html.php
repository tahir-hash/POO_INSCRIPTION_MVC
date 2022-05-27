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
    <input class=" col-1  btn btn-primary btn-lg mt-2" type="submit" value="Search" id="submit_prof" />

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
      <?php foreach ($pagination['profs'] as $key => $value) : ?>
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
  <nav aria-label="...">
    <ul class="pagination">
      <?php if ($pagination['currentPage'] > 1) : ?>
        <li class="page-item">
          <a class="page-link" href="http://localhost:8000/lister-profs/?page=<?= $pagination['currentPage'] - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
      <?php endif ?>
      <?php for($i=1;$i<=$pagination['pages'];$i++) :?>
        <li class="page-item" aria-current="page">
        <a class="page-link" href="http://localhost:8000/lister-profs/?page=<?= $i ?>"><?=$i?></a>
      </li> 
      <?php endfor ?>

      <?php if ($pagination['currentPage'] < $pagination['pages']) : ?>
        <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
          <a class="page-link" href="http://localhost:8000/lister-profs/?page=<?= $pagination['currentPage'] + 1; ?>">Next</a>
        </li>
      <?php endif ?>

    </ul>
  </nav>
</div>

<!-- <li class="page-item active" aria-current="page">
        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
      </li> -->