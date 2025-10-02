<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Layanan - <?= $katalog->nama_layanan ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4">Form Pemesanan Layanan</h2>

    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('uploads/katalog/' . $katalog->gambar) ?>" 
                     class="img-fluid rounded-start" alt="<?= $katalog->nama_layanan ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $katalog->nama_layanan ?></h5>
                    <p class="card-text"><?= $katalog->deskripsi ?></p>
                    <p class="text-primary fw-bold">Rp <?= number_format($katalog->harga, 0, ',', '.') ?></p>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" required>
        </div><div class="mb-3">
            <label for="kontak_pelanggan" class="form-label">Kontak Anda (No HP atau Email)</label>
            <input type="text" name="kontak_pelanggan" id="kontak_pelanggan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan (opsional)</label>
            <textarea name="catatan" id="catatan" class="form-control" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
        <a href="<?= base_url('katalog') ?>" class="btn btn-secondary ms-2">Kembali</a>
    </form>
</div>
</body>
</html>
