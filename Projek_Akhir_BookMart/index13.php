<!--SIDEBAR-->
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top sticky-top">
    <div class="container-lg">
        <!--Logo Bookmark-->
        <a class="navbar-brand" href=".">
            <img src="logo1.png" alt="BookMart Logo" style="height: 80px; width: auto;">
            <span style="margin-left: 10px; font-family:'Poppins',sans-serif; font-weight: 600; font-size:24px; color: #333;">BookMart</span>
        </a>
        <!--Toggle Btn-->
        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--SideBar-->
        <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <!--Sidebar Header-->
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">BookMart</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!--Sidebar Body-->
            <div class="offcanvas-body flex-lg-row pt-lg-0">
                <ul class="navbar-nav ms-auto justify-content-center fs-5 flex-grow-1 pe-1">
                    <li class="nav-item">
                        <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'custom-active' : 'link-dark'; ?>" aria-current="page" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'promo') ? 'custom-active' : 'link-dark'; ?>" aria-current="page" href="promo">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'rekomendasibuku') ? 'custom-active' : 'link-dark'; ?>" aria-current="page" href="rekomendasibuku">Beli Buku</a>
                    </li>
                    <li class="nav-item dropdown">
                        <?php $isActive = (isset($_GET['x']) && $_GET['x'] == 'kategori') ? 'custom-active' : 'link-dark'; ?>
                        <a class="nav-link dropdown-toggle ps-2 <?php echo $isActive; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu dropdown-menu-columns mt-4">
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=agama-islam">Agama Islam</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=arsitektur">Arsitektur</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=bahasa-dan-sastra">Bahasa dan Sastra</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=biologi">Biologi</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=bisnis">Bisnis</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=ekonomi">Ekonomi</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=farmasi">Farmasi</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'keranjang') ? 'custom-active' : 'link-dark'; ?>" aria-current="page" href="keranjang"><i class="bi bi-cart"></i></a>
                    </li>
                    <?php if (isset($_SESSION['user']['level']) && ($_SESSION['user']['level'] == 1 || $_SESSION['user']['level'] == 2)) { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'admin') ? 'custom-active' : 'link-dark'; ?>" aria-current="page" href="admin">AdPen</a>
                        </li>
                    <?php } ?>
                </ul>
                <form class="d-flex justify-content-center mt-2" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cari Buku" aria-label="Search">
                    <button class="text-black btn btn-outline-light" type="submit">Search</button>
                </form>
                <!--Login/Sign Up-->
                <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3 mt-3">
                    <?php if (isset($_SESSION['user']['email'])) : ?>
                        <div class="dropdown">
                            <a class="text-black text-decoration-none px-3 py-1 bg-light rounded-4 dropdown-toggle" style="background-color: #f5f5dc;" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo strtolower($_SESSION['user']['email']); ?>
                            </a>
                            <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person-lock"></i> Profil</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword"><i class="bi bi-key"></i> Ubah Password</a></li>
                                <li><a class="dropdown-item" href="index7/logout"><i class="bi bi-box-arrow-in-right"></i> Logout</a></li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <a href="index7/login" class="text-black text-decoration-none px-3 py-1 bg-light rounded-4" style="background-color: #f5f5dc;">Login</a>
                    <?php endif; ?>
                </div>
                <style>
                    .dropdown-item:active {
                        background-color: #f5d1c8 !important;
                        color: black !important;
                    }


                    .navbar-nav {
                        display: flex;
                        flex-direction: column;
                        gap: 1rem;
                    }

                    .nav-link:hover {
                        background-color: #F5F5DC;
                        color: black !important;
                        text-decoration: none;
                        padding: 8px;
                        border-radius: 10px;
                    }
                </style>
            </div>
        </div>
    </div>
</nav>

<!-- Modal Ubah Password-->
<div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="ubahPasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ubahPasswordLabel">Ubah Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="index7/index19.php" method="POST" novalidate>
                    <input type="hidden" value="<?php echo $_SESSION['user']['email']; ?>" name="email">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="nama@example.com" name="email" required value="<?php echo $_SESSION['user']['email']; ?>" disabled>
                                <label for="floatingInput">Email</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="passwordlama" placeholder="Password Lama" name="passwordlama" required>
                                <label for="passwordlama">Password Lama</label>
                                <div class="invalid-feedback">
                                    Masukkan password lama
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="passwordbaru" placeholder="Password Baru" name="passwordbaru" required>
                                <label for="passwordbaru">Password Baru</label>
                                <div class="invalid-feedback">
                                    Masukkan password baru
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="repasswordbaru" placeholder="Konfirmasi Password Baru" name="repasswordbaru" required>
                                <label for="repasswordbaru">Konfirmasi Password Baru</label>
                                <div class="invalid-feedback">
                                    Masukkan ulangi Password Baru
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary custom-btn" name="ubah_password_validate">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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