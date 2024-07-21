<?php
include "index10.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";
$judul = isset($_POST['judul']) ? htmlentities($_POST['judul']) : "";
$pengarang = isset($_POST['pengarang']) ? htmlentities($_POST['pengarang']) : "";
$penerbit = isset($_POST['penerbit']) ? htmlentities($_POST['penerbit']) : "";
$kategori = isset($_POST['jenis_kategori']) ? htmlentities($_POST['jenis_kategori']) : "";
$harga = isset($_POST['harga']) ? htmlentities($_POST['harga']) : "";
$stok = isset($_POST['stok']) ? htmlentities($_POST['stok']) : "";

$kode_rand = rand(10000, 99999) . "-";
$target_dir = "../img/";
$target_file = $target_dir . $kode_rand . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($_POST['edit_buku_validate'])) {
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $cek = getimagesize($_FILES['foto']['tmp_name']);
        if ($cek === false) {
            $message = "Ini bukan file gambar";
        } else {
            $statusUpload = 1;
            if (file_exists($target_file)) {
                $message = "Maaf, file yang dimasukkan sudah ada";
                $statusUpload = 0;
            } else if ($_FILES['foto']['size'] > 900000) { // 900kb
                $message = "File foto yang diupload terlalu besar";
                $statusUpload = 0;
            } else if (!in_array($imageType, ["jpg", "png", "jpeg", "gif"])) {
                $message = "Maaf, hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG dan GIF";
                $statusUpload = 0;
            } else {
                if ($statusUpload == 1) {
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                        $query = mysqli_query($conn, "UPDATE tb_buku SET foto='$kode_rand" . $_FILES['foto']['name'] . "', judul='$judul', pengarang='$pengarang', penerbit='$penerbit', kategori='$kategori', harga='$harga', stok='$stok' WHERE id='$id'");
                        if ($query) {
                            $message = '<script>alert("Data berhasil diperbarui"); window.location.href = "../laporan";</script>';
                        } else {
                            $message = '<script>alert("Data gagal diperbarui"); window.location.href = "../laporan";</script>';
                        }
                    } else {
                        $message = '<script>alert("Maaf, Terjadi Kesalahan. File Tidak Dapat Diupload"); window.location.href = "../laporan";</script>';
                    }
                } else {
                    $message = '<script>alert("' . $message . ', Gambar Tidak Dapat Diupload"); window.location="../laporan"</script>';
                }
            }
        }
    } else {
        $message = '<script>alert("Tidak ada file yang diupload"); window.location="../laporan";</script>';
    }
    echo $message;
}
?>
