<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Monitoring Guru - Beranda</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (Optional, untuk mempercantik) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 80px 0;
        }
        .hero-img {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            object-fit: cover;
            width: 100%;
            height: auto;
        }
        .hero-img:hover {
            transform: translateY(-5px);
        }
        .card-feature {
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        .card-feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.08) !important;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#">
                <i class="bi bi-shield-check me-2"></i>MonitorGuru
            </a>
            <a href="login.php" class="btn btn-light fw-bold px-4 rounded-pill">
                <i class="bi bi-key-fill me-2"></i>Login
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Kolom Teks -->
                <div class="col-lg-6 text-center text-lg-start">
                    <span class="badge bg-primary px-3 py-2 rounded-pill mb-3">Sistem Informasi Keamanan Tinggi</span>
                    <h1 class="display-4 fw-extrabold text-dark mb-3" style="line-height: 1.2;">
                        Sistem Monitoring <br><span class="text-primary">Kinerja & Kehadiran</span> Guru
                    </h1>
                    <p class="lead text-secondary mb-4">
                        Platform monitoring aktivitas pengajaran guru di lingkungan sekolah berbasis keamanan data end-to-end encryption menggunakan metode kriptografi modern.
                    </p>
                    <div class="d-grid d-md-flex justify-content-center justify-content-lg-start gap-3">
                        <a href="login.php" class="btn btn-primary btn-lg px-4 rounded-pill shadow">
                            Buka Panel Monitoring <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Kolom Gambar -->
                <div class="col-lg-6">
                    <!-- Ubah path gambar ini dengan nama file gambar yang kamu simpan (misal: hero-guru.jpg) -->
                    <img src="data/images22.png" class="hero-img img-fluid" alt="Aktivitas Pengajaran dan Pemantauan Guru">
                </div>
            </div>
        </div>
    </section>

    <!-- Informasi Fitur Keamanan -->
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row g-4 justify-content-center">
                <!-- Fitur 1 -->
                <div class="col-md-5">
                    <div class="card card-feature shadow-sm p-4 h-100 bg-light">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded-3 p-3 me-3">
                                <i class="bi bi-lock-fill fs-3"></i>
                            </div>
                            <h4 class="fw-bold mb-0">Keamanan Data</h4>
                        </div>
                        <p class="text-secondary mb-0">
                            Seluruh rekap monitoring, catatan evaluasi, hingga NIP disimpan dalam format acak cipher AES-256 di database untuk menjamin kerahasiaan informasi.
                        </p>
                    </div>
                </div>

                <!-- Fitur 2 -->
                <div class="col-md-5">
                    <div class="card card-feature shadow-sm p-4 h-100 bg-light">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success text-white rounded-3 p-3 me-3">
                                <i class="bi bi-key-fill fs-3"></i>
                            </div>
                            <h4 class="fw-bold mb-0">Akses Private Key</h4>
                        </div>
                        <p class="text-secondary mb-0">
                            Hanya admin pemegang secret keys admin secet valid yang membuka rekap jejak guru