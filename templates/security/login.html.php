<div class="container mt-5 ">
<h1 class="card-title">BIENVENUE A MBAYE PRO ACADEMY</h1>
  <form action="<?= $Constantes::WEB_ROOT."login"?>" method="POST" >
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Login</label>
      <input type="email" class="form-control w-50 " name="login" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control w-50" name="password" id="exampleInputPassword1">
    </div>
    <div class="mb-4 flex flex-row justify-between items-center ">
            <button type="submit" class="btn btn-primary rounded-lg">Sign Up</button>
    </div>
  </form>
</div>