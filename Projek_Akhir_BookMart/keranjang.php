<?php
include "index7/index10.php"; 

if (!isset($_SESSION['user']['email'])) {
    $_SESSION['message'] = "Harus Login untuk bisa mengakses keranjang";
    header("Location: index7/signin");
    exit();
}

$email = $_SESSION['user']['email'];
$user_id = $email;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_to_cart'])) {
        if (isset($_POST['id'], $_POST['judul'], $_POST['harga'])) {
            $id = htmlspecialchars($_POST['id']);
            $judul = htmlspecialchars($_POST['judul']);
            $harga = htmlspecialchars($_POST['harga']);

            if (!isset($_SESSION['keranjang'][$user_id])) {
                $_SESSION['keranjang'][$user_id] = array();
            }

            if (isset($_SESSION['keranjang'][$user_id][$id])) {
                $_SESSION['keranjang'][$user_id][$id]['jumlah']++;
            } else {
                $_SESSION['keranjang'][$user_id][$id] = array(
                    'judul' => $judul,
                    'harga' => $harga,
                    'jumlah' => 1
                );
            }

            $_SESSION['message'] = "Keranjang Buku berhasil di Tambahkan";
        } else {
            $_SESSION['error'] = "Data buku tidak lengkap.";
        }
    } elseif (isset($_POST['remove_from_cart'])) {
        if (isset($_POST['id'])) {
            $id = htmlspecialchars($_POST['id']);

            if (isset($_SESSION['keranjang'][$user_id])) {
                if (isset($_SESSION['keranjang'][$user_id][$id])) {
                    if ($_SESSION['keranjang'][$user_id][$id]['jumlah'] > 1) {
                        $_SESSION['keranjang'][$user_id][$id]['jumlah']--;
                    } else {
                        unset($_SESSION['keranjang'][$user_id][$id]);
                    }

                    if (empty($_SESSION['keranjang'][$user_id])) {
                        unset($_SESSION['keranjang'][$user_id]);
                    }

                    $_SESSION['message'] = "Keranjang Buku berhasil di hapus";
                } else {
                    $_SESSION['error'] = "Item tidak ditemukan di keranjang.";
                    header("Location: keranjang");
                    exit();
                }
            } else {
                $_SESSION['error'] = "Keranjang tidak ditemukan untuk pengguna ini.";
                header("Location: keranjang");
                exit();
            }
        } else {
            $_SESSION['error'] = "Data buku tidak lengkap.";
            header("Location: keranjang");
            exit();
        }
    }
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

<!--KERANJANG-->

<body style="height:3000px">

<?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo htmlspecialchars($_SESSION['message']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <!-- Display error message -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo htmlspecialchars($_SESSION['error']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!--Content-->
    <div class="container-lg mt-5 pt-4">
        <h2>Keranjang Belanja</h2>
        <?php
        if (isset($_SESSION['keranjang'][$user_id]) && !empty($_SESSION['keranjang'][$user_id])) {
            $total = 0;
            echo '<div class="table-responsive me-3 ms-3">';
            echo '<table class="table table-warning table-hover">';
            echo '    <thead>';
            echo '        <tr class="table-danger">';
            echo '            <th>Judul</th>';
            echo '            <th>Harga</th>';
            echo '            <th>Jumlah</th>';
            echo '            <th>Total</th>';
            echo '            <th>Aksi</th>';
            echo '        </tr>';
            echo '    </thead>';
            echo '    <tbody>';

            foreach ($_SESSION['keranjang'][$user_id] as $id => $item) {
                $itemTotal = $item['harga'] * $item['jumlah'];
                $total += $itemTotal;
                echo '<tr>';
                echo '    <td>' . htmlspecialchars($item['judul']) . '</td>';
                echo '    <td>Rp ' . number_format($item['harga'], 2, ',', '.') . '</td>';
                echo '    <td>' . $item['jumlah'] . '</td>';
                echo '    <td>Rp ' . number_format($itemTotal, 2, ',', '.') . '</td>';
                echo '    <td>';
                echo '        <form method="post" action="keranjang">';
                echo '            <input type="hidden" name="id" value="' . $id . '">';
                echo '            <button type="submit" name="remove_from_cart" class="btn btn-danger btn-sm">Hapus</button>';
                echo '        </form>';
                echo '    </td>';
                echo '</tr>';
            }

            echo '    </tbody>';
            echo '</table>';
            echo '</div>';
            echo '<h5>Total: Rp ' . number_format($total, 2, ',', '.') . '</h5>';
            echo '<a href="pemesanan.php" class="btn btn-primary">Lanjutkan ke Pemesanan</a>';
            echo '<a href="riwayat_pembelian.php" class="btn btn-primary">Lihat Riwayat Pembelian</a>';
        } else {
            echo '<p>Keranjang Anda kosong.</p>';
            echo '<a href="riwayat_pembelian.php" class="btn btn-primary">Lihat Riwayat Pembelian</a>';
        }
        ?>
    </div>
    <!--End Content-->

    <div class="fixed-bottom text-center" style="background: linear-gradient(to bottom right, #F5F5DC, #f5d1c8);">
        <div style="font-weight:bold; word-spacing: 5px;">Build with <i class="bi bi-heart-fill"></i> by <a href="https://identitas.rf.gd/Projek_Akhir_BookMart/">BookMart</a></div>


    </div>

    <style>
        .custom-active {
            color: black !important;
            background-color: #f5d1c8 !important;
            text-decoration: none;
            padding: 8px;
            border-radius: 10px;
        }
    </style>
    <style>
        h2 {
            font-family: 'Helvetica Neue', sans-serif;
            font-weight: 300;
            color: #333333;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dddddd;
        }

        table th {
            background-color: #f8f9fa;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .btn-primary {
            background-color: #d2b48c;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #b29b7a;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            padding: 5px 10px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .fixed-bottom {
            background: linear-gradient(to bottom right, #f5f5dc, #f5d1c8);
            padding: 10px 0;
        }

        .fixed-bottom a {
            color: #333333;
            text-decoration: none;
        }

        .fixed-bottom a:hover {
            text-decoration: underline;
        }

        .table thead th {
            border-top: none;
        }

        .table tfoot td {
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>