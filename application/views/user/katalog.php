<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FixinAja - Jasa Perbaikan Terpercaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url('assets/admin/')?>images/fixinaja.png" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
        }

        .service-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .btn-outline-primary, .btn-outline-danger, .btn-outline-info {
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover, 
        .btn-outline-danger:hover, 
        .btn-outline-info:hover {
            color: white;
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }

        .footer a {
            color: #adb5bd;
            text-decoration: none;
        }

        .footer a:hover {
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url() ?>">FixinAja</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?= base_url() ?>">Home</a>
                <a class="nav-link" href="<?= base_url('katalog') ?>">Katalog</a>
                <a class="nav-link" href="<?= base_url('admin/login') ?>">Admin</a>
            </div>
        </div>
    </nav>

    <!-- Katalog Section -->
    <section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Daftar Layanan</h2>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <?= $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if(empty($katalog)): ?>
            <p class="text-center text-muted">Belum ada layanan yang tersedia.</p>
        <?php else: ?>
            <!-- isi katalog -->

                <div class="row">
                    <?php foreach($katalog as $item): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card service-card h-100">
                            <img src="<?= base_url('uploads/katalog/' . $item->gambar) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $item->nama_layanan ?></h5>
                                <p class="card-text"><?= substr($item->deskripsi, 0, 100) ?>...</p>
                                <p class="text-primary fw-bold">Rp <?= number_format($item->harga, 0, ',', '.') ?></p>
                                <a href="<?= base_url('katalog/pesan/' . $item->id_katalog) ?>" class="btn btn-primary">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
