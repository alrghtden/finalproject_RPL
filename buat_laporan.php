<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacakin</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function showPopup(message) {
            alert(message);
        }
    </script>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>
    
    <div class="main">
        <h1>Formulir Laporan</h1>
        <h3>Jenis Laporan</h3>
        <?php
        session_start();
        if (isset($_SESSION['user_id'])) {
            echo '<button id="btnKehilangan" onclick="showForm(\'kehilangan\')">Kehilangan</button>';
            echo '<button id="btnTemuan" onclick="showForm(\'temuan\')">Temuan</button>';
        } else {
            echo '<p>Silakan login untuk mengisi formulir.</p>';
        }
        ?>

        <?php
        if (isset($_SESSION['pesan'])) {
            echo '<script>showPopup("' . $_SESSION['pesan'] . '");</script>';
            unset($_SESSION['pesan']);
        }
        ?>

        <form id="formKehilangan" action="proses_kehilangan.php" method="POST" style="display: none;" enctype="multipart/form-data">
            <h3>Formulir Kehilangan</h3>
            <label for="barang">Barang yang Hilang</label>
            <input type="text" id="barang" name="barang" required><br><br>

            <label for="lokasi">Lokasi Hilang</label>
            <input type="text" id="lokasi" name="lokasi" required><br><br>

            <label for="tanggal">Tanggal Hilang</label>
            <input type="date" id="tanggal" name="tanggal" required><br><br>

            <label for="waktu">Perkiraan Waktu Hilang</label>
            <input type="time" id="waktu" name="waktu" required><br><br>

            <label for="deskripsi">Deskripsi Barang</label><br>
            <textarea id="deskripsi" name="deskripsi" required></textarea><br><br>

            <label for="foto">Foto Barang (Opsional)</label>
            <input type="file" id="foto" name="foto" accept="image/*"><br><br>

            <input type="submit" value="Submit">
        </form>

        <form id="formTemuan" action="proses_temuan.php" method="POST" style="display: none;"enctype="multipart/form-data">
            <h3>Formulir Temuan</h3>
            <label for="barang">Barang yang Ditemukan</label>
            <input type="text" id="barang" name="barang" required><br><br>

            <label for="lokasi">Lokasi Ditemukan</label>
            <input type="text" id="lokasi" name="lokasi" required><br><br>

            <label for="tanggal">Tanggal Ditemukan</label>
            <input type="date" id="tanggal" name="tanggal" required><br><br>

            <label for="waktu">Waktu Ditemukan</label>
            <input type="time" id="waktu" name="waktu" required><br><br>

            <label for="deskripsi">Deskripsi Barang</label><br>
            <textarea id="deskripsi" name="deskripsi" required></textarea><br><br>

            <label for="foto">Foto Barang</label>
            <input type="file" id="foto" name="foto" accept="image/*" required><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
