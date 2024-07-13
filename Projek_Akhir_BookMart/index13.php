<!--SIDEBAR-->

<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top sticky-top">
    <div class="container-lg">
        <!--Logo Bookmark-->
        <a class="navbar-brand" href=".">
            <img src="logo1.png" alt="BookMart Logo" style="height: 80px; width: autopx;">
            <span style="margin-left: 10px; font-family:'Poppins',sans-serif; font-weight: 600;
    font-size:24px; color: #333;">BookMart</span>
        </a>
        <!--Toggle Btn-->
        <button class="navbar-toggler shadow-none border-0 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--SideBar-->
        <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <!--Sidebar Header-->
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">BookMark</h5>
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
                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'rekomendasibuku') ? 'custom-active' : 'link-dark'; ?>" aria-current="page" href="rekomendasibuku">Rekomendasi Buku</a>
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
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=filsafat">Filsafat</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=geografi">Geografi</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=hukum">Hukum</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=ilmu-komputer">Ilmu Komputer</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=ilmu-terapan">Ilmu Terapan</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=kebidanan">Kebidanan</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=kedokteran">Kedokteran</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=kehutanan">Kehutanan</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=keperawatan">Keperawatan</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=kesehatan">Kesehatan</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=kimia">Kimia</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=komunikasi">Komunikasi</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=manajemen">Manajemen</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=matematika">Matematika</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=motivasi">Motivasi</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=novel">Novel</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=pendidikan">Pendidikan</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=pertanian">Pertanian</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=psikologi">Psikologi</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=resep">Resep</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=sains-dan-teknologi">Sains dan Teknologi</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=sosial-budaya">Sosial Budaya</a></li>
                            <li><a class="dropdown-item" href="index.php?x=kategori&category=sosial-dan-politik">Sosial dan Politik</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'keranjang') ? 'custom-active' : 'link-dark'; ?>" aria-current="page" href="keranjang" aria-current="page" href="#"><i class="bi bi-cart"></i> Keranjang</a>
                    </li>
                </ul>
                <form class="d-flex justify-content-center mt-2" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cari Buku" aria-label="Search" onmouseover="this.style.boxShadow='0 8px 16px rgba(0, 0, 0, 0.5)'" onmouseout="this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.3)'">
                    <button class="text-black btn btn-outline-light" type="submit">Search</button>
                </form>
                <!--Login/Sign Up-->
                <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                    <?php if (isset($_SESSION['email'])) : ?>
                        <div class="dropdown">
                            <a class="text-black text-decoration-none px-3 py-1 bg-light rounded-4 dropdown-toggle" style="background-color: #f5f5dc;" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['email']; ?>
                            </a>
                            <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton ">
                                <li>
                                    <a class="dropdown-item" href="#" style="color: black; text-decoration: none;" onmouseover="this.style.color='black'; this.style.backgroundColor='white';" onmouseout="this.style.color='black'; this.style.backgroundColor='white';" onfocus="this.style.color='black'; this.style.backgroundColor='white';" onmousedown="this.style.color='white'; this.style.backgroundColor='beige';">Profil</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index7/logout" style="color: black; text-decoration: none;" onmouseover="this.style.color='black'; this.style.backgroundColor='white';" onmouseout="this.style.color='black'; this.style.backgroundColor='white';" onfocus="this.style.color='black'; this.style.backgroundColor='white';" onmousedown="this.style.color='white'; this.style.backgroundColor='beige';">Logout</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <a href="index7/login" class="text-black text-decoration-none px-3 py-1 bg-light rounded-4" style="background-color: #f5f5dc;">
                            Login
                        </a>
                    <?php endif; ?>
                </div>
                <style>
                    .dropdown-item:active {
                        background-color:  #f5d1c8 !important;
                        color: black !important;
                    }
                </style>

            </div>
        </div>
    </div>
</nav>