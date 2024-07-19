<?php
include "index7/index10.php";
$hasil = [];
$query = mysqli_query($conn, "SELECT * FROM tb_buku
LEFT JOIN tb_kategori ON tb_kategori.id = tb_buku.kategori");

if ($query) {
    while ($record = mysqli_fetch_array($query)) {
        $hasil[] = $record;
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

$select_jen_kat=mysqli_query($conn,"SELECT jenis_kategori FROM tb_kategori");
$select_jen_kat=mysqli_query($conn,"SELECT nama_kategori FROM tb_kategori");
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookMart:Toko Buku Online Modern</title>
    <link rel="stylesheet" href="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<!--ADMIN USER-->

<body>
    <!--Navbar-->
    <!--Akhir Navbar-->


    <div class="container-lg mt-3 pt-4">
        <div class="row">
            <div class="col-lg-2">
                <!-- Hamburger Menu -->
                <div class="hamburger" id="hamburger-menu">
                    <i class="bi bi-list"></i>
                </div>
                <!-- Sidebar -->
                <ul class="nav mt-2 nav-pills flex-column custom-sidebar" id="sidebar">
                    <li class="nav-item">
                        <a class="nav-link active" href="laporan"><i class="bi bi-graph-up"></i> Pengelolaan Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'user') ? 'active' : ''; ?>" href="user"><i class="bi bi-person-fill-gear"></i> User</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-10 mt-2">
                <!-- Konten User -->
                <div class="card">
                    <div class="card-header">
                        Halaman Buku
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalTambahBuku">Tambah Buku</button>
                            </div>
                        </div>
                        <!-- Modal tambah Buku-->
                        <div class="modal fade" id="ModalTambahBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Menambah Data Buku</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" action="proses_tambah_buku.php" method="POST" novalidate>
                                            <!--Proses Input Buku ada di proses_tambah_buku.php-->
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="Judul Buku" name="judul" required>
                                                        <label for="floatingInput">Judul Buku</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Judul Buku
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="Pengarang" name="pengarang" required>
                                                        <label for="floatingInput">Pengarang</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Nama Pengarang
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="Penerbit" name="penerbit" required>
                                                        <label for="floatingInput">Penerbit</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Nama Penerbit
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="Jenis Kategori" name="jenis_kategori" required>
                                                        <label for="floatingInput">Jenis Kategori</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Jenis Kategori Buku
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="Nama Kategori" name="nama_kategori" required>
                                                        <label for="floatingInput">Nama Kategori</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Nama Kategori Buku
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="stok" name="stok" required>
                                                        <label for="floatingInput">Stok</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Stok Buku
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="input-group mb-3">
                                                        <input type="file" class="form-control py-3" id="uploadFoto" name="foto" required>
                                                        <label class="input-group-text" for="uploadFoto">Upload Foto Buku</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan File Foto Buku
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required>
                                                        <label for="floatingInput">Harga</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Harga Buku
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary custom-btn" name="input_buku_validate" value="12345">Tambah Buku</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal tambah Buku-->
                        <?php
                        foreach ($hasil as $row) {
                        ?>
                            <!-- Modal View-->
                            <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Buku</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="needs-validation" action="proses_edit_buku.php" method="POST" novalidate>
                                                <!--Proses Edit Buku ada di proses_edit_buku.php-->
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="Judul Buku" name="judul" value="<?php echo $row['judul'] ?>">
                                                            <label for="floatingInput">Judul Buku</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="Pengarang" name="author" value="<?php echo $row['pengarang'] ?>">
                                                            <label for="floatingInput">Pengarang</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="Penulis" name="author" value="<?php echo $row['penerbit'] ?>">
                                                            <label for="floatingInput">Penerbit</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="Stok" name="stok" value="<?php echo $row['stok'] ?>">
                                                            <label for="floatingInput">Stok</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="Kategori" name="nama_kategori" value="<?php echo $row['nama_kategori'] ?>">
                                                            <label for="floatingInput">Nama Kategori</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="Jenis Kategori" name="jeniskategori" value="<?php echo $row['jenis_kategori'] ?>">
                                                            <label for="floatingInput">Jenis Kategori</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="Foto Buku" name="foto" value="<?php echo $row['foto'] ?>">
                                                            <label for="floatingInput">Foto Buku</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="Harga" name="harga" value="<?php echo $row['harga'] ?>">
                                                            <label for="floatingInput">Harga</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="proses_hapus_buku.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus Buku</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal View-->
                        <?php } ?>
                        <div class="table-responsive me-3 ms-3 mt-3">
                            <table class="table table-warning table-hover">
                                <thead>
                                    <tr class="table-danger">
                                        <th scope="col">Foto</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Pengarang</th>
                                        <th scope="col">Penerbit</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jenis Kategori</th>
                                        <th scope="col">Nama Kategori</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($hasil as $row) { ?>
                                        <tr>
                                            <div style="width: 90px">
                                                <td><img src="img/<?php echo $row['foto'] ?>" alt="<?php echo $row['judul'] ?>" class="img-thumbnail" width="100"></td>
                                            </div>
                                            <td><?php echo $row['judul'] ?></td>
                                            <td><?php echo $row['pengarang'] ?></td>
                                            <td><?php echo $row['penerbit'] ?></td>
                                            <td><?php echo "Rp " . number_format($row['harga'], 2, ',', '.') ?></td>
                                            <td><?php echo $row['jenis_kategori'] ?></td>
                                            <td><?php echo $row['nama_kategori'] ?></td>
                                            <td><?php echo $row['stok'] ?></td>

                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-info btn-sm me-1"><i class="bi bi-eye" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>"></i></button>
                                                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></i></button>
                                                    <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash"></i></i></button>
                                                    <button class="btn btn-secondary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalResetPassword<?php echo $row['id'] ?>"><i class="bi bi-key"></i></i></i></button>
                                                </div>
                                            </td>

                        </div>
                        </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>

    <!--End Content-->
    <div class="fixed-bottom text-center" style="background: linear-gradient(to bottom right, #F5F5DC, #f5d1c8);">
        <div style="font-weight:bold; word-spacing: 5px;">Build with <i class="bi bi-heart-fill"></i> by <a href="https://identitas.rf.gd/Projek_Akhir_BookMart/">BookMart</a></div>
    </div>

    <style>
        .custom-btn {
            background-color: #e2e6ea;
            color: #000;
            border-color: #e2e6ea;
        }

        .custom-btn:hover {
            background-color: #f5d1c8;
            color: #000;
            border-color: #f8f9fa;
        }

        .custom-active {
            color: black !important;
            background-color: #f5d1c8 !important;
            text-decoration: none;
            padding: 8px;
            border-radius: 10px;
        }

        .custom-sidebar {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .custom-sidebar .nav-link {
            color: #333;
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .custom-sidebar .nav-link:hover {
            background-color: #e2e6ea;
            color: #000;
        }

        .custom-sidebar .nav-link.active {
            background-color: #f5d1c8;
            color: black;
        }

        .custom-sidebar .nav-item+.nav-item {
            margin-top: 10px;
        }

        .hamburger {
            display: none;
            cursor: pointer;
            font-size: 24px;
        }

        .sidebar-hidden {
            display: none;
        }

        @media (max-width: 991px) {
            .hamburger {
                display: block;
            }

            .sidebar-hidden {
                display: block;
            }

            .custom-sidebar {
                display: none;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const links = sidebar.getElementsByClassName('nav-link');
            const currentPath = window.location.pathname.split('/').pop();

            for (let i = 0; i < links.length; i++) {
                const linkPath = links[i].getAttribute('href');
                if (linkPath === currentPath) {
                    links[i].classList.add('active');
                }

                links[i].addEventListener('click', function(event) {
                    event.preventDefault();
                    const current = sidebar.getElementsByClassName('active');
                    if (current.length > 0) {
                        current[0].classList.remove('active');
                    }
                    this.classList.add('active');
                    window.location.href = this.getAttribute('href');
                });
            }
        });

        document.getElementById('hamburger-menu').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            if (sidebar.style.display === 'none' || sidebar.style.display === '') {
                sidebar.style.display = 'block';
            } else {
                sidebar.style.display = 'none';
            }
        });
    </script>
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