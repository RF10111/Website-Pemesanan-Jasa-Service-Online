<?php $this->load->view('templates/admin_header', ['title' => 'Tambah Katalog']); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Tambah Katalog</h2>
    <a href="<?= base_url('admin/katalog') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <?= form_open_multipart('admin/katalog_add') ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan *</label>
                        <input type="text" class="form-control" name="nama_layanan" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi *</label>
                        <textarea class="form-control" name="deskripsi" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga *</label>
                        <input type="number" class="form-control" name="harga" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="gambar" accept="image/*">
                        <small class="form-text text-muted">Format: JPG, PNG, GIF. Max: 2MB</small>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
            </div>
        <?= form_close() ?>
    </div>
</div>

<?php $this->load->view('templates/admin_footer'); ?>