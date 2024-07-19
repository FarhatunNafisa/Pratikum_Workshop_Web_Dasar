<!--PROSES DELETE USER-->

<?php
include "index10.php";

$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";


if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_user WHERE id='$id'");
    if ($query) {
        $query = mysqli_query($conn, "UPDATE tb_user SET nama='$name', email='$email', level='$level', nohp='$nohp', alamat='$alamat' WHERE id='$id'");
        $message = '<script>alert("Data berhasil dihapus"); window.location.href = "../user";</script>';
    } else {
        $message = '<script>alert("Data gagal dihapus")</script>';
    }
    echo $message;
}
