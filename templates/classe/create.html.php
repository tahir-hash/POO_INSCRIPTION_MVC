<?php
    if(isset($_SESSION['errors']))
    {
      $errors= $_SESSION['errors'];
      unset($_SESSION['errors']);
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

                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Libelle Classe</label>
                                        <input type="text" id="firstName" value="<?=isset($classe['libelle'])?$classe['libelle']:""?>" name="libelleClasse" class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="firstName" value=>Filiere</label>
                                        <input type="text" value="<?=isset($classe['filiere'])?$classe['filiere']:""?>" id="firstName" name="filiere" class="form-control form-control-lg" />
                                        <?php if (isset($errors)) : ?>
                                            <p style="color:red"><?= $errors; ?></p>
                                        <?php endif ?>                                            
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Niveau</label>
                                        <input type="text" value="<?=isset($classe['niveau'])?$classe['niveau']:"" ?>" id="firstName" name="niveau" class="form-control form-control-lg" />
                                    </div>
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