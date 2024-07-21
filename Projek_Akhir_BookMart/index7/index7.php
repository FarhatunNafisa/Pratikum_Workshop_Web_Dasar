<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookMart:Toko Buku Online Modern</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <?php
    if (isset($_GET['x']) && $_GET['x'] == 'login') {
        include "login.php";
    } elseif (isset($_GET['x']) && $_GET['x'] == 'signin') {
        include "signin.php";
    } elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
        include "logout.php";
    } elseif (isset($_GET['x']) && $_GET['x'] == 'tambahuser') {
        include "tambahuser.php";
    } elseif (isset($_GET['x']) && $_GET['x'] == 'edit') {
        include "edit.php";
    } elseif (isset($_GET['x']) && $_GET['x'] == 'delete') {
        include "delete.php";
    } elseif (isset($_GET['x']) && $_GET['x'] == 'reset_password') {
        include "reset_password.php";
    } elseif (isset($_GET['x']) && $_GET['x'] == 'ubah_password') {
        include "ubah_password.php";
    }elseif (isset($_GET['x']) && $_GET['x'] == 'proses_delete_buku') {
        include "proses_delete_buku.php";
    }else {
        include "../home";
    }
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>