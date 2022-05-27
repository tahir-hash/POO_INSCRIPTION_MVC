<?php
if (isset($_SESSION['errors'])) 
{
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
if (isset($_SESSION['test'])) 
{
    $test = $_SESSION['test'];
    unset($_SESSION['test']);
}
?>
<section class="gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><?= $title ?></h3>
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= isset($classe['id']) ? $classe['id'] : "" ?>">
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Libelle Classe</label>
                                        <input type="text" id="firstName" value="<?= isset($classe['libelle']) ? $classe['libelle'] : "" ?>" name="libelleClasse" class="form-control form-control-lg" />
                                        <?php if (isset($test)) : ?>
                                            <p style="color:red"><?= $test; ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="firstName" value=>Filiere</label>
                                        <!-- <input type="text" value="<?= isset($classe['filiere']) ? $classe['filiere'] : "" ?>" id="firstName" name="filiere" class="form-control form-control-lg" /> -->
                                        <select name="filiere" class="form-select form-select-sm" id="">
                                            <?php if (isset($filiere) && !isset($classe['filiere'])) : ?>
                                                <option value="">--- Choisir une filiere ---</option>
                                                <?php foreach ($filiere as $value) : ?>
                                                    <option value="<?= $value ?>"><?= $value ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                            <?php if (isset($classe['filiere']) && isset($filiere)) : ?>
                                                <?php foreach ($filiere as $value) : ?>
                                                    <option <?= $value == $classe['filiere'] ? $selected = "selected" : $selected = "" ?> value="<?= $value ?>"><?= $value ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                        <?php if (isset($errors)) : ?>
                                            <p style="color:red"><?= $errors; ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Niveau</label>
                                        <input type="text" value="<?= isset($classe['niveau']) ? $classe['niveau'] : "" ?>" id="firstName" name="niveau" class="form-control form-control-lg" />
                                    </div>
                                </div> -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Niveau</label>
                                        <select name="niveau" class="form-select form-select-sm" id="">
                                            <?php if (isset($niveau) && !isset($classe['niveau'])) : ?>
                                                <?php foreach ($niveau as $value) : ?>
                                                    <option value="<?= $value ?>"><?= $value ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                            <?php if (isset($classe['niveau']) && isset($niveau)) : ?>
                                                <?php foreach ($niveau as $value) : ?>
                                                    <option <?= $value == $classe['niveau'] ? $selected = "selected" : $selected = "" ?> value="<?= $value ?>"><?= $value ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>