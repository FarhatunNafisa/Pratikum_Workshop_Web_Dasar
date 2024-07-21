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

// Gunakan email sebagai pengenal pengguna
$user_email = $email;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $total = 0;

    // Hitung total harga dari keranjang
    foreach ($_SESSION['keranjang'][$user_email] as $item) {
        $total += $item['jumlah'] * $item['harga'];
    }

    // Gunakan prepared statements untuk keamanan
    $stmt = $conn->prepare("INSERT INTO tb_pemesanan (user_email, nama, alamat, telepon, total, tanggal_pemesanan) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssd", $user_email, $nama, $alamat, $telepon, $total);

    if ($stmt->execute()) {
        $pesanan_id = $stmt->insert_id;
        foreach ($_SESSION['keranjang'][$user_email] as $id => $item) {
            $jumlah = $item['jumlah'];
            $harga = $item['harga'];
            $stmt_detail = $conn->prepare("INSERT INTO tb_pemesanan_detail (pesanan_id, buku_id, jumlah, harga) VALUES (?, ?, ?, ?)");
            $stmt_detail->bind_param("iiid", $pesanan_id, $id, $jumlah, $harga);
            $stmt_detail->execute();
        }
        unset($_SESSION['keranjang'][$user_email]);
        echo "<script>alert('Pemesanan berhasil!'); window.location.href='rekomendasibuku';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
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


    <!--Content-->
    <div class="container-lg mt-5 pt-4">
        <h2>Form Pemesanan</h2>
        <form method="post" action="pemesanan.php">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" required>
            </div>
            <button type="submit" class="btn btn-primary">Pesan</button>
        </form>
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