<?php
require_once 'config.php';

if (!isset($_SESSION['admin_logged']) || !isset($_SESSION['secret_key'])) {
    header("Location: login.php");
    exit;
}

$private_key = $_SESSION['secret_key'];
$success = '';

// Proses Simpan Data (Enkripsi sebelum ke DB)
if (isset($_POST['simpan'])) {
    $nip            = encryptData($_POST['nip'], $private_key);
    $nama           = encryptData($_POST['nama_guru'], $private_key);
    $mapel          = encryptData($_POST['mata_pelajaran'], $private_key);
    $status         = encryptData($_POST['status_kehadiran'], $private_key);
    $evaluasi       = encryptData($_POST['evaluasi'], $private_key);

    $sql = "INSERT INTO monitoring_guru (nip, nama_guru, mata_pelajaran, status_kehadiran, evaluasi) 
            VALUES ('$nip', '$nama', '$mapel', '$status', '$evaluasi')";
    mysqli_query($conn, $sql);
    $success = "Data monitoring berhasil dienkripsi dan disimpan ke database!";
}

// Ambil Data
$result = mysqli_query($conn, "SELECT * FROM monitoring_guru ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Admin - Monitoring Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand">Panel Admin (Dekripsi Aktif)</span>
            <div class="text-white">
                <span class="me-3 small text-muted">Key: <?= htmlspecialchars($private_key) ?></span>
                <a href="logout.php" class="btn btn-sm btn-outline-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <?php if ($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <!-- Form Tambah Data Terenkripsi -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white fw-bold">Input Monitoring Aktivitas Guru (Auto-Encrypt)</div>
            <div class="card-body">
                <form method="POST" class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">NIP Guru</label>
                        <input type="text" name="nip" class="form-control" required placeholder="198701...">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Nama Guru</label>
                        <input type="text" name="nama_guru" class="form-control" required placeholder="Nama Lengkap">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Mata Pelajaran</label>
                        <input type="text" name="mata_pelajaran" class="form-control" required placeholder="Contoh: Matematika">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status Kehadiran</label>
                        <select name="status_kehadiran" class="form-select" required>
                            <option value="Hadir Mengajar">Hadir Mengajar</option>
                            <option value="Tugas Terstruktur">Tugas Terstruktur</option>
                            <option value="Izin / Sakit">Izin / Sakit</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Catatan Monitoring / Evaluasi</label>
                        <textarea name="evaluasi" class="form-control" rows="2" placeholder="Catatan aktivitas KBM di kelas..." required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="simpan" class="btn btn-success">Enkripsi & Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Monitoring Hasil Dekripsi -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">Hasil Monitoring Guru (Didekripsi Secara Real-time)</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Guru</th>
                                <th>Mapel</th>
                                <th>Status</th>
                                <th>Catatan Evaluasi</th>
                                <th>Ciphertext di Database (Bukti Enkripsi)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)): 
                                // Proses Dekripsi
                                $dec_nip    = decryptData($row['nip'], $private_key);
                                $dec_nama   = decryptData($row['nama_guru'], $private_key);
                                $dec_mapel  = decryptData($row['mata_pelajaran'], $private_key);
                                $dec_status = decryptData($row['status_kehadiran'], $private_key);
                                $dec_eval   = decryptData($row['evaluasi'], $private_key);
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><strong><?= htmlspecialchars($dec_nip) ?></strong></td>
                                <td><?= htmlspecialchars($dec_nama) ?></td>
                                <td><?= htmlspecialchars($dec_mapel) ?></td>
                                <td><span class="badge bg-info text-dark"><?= htmlspecialchars($dec_status) ?></span></td>
                                <td><?= htmlspecialchars($dec_eval) ?></td>
                                <td><code class="small text-muted" title="<?= $row['nama_guru'] ?>"><?= substr($row['nama_guru'], 0, 18) ?>...</code></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>