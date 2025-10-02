<?php $this->load->view('templates/admin_header', ['title' => 'Manajemen Pesanan']); ?>

<!-- Flash Messages -->
<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manajemen Pesanan</h2>
</div>

<div class="card">
    <div class="card-body">
        <?php if(empty($pesanan)): ?>
            <p class="text-muted text-center">Belum ada pesanan</p>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Layanan</th>
                            <th>Nama Pelanggan</th>
                            <th>Kontak Pelanggan</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach($pesanan as $item): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <strong><?= $item->nama_layanan ?></strong>
                                <?php if($item->catatan): ?>
                                    <br><small class="text-muted">Catatan: <?= substr($item->catatan, 0, 30) ?>...</small>
                                <?php endif; ?>
                            </td>
                            <td><?= $item->nama_pelanggan ?></td>
                            <td><?= $item->kontak_pelanggan ?></td>
                            <td>Rp <?= number_format($item->harga, 0, ',', '.') ?></td>
                            <td>
                                <?php
                                $badge_class = '';
                                switch($item->status_pesanan) {
                                    case 'Baru': $badge_class = 'bg-warning'; break;
                                    case 'Diproses': $badge_class = 'bg-info'; break;
                                    case 'Selesai': $badge_class = 'bg-success'; break;
                                    case 'Dibatalkan': $badge_class = 'bg-danger'; break;
                                }
                                ?>
                                <span class="badge <?= $badge_class ?>"><?= $item->status_pesanan ?></span>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($item->created_at)) ?></td>
                            <td>
                                <a href="<?= base_url('admin/pesanan_edit/' . $item->id_pesanan) ?>" 
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('admin/pesanan_delete/' . $item->id_pesanan) ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin ingin menghapus pesanan ini?')">
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