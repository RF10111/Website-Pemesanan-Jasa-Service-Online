<?php $this->load->view('templates/admin_header', ['title' => 'Profil Website']); ?>

<!-- Flash Messages -->
<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Profil Website</h2>
</div>

<div class="card">
    <div class="card-body">
        <?= form_open('admin/profil') ?>
            <div class="row">
                <div class="col-md-6">
                    <h5>Informasi Kontak</h5>
                    <div class="mb-3">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telp" 
                               value="<?= $settings->no_telp ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" 
                               value="<?= $settings->email ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3"><?= $settings->alamat ?? '' ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Media Sosial</h5>
                    <div class="mb-3">
                        <label class="form-label">Instagram</label>
                        <input type="url" class="form-control" name="instagram" 
                               value="<?= $settings->instagram ?? '' ?>" 
                               placeholder="https://instagram.com/username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Facebook</label>
                        <input type="url" class="form-control" name="facebook" 
                               value="<?= $settings->facebook ?? '' ?>" 
                               placeholder="https://facebook.com/username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">LinkedIn</label>
                        <input type="url" class="form-control" name="linkedin" 
                               value="<?= $settings->linkedin ?? '' ?>" 
                               placeholder="https://linkedin.com/in/username">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
            </div>
        <?= form_close() ?>
    </div>
</div>
