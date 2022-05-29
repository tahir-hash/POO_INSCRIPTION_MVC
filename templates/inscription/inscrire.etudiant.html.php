<section class="gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><?= $title ?></h3>
                        <h5 class="mb-4 pb-2 pb-md-0 mb-md-5"><?= isset($inscription['matricule']) ? $inscription['matricule'] : "" ?></h5>

                        <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= isset($inscription['id']) ? $inscription['id'] : "" ?>">
                        <input type="hidden" name="id_ins" value="<?= isset($inscription['id_ins']) ? $inscription['id_ins'] : "" ?>">
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Nom Complet</label>
                                        <input type="text" <?= isset($inscription['nom_complet']) ? "disabled" : "" ?>  value="<?= isset($inscription['nom_complet']) ? $inscription['nom_complet'] : "" ?>" id="firstName" name="nomComplet" class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Adresse</label>
                                        <input type="text" <?= isset($inscription['adresse']) ? "disabled" : "" ?> value="<?= isset($inscription['adresse']) ? $inscription['adresse'] : "" ?>" id="firstName" name="adresse" class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <h6 class="mb-2 pb-1">Sexe:</h6>
                                    <div class="form-check form-check-inline">
                                        <input <?= isset($inscription['sexe']) ?"disabled" : "" ?> class="form-check-input" type="radio" name="sexe" id="maleGender"  value="Maculin" <?= isset($inscription['sexe']) && $inscription['sexe'] =="Maculin" ?"checked" : "" ?> />
                                        <label class="form-check-label" for="maleGender">Maculin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input <?= isset($inscription['sexe']) ? "disabled" : "" ?> class="form-check-input" type="radio" name="sexe" id="femaleGender" value="Feminin" <?= isset($inscription['sexe']) && $inscription['sexe'] =="Feminin" ?"checked" : "" ?> />
                                        <label class="form-check-label" for="femaleGender">Feminin</label>
                                    </div>
                                </div>
                            </div>
                            <h6 class="mb-2 pb-1">Classe:</h6>
                            <div class="row">
                                <div class="col-12">

                                    <select class="select form-control-lg" name="classe">
                                        <?php foreach ($classe  as $value) : ?>
                                            <option value="<?= $value->id ?>"><?= $value->libelle ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <label class="form-label select-label">Choose option</label>

                                </div>
                            </div>


                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>