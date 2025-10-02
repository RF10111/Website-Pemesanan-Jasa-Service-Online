<?php $this->load->view('templates/admin_header', ['title' => 'Laporan']); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Laporan Pesanan</h2>
</div>

<div class="row">
    <!-- Laporan Status -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Laporan Berdasarkan Status</h5>
            </div>
            <div class="card-body">
                <?php if(empty($laporan_status)): ?>
                    <p class="text-muted">Belum ada data pesanan</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Jumlah</th>
                                    <th>Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total = array_sum(array_column($laporan_status, 'jumlah'));
                                foreach($laporan_status as $status): 
                                    $persentase = $total > 0 ? round(($status->jumlah / $total) * 100, 1) : 0;
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        $badge_class = '';
                                        switch($status->status_pesanan) {
                                            case 'Baru': $badge_class = 'bg-warning'; break;
                                            case 'Diproses': $badge_class = 'bg-info'; break;
                                            case 'Selesai': $badge_class = 'bg-success'; break;
                                            case 'Batal': $badge_class = 'bg-danger'; break;
                                            default: $badge_class = 'bg-secondary'; break;
                                        }
                                        ?>
                                        <span class="badge <?= $badge_class ?>">
                                            <?= $status->status_pesanan ?>
                                        </span>
                                    </td>
                                    <td><?= $status->jumlah ?></td>
                                    <td><?= $persentase ?>%</td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Laporan Bulanan -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Laporan Bulanan</h5>
            </div>
            <div class="card-body">
                <?php if(empty($laporan_bulanan)): ?>
                    <p class="text-muted">Belum ada data pesanan per bulan</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Jumlah Pesanan</th>
                                    <th>Jumlah Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($laporan_bulanan as $bulan): ?>
                                <tr>
                                    <td><?= $bulan->nama_bulan ?></td>
                                    <td><?= $bulan->jumlah ?></td>
                                    <td>Rp <?= number_format($bulan->total_penghasilan, 0, ',', '.') ?></td>
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
