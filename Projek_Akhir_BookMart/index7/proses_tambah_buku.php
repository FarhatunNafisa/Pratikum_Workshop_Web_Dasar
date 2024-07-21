<?php
include "index10.php";

$judul = (isset($_POST['judul'])) ? htmlentities($_POST['judul']) : "";
$pengarang = (isset($_POST['pengarang'])) ? htmlentities($_POST['pengarang']) : "";
$penerbit = (isset($_POST['penerbit'])) ? htmlentities($_POST['penerbit']) : "";
$kategori = (isset($_POST['jenis_kategori'])) ? htmlentities($_POST['jenis_kategori']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
$stok = (isset($_POST['stok'])) ? htmlentities($_POST['stok']) : "";

$kode_rand = rand(10000,99999)."-";
$target_dir = "../img/".$kode_rand;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($_POST['input_buku_validate'])) {
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $cek = getimagesize($_FILES['foto']['tmp_name']);
        if ($cek === false) {
            $message = "Ini bukan file gambar";
            $statusUpload = 0;
        } else {
            $statusUpload = 1;
            if (file_exists($target_file)) {
                $message = "Maaf, file yang dimasukkan sudah ada";
                $statusUpload = 0;
            } else {
                if ($_FILES['foto']['size'] > 600000) { // 600kb
                    $message = "File foto yang diupload terlalu besar";
                    $statusUpload = 0;
                } else {
                    if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif") {
                        $message = "Maaf, hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG dan GIF";
                        $statusUpload = 0;
                    }
                }
            }
        }

        if ($statusUpload == 0) {
            $message = '<script>alert("' . $message . ', Gambar Tidak Dapat Diupload"); window.location="../laporan"</script>';
        } else {
            $SELECT = mysqli_query($conn, "SELECT * FROM tb_buku WHERE judul = '$judul'");
            if (mysqli_num_rows($SELECT) > 0) {
                $message = '<script>alert("Nama buku yang dimasukkan telah ada"); window.location.href = "../laporan";</script>';
            } else {
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                    $query = mysqli_query($conn, "INSERT INTO tb_buku (foto, judul, pengarang, penerbit, kategori, harga, stok) VALUES ('$kode_rand" . $_FILES['foto']['name'] . "', '$judul', '$pengarang', '$penerbit', '$kategori', '$harga', '$stok')");
                    if ($query) {
                        $message = '<script>alert("Data berhasil dimasukkan"); window.location.href = "../laporan";</script>';
                    } else {
                        $message = '<script>alert("Data gagal dimasukkan"); window.location.href = "../laporan";</script>';
                    }
                } else {
                    $message = '<script>alert("Maaf, Terjadi Kesalahan. File Tidak Dapat Diupload"); window.location.href = "../laporan";</script>';
                }
            }
        }
        echo $message;
    }
}
?>
