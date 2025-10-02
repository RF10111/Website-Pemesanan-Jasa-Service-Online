<?php $this->load->view('templates/admin_header', ['title' => 'Manajemen Katalog']); ?>

<!-- Flash Messages -->
<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manajemen Katalog</h2>
    <a href="<?= base_url('admin/katalog_add') ?>" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Katalog
    </a>
</div>

<div class="card">
    <div class="card-body">
        <?php if(empty($katalog)): ?>
            <p class="text-muted text-center">Belum ada katalog layanan</p>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Layanan</th>
                            <th>Harga</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach($katalog as $item): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <img src="<?= base_url('uploads/katalog/' . $item->gambar) ?>" 
                                     class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                            </td>
                            <td>
                                <strong><?= $item->nama_layanan ?></strong>
                                <br><small class="text-muted"><?= substr($item->deskripsi, 0, 50) ?>...</small>
                            </td>
                            <td>Rp <?= number_format($item->harga, 0, ',', '.') ?></td>
                            <td><?= date('d/m/Y', strtotime($item->created_at)) ?></td>
                            <td>
                                <a href="<?= base_url('admin/katalog_edit/' . $item->id_katalog) ?>" 
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('admin/katalog_delete/' . $item->id_katalog) ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin ingin menghapus katalog ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->load->view('templates/admin_footer'); ?>