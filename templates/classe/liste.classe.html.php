<div class="container mt-5">
  <h1 class="card-title">LISTE DES CLASSES DE L'ECOLE</h1>
  <button type="submit" class="btn btn-primary m-3">
    <a class="badge" href="<?= $Constantes::WEB_ROOT . "add-classe" ?>">AJOUTER UNE CLASSE</a>
  </button>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Libelle </th>
        <th scope="col">Filiere </th>
        <th scope="col">Niveau</th>
        <th scope="col">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($classe  as $key => $value) : ?>
        <tr>
          <th scope="row"><?= $key + 1 ?></th>
          <td><?= ucwords($value->libelle)  ?></td>
          <td><?= ucwords($value->filiere)  ?></td>
          <td><?= ucwords($value->niveau) ?></td>
          <td>
            <button type="submit" class="btn btn-warning m-3">
              <a href="<?= $Constantes::WEB_ROOT . "update-classe/id=$value->id" ?>" class="badge"> MODIFIER</a>
            </button>
            <button type="submit" class="btn btn-danger m-3">
              <a href="<?= $Constantes::WEB_ROOT . "delete-classe/id=$value->id" ?>" class="badge"> SUPPRIMER</a>
            </button>
            <button type="submit" class="btn btn-info m-3">
              <a class="badge"> INFO</a>
            </button>
          </td>
        </tr>
      <?php endforeach ?>

    </tbody>
  </table>
</div>

<!-- 
<form action="<?= $Constantes::WEB_ROOT . "update-classe" ?>" method="POST">
  <input type="hidden" name="id" value="<?= $value->id ?>">
  <button type="submit" class="btn btn-warning m-3">
    MODIFIER
  </button>
</form> -->