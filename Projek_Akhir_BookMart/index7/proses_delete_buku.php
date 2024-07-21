<?php
include "index10.php";

$id = isset($_POST['id']) ? mysqli_real_escape_string($conn, htmlentities($_POST['id'])) : "";

if (!empty($_POST['delete_buku_validate'])) {
    $query = mysqli_query($conn, "SELECT foto FROM tb_buku WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $file = "../img/" . $data['foto'];
        
        $query = mysqli_query($conn, "DELETE FROM tb_buku WHERE id='$id'");

        if ($query) {
            if (file_exists($file)) {
                unlink($file);
            }
            $message = '<script>alert("Data buku berhasil dihapus"); window.location.href = "../laporan";</script>';
        } else {
            $message = '<script>alert("Data buku gagal dihapus"); window.location.href = "../laporan";</script>';
        }
    } else {
        $message = '<script>alert("Buku tidak ditemukan"); window.location.href = "../laporan";</script>';
    }

    echo $message;
}
?>
