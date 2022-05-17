<div class="container mt-5">
<form action="<?php echo $Constantes::WEB_ROOT."add-classe"?>" method="POST" role="form">
    <legend>Form title</legend>

    <div class="form-group">
        <label for="">Classe</label>
        <input type="text" class="form-control w-50" name="libelleClasse" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Filiere</label>
        <input type="text" name="filiere" class="form-control w-50" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Niveau</label>
        <input type="text" class="form-control w-50" name="niveau" id="" placeholder="Input field">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
