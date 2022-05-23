<div class="container mt-5">
  <h1 class="card-title">LISTE DES ETUDIANTS INSCRITS</h1>
  <button type="submit" class="btn btn-primary m-3">
    <a class="badge" href="<?= $Constantes::WEB_ROOT ."add-inscription" ?>">FAIRE UNE INSCRIPTION</a>
  </button>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Matricule</th>
        <th scope="col">Nom complet</th>
        <th scope="col">Classe</th>
        <th scope="col">Sexe</th>
        <th scope="col">Annee scolaire</th>
        <th scope="col">Etat inscription</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php  foreach ($inscrire  as $value) : ?>
        <tr>
          <td><?=ucwords($value->matricule)  ?></td>
          <td><?=ucwords($value->nom_complet)  ?></td>
          <td><?=ucwords($value->libClasse)  ?></td>
          <td><?=ucwords($value->sexe)  ?></td>
          <td><?=ucwords($value->libelle)  ?></td>
          <td><?=ucwords($value->etat_ins)  ?></td>
          <td>
            <button type="submit" class="btn btn-info m-3">
              <a class="badge" > REINSCRIRE</a>
            </button>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>