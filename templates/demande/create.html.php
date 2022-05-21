<section class="gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Formuler une demande</h3>
                        <form action="<?= $Constantes::WEB_ROOT."add-demande"?>" method="POST">

                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Libelle Demande</label>
                                        <input type="text" id="firstName" name="libelleDemande" class="form-control form-control-lg" />
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