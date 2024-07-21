<?php
session_start();
include "index7/index10.php";

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user']['email'])) {
    echo "<script>window.location.href='index7/signin';</script>";
    exit();
}

// Ambil email pengguna dari sesi
$email = $_SESSION['user']['email'];

// Ambil data pemesanan dari database berdasarkan email pengguna
$sql = "
    SELECT p.id AS pesanan_id, p.nama, p.alamat, p.telepon, p.total, p.tanggal_pemesanan, b.judul, d.harga, d.jumlah
    FROM tb_pemesanan p
    JOIN tb_pemesanan_detail d ON p.id = d.pesanan_id
    JOIN tb_buku b ON d.buku_id = b.id
    WHERE p.user_email = ?
";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die('Prepare failed: ' . $conn->error);
}
$stmt->bind_param("s", $email);
if (!$stmt->execute()) {
    die('Execute failed: ' . $stmt->error);
}
$result = $stmt->get_result();
if (!$result) {
    die('Get result failed: ' . $stmt->error);
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

<!--Riwayat Pembelian-->

<body style="height:3000px">


    <!-- Content -->
    <div class="container-lg mt-5 pt-4">
        <h2>Riwayat Pembelian</h2>
        <?php
        if ($result->num_rows > 0) {
            echo '<table class="table table-warning table-hover">';
            echo '    <thead>';
            echo '        <tr class="table-danger">';
            echo '            <th>Pesanan ID</th>';
            echo '            <th>Judul Buku</th>';
            echo '            <th>Harga</th>';
            echo '            <th>Jumlah</th>';
            echo '            <th>Total</th>';
            echo '            <th>Tanggal Pemesanan</th>';
            echo '        </tr>';
            echo '    </thead>';
            echo '    <tbody>';
            echo '<a href="keranjang" class="btn btn-primary">Kembali ke Keranjang</a>';

            while ($row = $result->fetch_assoc()) {
                $total = $row['harga'] * $row['jumlah'];
                echo '<tr>';
                echo '    <td>' . htmlspecialchars($row['pesanan_id']) . '</td>';
                echo '    <td>' . htmlspecialchars($row['judul']) . '</td>';
                echo '    <td>Rp ' . number_format($row['harga'], 2, ',', '.') . '</td>';
                echo '    <td>' . htmlspecialchars($row['jumlah']) . '</td>';
                echo '    <td>Rp ' . number_format($total, 2, ',', '.') . '</td>';
                echo '    <td>' . htmlspecialchars($row['tanggal_pemesanan']) . '</td>';
                echo '</tr>';
            }

            echo '    </tbody>';
            echo '</table>';
        } else {
            echo '<p>Anda belum memiliki riwayat pembelian.</p>';
            echo '<a href="keranjang" class="btn btn-primary">Kembali ke Keranjang</a>';
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>
    <!-- End Content -->
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

        body {
            background-color: #f5f5f5;
        }

        .container-lg {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        h2 {
            font-family: 'Helvetica Neue', sans-serif;
            font-weight: 300;
            color: #333333;
        }

        .table thead th {
            border-top: none;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>