<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register Admin - Fixinaja</title>
  <link rel="stylesheet" href="<?= base_url('assets/admin/')?>vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url('assets/admin/')?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url('assets/admin/')?>vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?= base_url('assets/admin/')?>css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="<?= base_url('assets/admin/')?>images/fixinaja.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center mb-3">
                <img src="<?= base_url('assets/admin/')?>images/logofix.jpg" alt="logo">
              </div>

              <!-- Flash success -->
            <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success mt-3"><?= $this->session->flashdata('success') ?></div>
            <?php endif; ?>

            <!-- Error from validation -->
            <?php if (isset($error)): ?>
              <div class="alert alert-danger mt-3"><?= $error ?></div>
            <?php endif; ?>

              <?= form_open('auth/admin_register', ['class' => 'pt-3']) ?>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="nama_lengkap" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="konfirmasi" placeholder="Konfirmasi Password" required>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Register</button>
                </div>
              <?= form_close() ?>

              <div class="text-center mt-4 font-weight-light">
                <a href="<?= base_url("admin/login") ?>" class="btn btn-sm btn-outline-secondary btn-block">Kembali ke Signin</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/admin/')?>vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url('assets/admin/')?>js/off-canvas.js"></script>
  <script src="<?= base_url('assets/admin/')?>js/hoverable-collapse.js"></script>
  <script src="<?= base_url('assets/admin/')?>js/template.js"></script>
  <script src="<?= base_url('assets/admin/')?>js/settings.js"></script>
  <script src="<?= base_url('assets/admin/')?>js/todolist.js"></script>
</body>

</html>
