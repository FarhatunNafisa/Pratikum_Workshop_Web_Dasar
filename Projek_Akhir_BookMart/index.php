<?php
// Pastikan session sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookMart:Toko Buku Online Modern</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<!--MAIN-->

<body style="height:3000px">
    <!--Navbar-->
    <?php include "index13.php"; ?>
    <!--Akhir Navbar-->

    <!--Content-->
    <?php
    if (isset($_GET['x']) && $_GET['x'] == 'home') {
        include "index5.php";
    } elseif (isset($_GET['x']) && $_GET['x'] == 'promo') {
        include "index1.php";
    } elseif (isset($_GET['x']) && $_GET['x'] == 'rekomendasibuku') {
        include "index2.php";
    }  elseif (isset($_GET['x']) && $_GET['x'] == 'keranjang') {
        include "index4.php";
    } elseif (isset($_GET['x']) && $_GET['x'] == 'admin') {
        if (isset($_SESSION['user']['level']) && ($_SESSION['user']['level'] == 1 || $_SESSION['user']['level'] == 2)) {
            include "index14.php";
            
        } else {
            include "index5.php";
        }
    } elseif (isset($_GET['x']) && $_GET['x'] == 'laporan') {
        include "index14.php";
    } elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
        include "index15.php";
    } elseif (isset($_GET['x']) && $_GET['x'] == 'kategori' && isset($_GET['category'])) {
        include "index3.php";
    }else {
        include "index5.php";
    } 
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>