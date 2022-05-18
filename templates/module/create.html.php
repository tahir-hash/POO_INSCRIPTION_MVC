<div class="container mt-5">
<form action="<?= $Constantes::WEB_ROOT."add-module"?>" method="POST" role="form">
    <legend>Ajouter un module</legend>

    <div class="form-group">
        <label for="">Module</label>
        <input type="text" class="form-control w-50" name="libelle" id="" placeholder="Input field">
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
