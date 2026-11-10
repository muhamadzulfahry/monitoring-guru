<?php
require_once 'config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $private_key = $_POST['private_key'];

    // Verifikasi hash private key terhadap database
    $key_hash = hash('sha256', $private_key);
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND key_hash='$key_hash'");

    if (mysqli_num_rows($query) === 1) {
        $_SESSION['admin_logged'] = true;
        $_SESSION['admin_user'] = $username;
        // Simpan private key di session untuk proses dekripsi dinamis di admin dashboard
        $_SESSION['secret_key'] = $private_key; 
        header("Location: admin.php");
        exit;
    } else {
        $error = "Username atau Private Key tidak valid!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Private Key</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center vh-100">
    <div class="container" style="max-width: 420px;">
        <div class="card shadow border-0">
            <div class="card-body p-4">
                <h4 class="card-title text-center mb-3">Admin Authentication</h4>
                <?php if ($error): ?>
                    <div class="alert alert-danger py-2"><?= $error ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="admin" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Private Key / Kunci Dekripsi</label>
                        <input type="password" name="private_key" class="form-control" placeholder="Masukkan Secret Key..." required>
                        <div class="form-text">Default contoh: <code>kunciRahasiaGuru2026</code></div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Buka Enkripsi & Masuk</button>
                    <a href="index.php" class="btn btn-link w-100 text-center mt-2">Kembali ke Beranda</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>