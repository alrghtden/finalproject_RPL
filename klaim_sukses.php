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

            include('phpqrcode/qrlib.php');

            $tempDir = 'temp/';
            if (!file_exists($tempDir)){
                mkdir($tempDir);
            }
            $qrCodeFile = $tempDir . 'qrcode_' . $kode_unik . '.png';
            QRcode::png($kode_unik, $qrCodeFile, QR_ECLEVEL_L, 10);

            echo "<p>Silakan tunjukkan kode unik ini kepada petugas untuk mengambil barang: <br><h1>$kode_unik</h1></p>";
            echo "<p>Atau tunjukkan QR Code berikut:</p>";
            echo "<img src='$qrCodeFile' alt='QR Code'>";
        } else {
            echo "<p>Kesalahan: Kode unik tidak ditemukan.</p>";
        }
        ?>
    </div>
</body>
</html>
