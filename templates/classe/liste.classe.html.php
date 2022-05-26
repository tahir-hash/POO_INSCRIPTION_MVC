<style>
  .modal.test {
    display: block;
  }
</style>
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
            <a href="<?= $Constantes::WEB_ROOT . "update-classe/id=$value->id" ?>" class="badge">
              <button type="submit" class="btn btn-warning m-3 test">
                MODIFIER
              </button>
            </a>
            <form action="<?= $Constantes::WEB_ROOT . "delete-classe" ?>" class="btn" method="POST">
              <input type="hidden" name="id_delete" value="<?= $value->id ?>">
              <input type="submit" class="btn btn-danger test" value="SUPPRIMER" onclick="return confirmation()">
            </form>

          </td>
        </tr>
      <?php endforeach ?>

    </tbody>
  </table>
</div>

<script>
function confirmation()
{
  return confirm('Confirmer votre suppression!!');
}
</script>
<!-- <form action="<?= $Constantes::WEB_ROOT . "delete-classe" ?>" class="btn" method="POST">
              <input type="hidden" name="id_delete" value="<?= $value->id ?>">
              <input type="submit" class="btn btn-danger test" value="SUPPRIMER" onclick="return checkdelete()">
            </form> -->