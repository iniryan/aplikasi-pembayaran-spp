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
<body class="login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body text-center">
      
        <div class="app-logo mb-3">
            <span class="fas fa-user-graduate"></span>
            <div class="app-text mx-3"> <?= $title; ?></div>
        </div>

      <form action="<?= base_url('auth'); ?>" method="post">
      <?= $this->session->flashdata('message'); ?>  
      <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" id="username" name="username" autocomplete="off" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" autocomplete="off" required>
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

    </div>
  </div>
</div>
<script src="<?= base_url('assets/'); ?>jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
