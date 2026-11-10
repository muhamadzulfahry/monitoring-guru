<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_monitoring_guru";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Fungsi Enkripsi Data
function encryptData($data, $secret_key) {
    $cipher_method = 'aes-256-cbc';
    // Hash key menjadi tepat 32 byte untuk AES-256
    $key = hash('sha256', $secret_key);
    // Buat IV acak 16 byte
    $iv_length = openssl_cipher_iv_length($cipher_method);
    $iv = openssl_random_pseudo_bytes($iv_length);
    
    $encrypted = openssl_encrypt($data, $cipher_method, $key, 0, $iv);
    // Gabungkan IV dan Ciphertext lalu encode ke Base64 agar aman disimpan di DB
    return base64_encode($iv . '::' . $encrypted);
}

// Fungsi Dekripsi Data
function decryptData($data, $secret_key) {
    $cipher_method = 'aes-256-cbc';
    $key = hash('sha256', $secret_key);
    
    $decoded = base64_decode($data);
    $parts = explode('::', $decoded, 2);
    if (count($parts) !== 2) {
        return "[Error Format]";
    }
    
    $iv = $parts[0];
    $encrypted_text = $parts[1];
    
    $decrypted = openssl_decrypt($encrypted_text, $cipher_method, $key, 0, $iv);
    return $decrypted !== false ? $decrypted : "[Gagal Dekripsi]";
}
?>