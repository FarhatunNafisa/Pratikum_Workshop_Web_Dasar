<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookMart:Toko Buku Online Modern</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="vh-100 overflow-hidden">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-lg">
            <!--Logo Bookmark-->
            <a class="navbar-brand" href="#"><i class="bi bi-book-fill"></i><span style="margin-left: 10px;"></span>
                BookMart</a>
            <!--Toggle Btn-->
            <button class="navbar-toggler shadow-none border-0 " type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--SideBar-->
            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <!--Sidebar Header-->
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">BookMark</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <!--Sidebar Body-->
                <div class="offcanvas-body flex-lg-row pt-lg-0">
                    <ul class="navbar-nav ms-auto justify-content-center fs-5 flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Promo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Rekomendasi Buku</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Kategori
                            </a>
                            <ul class="dropdown-menu dropdown-menu-columns mt-2 ">
                                <li><a class="dropdown-item" href="#">Agama Islam</a></li>
                                <li><a class="dropdown-item" href="#">Arsitektur</a></li>
                                <li><a class="dropdown-item" href="#">Bahasa dan Sastra</a></li>
                                <li><a class="dropdown-item" href="#">Biologi</a></li>
                                <li><a class="dropdown-item" href="#">Bisnis</a></li>
                                <li><a class="dropdown-item" href="#">Ekonomi</a></li>
                                <li><a class="dropdown-item" href="#">Farmasi</a></li>
                                <li><a class="dropdown-item" href="#">Filsafat</a></li>
                                <li><a class="dropdown-item" href="#">Geografi</a></li>
                                <li><a class="dropdown-item" href="#">Hukum</a></li>
                                <li><a class="dropdown-item" href="#">Ilmu Komputer</a></li>
                                <li><a class="dropdown-item" href="#">Ilmu Terapan</a></li>
                                <li><a class="dropdown-item" href="#">Kebidanan</a></li>
                                <li><a class="dropdown-item" href="#">Kedokteran</a></li>
                                <li><a class="dropdown-item" href="#">Kehutanan</a></li>
                                <li><a class="dropdown-item" href="#">Keperawatan</a></li>
                                <li><a class="dropdown-item" href="#">Kesehatan</a></li>
                                <li><a class="dropdown-item" href="#">Kimia</a></li>
                                <li><a class="dropdown-item" href="#">Komunikasi</a></li>
                                <li><a class="dropdown-item" href="#">Manajemen</a></li>
                                <li><a class="dropdown-item" href="#">Matematika</a></li>
                                <li><a class="dropdown-item" href="#">Motivasi</a></li>
                                <li><a class="dropdown-item" href="#">Novel</a></li>
                                <li><a class="dropdown-item" href="#">Pendidikan</a></li>
                                <li><a class="dropdown-item" href="#">Pertanian</a></li>
                                <li><a class="dropdown-item" href="#">Psikologi</a></li>
                                <li><a class="dropdown-item" href="#">Resep</a></li>
                                <li><a class="dropdown-item" href="#">Sains dan Teknologi</a></li>
                                <li><a class="dropdown-item" href="#">Sosial Budaya</a></li>
                                <li><a class="dropdown-item" href="#">Sosial dan Politik</a></li>

                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex justify-content-center mt-2" role="search">
                        <input class="form-control me-2" type="search" placeholder="Cari Buku" aria-label="Search">
                        <button class="text-black btn btn-outline-light" type="submit">Search</button>
                    </form>
                    <!--Login/Sign Up-->
                    <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                        <a href="#login" class="text-black">Login</a>
                        <a href="#signup" class="text-black text-decoration-none px-3 py-1 bg-light rounded-4"
                            style="background-color: #f5f5dc;">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--Akhir Navbar-->

    <!--Content-->
    <div class="container-lg mt-5 pt-4"> 
            <div class="col-lg-2 bg-tertiary">
                <!--  content  -->
            </div>
            <div class="col-lg-8 mx-auto">
                <!-- content -->
                <div id="carouselExampleIndicators" class="carousel slide"  data-bs-ride="carousel" data-bs-interval="5000">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="coming.png" class="d-block w-100" alt="coming">
                        </div>
                        <div class="carousel-item">
                            <img src="promo.png" class="d-block w-100" alt="promo">
                        </div>
                        <div class="carousel-item">
                            <img src="book.png" class="d-block w-100" alt="new">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-2 bg-tertiary">
                <!-- content -->
            </div>
        </div>
    </div>
    <!--End Content-->
    <div class="fixed-bottom text-center mb-2">
        BookMart:Toko Buku Online Modern
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>