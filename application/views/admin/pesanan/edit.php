<?php $this->load->view('templates/admin_header', ['title' => 'Edit Pesanan']); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Pesanan #<?= $pesanan->nama_pelanggan ?></h2>
    <a href="<?= base_url('admin/pesanan') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <?= form_open('admin/pesanan_edit/' . $pesanan->id_pesanan) ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Kontak Pelanggan</label>
                        <input type="text" class="form-control" value="<?= $pesanan->kontak_pelanggan ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Pesanan *</label>
                        <select class="form-control" name="status_pesanan" required>
                            <option value="Baru" <?= $pesanan->status_pesanan == 'Baru' ? 'selected' : '' ?>>Baru</option>
                            <option value="Diproses" <?= $pesanan->status_pesanan == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                            <option value="Selesai" <?= $pesanan->status_pesanan == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                            <option value="Dibatalkan" <?= $pesanan->status_pesanan == 'Dibatalkan' ? 'selected' : '' ?>>Dibatalkan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Catatan Admin</label>
                        <textarea class="form-control" name="catatan" rows="5" readonly
                                  placeholder="Tambahkan catatan untuk pesanan ini..."><?= $pesanan->catatan ?></textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Update Status
                </button>
            </div>
        <?= form_close() ?>
    </div>
</div>

<?php $this->load->view('templates/admin_footer'); ?>