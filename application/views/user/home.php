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

    <!-- Hero Section -->
    <section class="hero text-center">
        <div class="container">
            <h1 class="display-4 mb-3 fw-bold">Solusi Perbaikan Elektronik Terpercaya</h1>
            <p class="lead mb-4">Kami menyediakan berbagai layanan perbaikan berkualitas tinggi untuk kebutuhan Anda</p>
            <a href="<?= base_url('katalog') ?>" class="btn btn-light btn-lg shadow-sm">Lihat Katalog</a>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Layanan Kami</h2>
            <div class="row">
                <?php foreach(array_slice($katalog, 0, 3) as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card service-card h-100 shadow-sm">
                        <img src="<?= base_url('uploads/katalog/' . $item->gambar) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item->nama_layanan ?></h5>
                            <p class="card-text"><?= substr($item->deskripsi, 0, 100) ?>...</p>
                            <p class="text-primary fw-bold">Rp <?= number_format($item->harga, 0, ',', '.') ?></p>
                            <a href="<?= base_url('pesan/' . $item->id_katalog) ?>" class="btn btn-primary w-100">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Hubungi Kami</h2>
            <div class="row align-items-start">
                <!-- Info Kontak -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <h4 class="mb-4">Informasi Kontak</h4>
                        <p><i class="fas fa-phone-alt me-2 text-primary"></i><strong>Telepon:</strong> <?= $settings->no_telp ?? '-' ?></p>
                        <p><i class="fas fa-envelope me-2 text-primary"></i><strong>Email:</strong> <?= $settings->email ?? '-' ?></p>
                        <p><i class="fas fa-map-marker-alt me-2 text-primary"></i><strong>Alamat:</strong> <?= $settings->alamat ?? '-' ?></p>
                    </div>
                </div>

                <!-- Sosial Media -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <h4 class="mb-4">Ikuti Kami di Sosial Media</h4>
                        <?php if($settings->instagram): ?>
                            <a href="<?= $settings->instagram ?>" target="_blank" class="btn btn-outline-danger me-2 mb-2">
                                <i class="fab fa-instagram me-1"></i> Instagram
                            </a>
                        <?php endif; ?>
                        <?php if($settings->facebook): ?>
                            <a href="<?= $settings->facebook ?>" target="_blank" class="btn btn-outline-primary me-2 mb-2">
                                <i class="fab fa-facebook me-1"></i> Facebook
                            </a>
                        <?php endif; ?>
                        <?php if($settings->linkedin): ?>
                            <a href="<?= $settings->linkedin ?>" target="_blank" class="btn btn-outline-info me-2 mb-2">
                                <i class="fab fa-linkedin me-1"></i> LinkedIn
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p class="mb-0">© <?= date('Y') ?> FixinAja. Semua hak dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
