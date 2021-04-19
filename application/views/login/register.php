<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title><?= $title; ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>style.css">
</head>
<body class="register-page">
<div class="register-box">

  <div class="card">
    <div class="card-body register-card-body text-center">
    
    <div class="app-logo mb-3">
            <span class="fas fa-user-graduate"></span>
            <div class="app-text mx-3"> <?= $app; ?></div>
        </div>

      <form action="<?= base_url('auth/registration'); ?>" method="post">
      <?= $this->session->flashdata('message'); ?>  
      <div class="input-group mb-3" data-validate = "Nama Petugas diperlukan!">
          <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama_petugas" name="nama_petugas" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?= form_error('nama_petugas', '<small class="text-danger m-auto">', '</small>'); ?>
      <div class="input-group mb-3" data-validate = "Username diperlukan!">
          <input type="text" class="form-control" placeholder="Username" id="username" name="username" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?= form_error('username', '<small class="text-danger m-auto">', '</small>'); ?>
        <div class="input-group mb-3" data-validate = "Password diperlukan!">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('password', '<small class="text-danger m-auto">', '</small>'); ?>
        <div class="input-group mb-3" data-validate = "Konfirmasi Password diperlukan!">
          <input type="password" class="form-control" placeholder="Ulangi password" id="password_confirm" name="password_confirm" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block btn-regis">Daftar</button>
          </div>
      </form>

      <div class="text-center mt-3">
        <p class="btn-signin">
          Sudah punya akun ?
          <a href="<?= base_url('auth'); ?>">
            Masuk Sekarang!
          </a>
        </p>  
      </div>

    </div>
  </div>
</div>
<script src="<?= base_url('assets/'); ?>jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
