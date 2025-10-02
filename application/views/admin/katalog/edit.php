<?php $this->load->view('templates/admin_header', ['title' => 'Edit Katalog']); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Katalog</h2>
    <a href="<?= base_url('admin/katalog') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <?= form_open_multipart('admin/katalog_edit/' . $katalog->id_katalog) ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan *</label>
                        <input type="text" class="form-control" name="nama_layanan" 
                               value="<?= $katalog->nama_layanan ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi *</label>
                        <textarea class="form-control" name="deskripsi" rows="5" required><?= $katalog->deskripsi ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga *</label>
                        <input type="number" class="form-control" name="harga" 
                               value="<?= $katalog->harga ?>" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label>
                        <div class="mb-2">
                            <img src="<?= base_url('uploads/katalog/' . $katalog->gambar) ?>" 
                                 class="img-thumbnail" style="width: 150px;">
                        </div>
                        <input type="file" class="form-control" name="gambar" accept="image/*">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Update
                </button>
            </div>
        <?= form_close() ?>
    </div>
</div>

<?php $this->load->view('templates/admin_footer'); ?>