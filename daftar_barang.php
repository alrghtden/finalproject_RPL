<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacakin</title>
    <link rel="stylesheet" href="styles.css">
    <script src="daftar_barang.js" defer></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <div class="nav">
        <h1>Daftar Barang</h1>
        <div class="searchbar">
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search...">
        </div>
    </div>
    <div class="main">
        <?php
        session_start();
        if (isset($_SESSION['message'])) {
            echo "<p style='color: red;'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Lokasi Ditemukan</th>
                    <th>Tanggal & Jam Ditemukan</th>
                    <th>Deskripsi Barang</th>
                    <th>Klaim</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli("localhost", "root", "", "lacakin");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM data_temuan WHERE status_klaim = 'belum_diklaim'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><img src='data/temuan/" . $row["foto"] . "' alt='Foto Barang'></td>";
                        echo "<td>" . $row["nama_barang"] . "</td>";
                        echo "<td>" . $row["lokasi"] . "</td>";
                        echo "<td>" . $row["tanggal"] . ", " . $row["waktu"] . "</td>";
                        echo "<td>" . $row["deskripsi"] . "</td>";
                        echo "<td><form action='klaim.php' method='POST'>
                                  <input type='hidden' name='barang_id' value='" . $row["id"] . "'>
                                  <button type='submit' class='claim-button'>Klaim</button>
                              </form></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Data tidak ditemukan.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>        
    </div>
</body>
</html>
