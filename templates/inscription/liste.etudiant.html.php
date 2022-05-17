<div class="container mt-5">
  <h1 class="card-title">LISTE DES ETUDIANTS INSCRITS</h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Matricule</th>
        <th scope="col">Nom complet</th>
        <th scope="col">Classe</th>
        <th scope="col">Sexe</th>
        <th scope="col">Annee scolaire</th>
        <th scope="col">Etat inscription</th>
      </tr>
    </thead>
    <tbody>
    <?php  foreach ($data  as $value) : ?>
        <tr>
          <th scope="row"><?= $value->id ?></th>
          <td><?= $value->matricule ?></td>
          <td><?= $value->nom_complet ?></td>
          <td><?= $value->libClasse ?></td>
          <td><?= $value->sexe ?></td>
          <td><?= $value->libelle ?></td>
          <td><?= $value->etat_ins ?></td>

        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>