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
<!--Beli Buku-->

<body style="height:3000px">
    <!--Navbar-->
    <!--Akhir Navbar-->

    <!--Content-->
    <div class="container-lg mt-5 pt-4">
        <div class="row justify-content-center">
            <?php
            include "index7/index10.php";

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT foto, judul, pengarang, penerbit, harga FROM tb_buku"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">';
                    echo '    <div class="card h-100">';
                    echo '        <img src="img/' . htmlspecialchars($row['foto']) . '" class="card-img-top" alt="' . htmlspecialchars($row['judul']) . '">';
                    echo '        <div class="card-body">';
                    echo '            <h5 class="card-title">' . htmlspecialchars($row['judul']) . '</h5>';
                    echo '            <p class="card-text"> ' . htmlspecialchars($row['pengarang']) . '</p>';
                    echo '            <p class="card-text"> ' . htmlspecialchars($row['penerbit']) . '</p>';
                    echo '            <p class="card-text card-price-custom ">     Rp ' . number_format($row['harga'], 2, ',', '.') . '</p>';
                    echo '            <button class="btn btn-warning btn-sm">Masukkan ke keranjang</button>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No books available</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>


    </div>
    <!--End Content-->
    <div class="fixed-bottom text-center" style="background: linear-gradient(to bottom right, #F5F5DC, #f5d1c8);">
        <div style="font-weight:bold; word-spacing: 5px;">Build with <i class="bi bi-heart-fill"></i> by <a href="https://identitas.rf.gd/Projek_Akhir_BookMart/">BookMart</a></div>

    </div>
    <style>
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            max-height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 1rem;
            background-color: #f8f9fa;
        }

        .card-title {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .card-price-custom {
            font-weight: bold;
            color: #d2b48c;
        }

        .btn-custom {
            display: inline-block;
            padding: 5px 10px;
            background-color: #d2b48c;
            color: black;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #b29b7a;
        }
    </style>

    <style>
        .custom-active {
            color: black !important;
            background-color: #f5d1c8 !important;
            text-decoration: none;
            padding: 8px;
            border-radius: 10px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>