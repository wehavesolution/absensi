<!doctype html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?=$title;?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url();?>template/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url();?>template/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url();?>template/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>template/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?= base_url();?>template/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?= base_url();?>template/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link href="<?= base_url();?>template/assets/css/phoenix.min.css" rel="stylesheet" id="style-default">
    <link href="<?= base_url();?>template/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <style>
      body {
        opacity: 0;
      }
    </style>
  </head>

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">
        <div class="container">
          <div class="row flex-center min-vh-100 py-5">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
              
              <?php if ($this->session->flashdata('false')) { ?>
              <div class="alert alert-soft-warning alert-dismissible fade show text-center" role="alert">
                <strong><?=$this->session->flashdata('false')?></strong>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php } ?>

              <a class="d-flex flex-center text-decoration-none mb-4" href="#">
                <div class="d-flex align-items-center"><img src="<?= base_url();?>template/assets/img/icons/logo.png" alt="phoenix" width="58"></div>
              </a>
              <div class="text-center mb-7">
                <h3>ERM</h3>
                <p class="text-900">Enterprise Resource Management</p>
              </div>
              <form action="<?=site_url('Login/auth_login');?>" method="post">
              <div class="mb-3 text-start"><label class="form-label" for="nik">NIP</label>
                <div class="form-icon-container"><input class="form-control form-icon-input" id="nik" type="nik" name="username" placeholder="0110217029"><span class="fas fa-user text-900 fs--1 form-icon"></span></div>
              </div>
              <div class="mb-3 text-start"><label class="form-label" for="password">Password</label>
                <div class="form-icon-container"><input class="form-control form-icon-input" type="password" name="password" placeholder="Password"><span class="fas fa-lock text-900 fs--1 form-icon"></span></div>
              </div>
              <div class="row flex-between-center mb-1"></div>
              <button type="submit" class="btn btn-warning w-100 mb-3">Masuk</button>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="<?= base_url();?>template/assets/js/phoenix.js"></script>
  </body>

</html>