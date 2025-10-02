<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?>Admin FixinAja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url('assets/admin/')?>images/fixinaja.png" />
    <style>
        .sidebar { min-height: 100vh; background: #343a40; }
        .sidebar a { color: #adb5bd; text-decoration: none; padding: 10px 15px; display: block; }
        .sidebar a:hover, .sidebar a.active { background: #495057; color: white; }
        .main-content { margin-left: 250px; }
        @media (max-width: 768px) { .main-content { margin-left: 0; } }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar position-fixed" style="width: 250px;">
        <div class="p-3">
            <h4 class="text-white">FixinAja Admin</h4>
            <small class="text-muted">Selamat datang, <?= $this->session->userdata('admin_nama') ?></small>
        </div>
        <nav class="nav flex-column">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="<?= base_url('admin/profil') ?>" class="nav-link <?= $this->uri->segment(2) == 'profil' ? 'active' : '' ?>">
                <i class="fas fa-cog me-2"></i> Profil Website
            </a>

            <!-- Menu Panel Admin dengan Submenu -->
            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#panelAdminMenu" role="button" aria-expanded="false" aria-controls="panelAdminMenu">
                <span><i class="fas fa-tools me-2"></i> Panel Admin</span>
                <i class="fas fa-chevron-down"></i>
            </a>
            <div class="collapse <?= in_array($this->uri->segment(2), ['katalog', 'pesanan', 'laporan']) ? 'show' : '' ?>" id="panelAdminMenu">
                <a href="<?= base_url('admin/katalog') ?>" class="nav-link ps-4 <?= $this->uri->segment(2) == 'katalog' ? 'active' : '' ?>">
                    <i class="fas fa-list me-2"></i> Katalog
                </a>
                <a href="<?= base_url('admin/pesanan') ?>" class="nav-link ps-4 <?= $this->uri->segment(2) == 'pesanan' ? 'active' : '' ?>">
                    <i class="fas fa-shopping-cart me-2"></i> Pesanan
                </a>
                <a href="<?= base_url('admin/laporan') ?>" class="nav-link ps-4 <?= $this->uri->segment(2) == 'laporan' ? 'active' : '' ?>">
                    <i class="fas fa-chart-bar me-2"></i> Laporan
                </a>
            </div>
            <a href="<?= base_url('admin/logout') ?>" class="nav-link text-danger">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
            <div class="container-fluid">
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="ms-auto">
                    <a href="<?= base_url() ?>" class="btn btn-outline-primary btn-sm" target="_blank">
                        <i class="fas fa-external-link-alt me-1"></i>Beranda
                    </a>
                </div>
            </div>
        </nav>

        <div class="container-fluid p-4">
            
