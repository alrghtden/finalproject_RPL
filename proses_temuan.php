<?php
session_start();

$full_name = $_SESSION['user_full_name'];
$npm = $_SESSION['user_npm'];
$phone_number = $_SESSION['user_phone_number'];
$nama_barang = $_POST['barang'];
$lokasi = $_POST['lokasi'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$deskripsi = $_POST['deskripsi'];

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $foto = $_FILES['foto']['name'];
    $target_dir = "data/temuan/";
    $target_file = $target_dir . basename($foto);

    $conn = new mysqli("localhost", "root", "", "lacakin");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "INSERT INTO data_temuan (full_name, npm, phone_number, nama_barang, lokasi, tanggal, waktu, deskripsi, foto) 
            VALUES ('$full_name', '$npm', '$phone_number', '$nama_barang', '$lokasi', '$tanggal', '$waktu', '$deskripsi', '$foto')";

    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            $_SESSION['pesan'] = "Data berhasil disimpan.";
        } else {
            $_SESSION['pesan'] = "Maaf, terjadi kesalahan saat mengunggah file Anda.";
        }
    } else {
        $_SESSION['pesan'] = "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $_SESSION['pesan'] = "No file was uploaded or there was an upload error.";
}

$conn->close();

header("Location: daftar_barang.php");
exit();
?>
