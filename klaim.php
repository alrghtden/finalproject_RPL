<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$conn = new mysqli("localhost", "root", "", "lacakin");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_full_name = $_SESSION['user_full_name'];

$barang_id = $_POST['barang_id'];

$sql_barang = "SELECT * FROM data_temuan WHERE id = $barang_id AND status_klaim = 'belum_diklaim'";
$result_barang = $conn->query($sql_barang);

if ($result_barang->num_rows > 0) {
    $row_barang = $result_barang->fetch_assoc();
    
    $nama_barang_diklaim = $row_barang['nama_barang'];

    $kode_unik = generateRandomString();

    $sql_kehilangan = "SELECT * FROM data_kehilangan WHERE nama_barang = '$nama_barang_diklaim' AND full_name = '$user_full_name'";
    $result_kehilangan = $conn->query($sql_kehilangan);

    if ($result_kehilangan->num_rows > 0) {
        $current_datetime = date("Y-m-d H:i:s");
        $sql_update_temuan = "UPDATE data_temuan SET status_klaim = 'diklaim', klaim_info = '$kode_unik', tanggal_klaim = '$current_datetime' WHERE id = $barang_id";
        if ($conn->query($sql_update_temuan) === TRUE) {
            $sql_update_kehilangan = "UPDATE data_kehilangan SET status = 'diklaim', klaim_info = '$kode_unik', tanggal_klaim = '$current_datetime' WHERE nama_barang = '$nama_barang_diklaim' AND full_name = '$user_full_name'";
            if ($conn->query($sql_update_kehilangan) === TRUE) {
                header('Location: klaim_sukses.php?kode_unik=' . $kode_unik);
                exit();
            } else {
                echo "<script>alert('Terjadi kesalahan saat mengklaim barang.');</script>";
                echo "<script>window.location.href = 'daftar_barang.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Terjadi kesalahan saat mengklaim barang.');</script>";
            echo "<script>window.location.href = 'daftar_barang.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Maaf, Anda tidak memiliki izin untuk mengklaim barang ini.');</script>";
        echo "<script>window.location.href = 'daftar_barang.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Barang tidak ditemukan atau sudah diklaim.');</script>";
    echo "<script>window.location.href = 'daftar_barang.php';</script>";
    exit();
}

$conn->close();

function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
