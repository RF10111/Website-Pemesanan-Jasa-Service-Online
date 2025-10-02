<?php $this->load->view('templates/admin_header', ['title' => 'Dashboard']); ?>

<!-- Flash Messages -->
<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
<?php endif; ?>

<div class="row">
    <div class="col-12">
        <h2>Dashboard</h2>
        <p class="text-muted">Selamat datang di panel admin FixinAja</p>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4><?= $total_katalog ?></h4>
                        <p class="mb-0">Total Katalog</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-list fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4><?= $total_pesanan ?></h4>
                        <p class="mb-0">Total Pesanan</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-shopping-cart fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4><?= count(array_filter($pesanan_terbaru, function($p) { return $p->status_pesanan == 'Baru'; })) ?></h4>
                        <p class="mb-0">Pesanan Baru</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4><?= count(array_filter($pesanan_terbaru, function($p) { return $p->status_pesanan == 'Diproses'; })) ?></h4>
                        <p class="mb-0">Sedang Diproses</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-cogs fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Pesanan Terbaru</h5>
                <a href="<?= base_url('admin/pesanan') ?>" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
            <div class="card-body">
                <?php if(empty($pesanan_terbaru)): ?>
                    <p class="text-muted text-center">Belum ada pesanan</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Layanan</th>
                                    <th>Kontak</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($pesanan_terbaru as $pesanan): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $pesanan->nama_layanan ?></td>
                                    <td><?= $pesanan->kontak_pelanggan ?></td>
                                    <td>
                                        <?php
                                        $badge_class = '';
                                        switch($pesanan->status_pesanan) {
                                            case 'Baru': $badge_class = 'bg-warning'; break;
                                            case 'Diproses': $badge_class = 'bg-info'; break;
                                            case 'Selesai': $badge_class = 'bg-success'; break;
                                            case 'Dibatalkan': $badge_class = 'bg-danger'; break;
                                        }
                                        ?>
                                        <span class="badge <?= $badge_class ?>"><?= $pesanan->status_pesanan ?></span>
                                    </td>
                                    <td><?= date('d/m/Y H:i', strtotime($pesanan->created_at)) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/admin_footer'); ?>