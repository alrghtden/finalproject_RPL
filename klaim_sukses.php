<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klaim Sukses</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <div class="main">
        <h1>Klaim Barang Sukses!</h1>
        <?php
        if (isset($_GET['kode_unik'])) {
            $kode_unik = $_GET['kode_unik'];

            echo "<p>Silakan tunjukkan kode unik ini kepada petugas untuk mengambil barang: <br><h1>$kode_unik</h1></p>";
        } else {
            echo "<p>Kesalahan: Kode unik tidak ditemukan.</p>";
        }
        ?>
    </div>
</body>
</html>
