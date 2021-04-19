<body class="login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body text-center">
      
        <div class="app-logo mb-3">
            <span class="fas fa-user-graduate"></span>
            <div class="app-text mx-3"> <?= $app; ?></div>
        </div>

      <form action="<?= base_url('auth'); ?>" method="post">
      <?= $this->session->flashdata('message'); ?>  
      <div class="input-group mb-3" data-validate = "Username diperlukan!">
          <input type="text" class="form-control" placeholder="Username" id="username" name="username" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3" data-validate = "Password diperlukan!">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block btn-login">Masuk</button>
          </div>
      </form>

      <div class="text-center mt-3">
        <p class="btn-signup">
          Belum punya akun ?
          <a href="<?= base_url('auth/registration'); ?>">
            Daftar Sekarang!
          </a>
        </p>  
      </div>

    </div>
  </div>
</div>