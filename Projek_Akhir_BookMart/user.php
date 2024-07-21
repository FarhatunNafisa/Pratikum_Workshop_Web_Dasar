<?php
include "index7/index10.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user");
while ($record = mysqli_fetch_array($query)) {
    $hasil[] = $record;
}
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
                        <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'laporan') ? 'active' : ''; ?>" href="laporan"><i class="bi bi-graph-up"></i> Pengelolaan Buku</a>
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
                        Halaman User
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah User</button>
                            </div>
                        </div>
                        <!-- Modal tambah User-->
                        <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Menambah Data User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" action="index7/tambahuser" method="POST" novalidate>
                                            <!--Proses Input User ada di Index 7/Index16-->
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="YourName" name="nama" required>
                                                        <label for="floatingInput">Nama</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Nama
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" id="floatingInput" placeholder="nama@example.com" name="email" required>
                                                        <label for="floatingInput">Email</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Email
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" aria-label="Default select example" name="level" required>
                                                            <option selected hidden value="">Pilih Level User</option>
                                                            <option value="1">Pemilik/Admin</option>
                                                            <option value="2">Penjual</option>
                                                            <option value="3">Pelanggan</option>
                                                        </select>
                                                        <label for="floatingInput">Level User</label>
                                                        <div class="invalid-feedback">
                                                            Pilih Level User
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxx" name="nohp" required>
                                                        <label for="floatingInput">No Hp</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan No Hp
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="password" class="form-control" id="floatingInput" placeholder="Password" value="12345678" name="password">
                                                        <label for="floatingPassword">Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating">
                                                <textarea class="form-control" id="floatingInput" style="height:100px;" name="alamat" required></textarea>
                                                <label for="floatingInput">Alamat</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Alamat
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary custom-btn" name="input_user_validate" value="12345">Tambah User</button>

                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal tambah User-->
                        <?php
                        foreach ($hasil as $row) {
                        ?>
                            <!-- Modal View-->
                            <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data User</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="needs-validation" action="index7/index16.php" method="POST" novalidate>
                                                <!--Proses Input User ada di Index 7/Index16-->
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="YourName" name="nama" value="<?php echo $row['nama'] ?>">
                                                            <label for="floatingInput">Nama</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="email" class="form-control" id="floatingInput" placeholder="nama@example.com" name="email" value="<?php echo $row['email'] ?>">
                                                            <label for="floatingInput">Email</label>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-floating mb-3">
                                                            <select disabled class="form-select" aria-label="Default select example" name="level" required>
                                                                <?php
                                                                $data = array("Admin", "Penjual", "Pelanggan");
                                                                foreach ($data as $key => $value) {
                                                                    if ($row['level'] == $key + 1) {
                                                                        echo "<option selected value='" . ($key + 1) . "'>$value</option>";
                                                                    } else {
                                                                        echo "<option value='" . ($key + 1) . "'>$value</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <label for="floatingInput">Level User</label>
                                                            <div class="invalid-feedback">
                                                                Pilih Level User
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="number" class="form-control" id="floatingInput" placeholder="08xxxxx" name="nohp" value="<?php echo $row['NoHp']; ?>">
                                                            <label for="floatingInput">No Hp</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-floating">
                                                    <textarea disabled class="form-control" id="floatingInput" style="height:100px;" name="alamat" value=""><?php echo $row['alamat'] ?></textarea>
                                                    <label for="floatingInput">Alamat</label>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal tambah View-->

                            <!-- Modal Edit-->
                            <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="needs-validation" action="index7/edit" method="POST" novalidate>
                                                <!--Proses Edit User ada di Index 7/Index17-->
                                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput" placeholder="YourName" name="nama" required value="<?php echo $row['nama'] ?>">
                                                            <label for="floatingInput">Nama</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input <?php echo (($row['email'] == $_SESSION['user']['email'] && ($_SESSION['user']['level'] == 1 || $_SESSION['user']['level'] == 2))) ? 'disabled' : '';  ?> type="email" class="form-control" id="floatingInput" placeholder="nama@example.com" name="email" required value="<?php echo $row['email'] ?>">
                                                            <label for="floatingInput">Email</label>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" aria-label="Default select example" name="level" required>
                                                                <?php
                                                                $data = array("Admin", "Penjual", "Pelanggan");
                                                                foreach ($data as $key => $value) {
                                                                    if ($row['level'] == $key + 1) {
                                                                        echo "<option selected value='" . ($key + 1) . "'>$value</option>";
                                                                    } else {
                                                                        echo "<option value='" . ($key + 1) . "'>$value</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>

                                                            <label for="floatingInput">Level User</label>
                                                            <div class="invalid-feedback">
                                                                Pilih Level User
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="form-floating mb-3">
                                                            <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxx" name="nohp" value="<?php echo $row['NoHp']; ?>">
                                                            <label for="floatingInput">No Hp</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-floating">
                                                    <textarea class="form-control" id="floatingInput" style="height:100px;" name="alamat" value=""><?php echo $row['alamat'] ?></textarea>
                                                    <label for="floatingInput">Alamat</label>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary custom-btn" name="input_user_validate" value="12345">Simpan Perubahan</button>

                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal Edit-->

                            <!-- Modal Delete-->
                            <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Delete</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="needs-validation" action="index7/delete" method="POST" novalidate>

                                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                                <div class="col-lg-12">
                                                    <?php
                                                    if (isset($row['email']) && isset($_SESSION['user']['email']) && isset($_SESSION['user']['level'])) {
                                                        if ($row['email'] == $_SESSION['user']['email'] && ($_SESSION['user']['level'] == 1 || $_SESSION['user']['level'] == 2)) {
                                                            echo "<div class='alert alert-danger'>Anda tidak dapat menghapus akun sendiri</div>";
                                                        } else {
                                                            echo "Apakah anda yakin ingin menghapus user <b>" . $row['email'] . "</b>?";
                                                        }
                                                    } else {
                                                        echo "<div class='alert alert-warning'>Sesi belum diset atau tidak lengkap.</div>";
                                                    }
                                                    ?>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345" <?php echo (($row['email'] == $_SESSION['user']['email'] && ($_SESSION['user']['level'] == 1 || $_SESSION['user']['level'] == 2))) ? 'disabled' : ''; ?>>Hapus User</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal Delete-->

                            <!-- Modal Reset Password-->
                            <div class="modal fade" id="ModalResetPassword<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="needs-validation" action="index7/reset_password" method="POST" novalidate>
                                                <!--Proses Edit User ada di Index 7/Index17-->
                                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                                <div class="col-lg-12">
                                                    <?php
                                                    if (isset($row['email']) && isset($_SESSION['user']['email']) && isset($_SESSION['user']['level'])) {
                                                        if ($row['email'] == $_SESSION['user']['email'] && ($_SESSION['user']['level'] == 1 || $_SESSION['user']['level'] == 2)) {
                                                            echo "<div class='alert alert-danger'>Anda tidak dapat mereset password sendiri</div>";
                                                        } else {
                                                            echo "Apakah anda yakin ingin mereset password user ini? <b> menjadi password bawaan sistem yaitu <b?>password</b> " . $row['email'] . "</b>?";
                                                        }
                                                    } else {
                                                        echo "<div class='alert alert-warning'>Sesi belum diset atau tidak lengkap.</div>";
                                                    }
                                                    ?>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" name="input_user_validate" value="12345" <?php echo (($row['email'] == $_SESSION['user']['email'] && ($_SESSION['user']['level'] == 1 || $_SESSION['user']['level'] == 2))) ? 'disabled' : ''; ?>>Reset Password</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal Reset Password-->

                        <?php
                        }
                        ?>
                        <?php
                        if (empty($hasil)) {
                            echo "Data user tidak ada";
                        } else {

                        ?>
                    </div>


                <?php
                        }
                ?>
                <div class="table-responsive me-3 ms-3">
                    <table class="table table-warning table-hover">
                        <thead>
                            <tr class="table-danger">
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Level</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($hasil as $row) {

                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?php echo $row['nama'] ?> </td>
                                    <td><?php echo $row['email'] ?> </td>
                                    <td><?php
                                        if ($row['level'] == 1) {
                                            echo "Pemilik/Admin";
                                        } elseif ($row['level'] == 2) {
                                            echo "Penjual";
                                        } else {
                                            echo "Pelanggan";
                                        }
                                        ?> </td>
                                    <td><?php echo $row['NoHp'] ?> </td>
                                    <td class="d-flex">
                                        <button class="btn btn-info btn-sm me-1"><i class="bi bi-eye" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>"></i></button>
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash"></i></i></button>
                                        <button class="btn btn-secondary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalResetPassword<?php echo $row['id'] ?>"><i class="bi bi-key"></i></i></i></button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
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