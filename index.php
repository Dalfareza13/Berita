<?php 
// Menghubungkan ke database
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PLN UP3 JAMBI - Berita PLN Edition</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400..900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://mdrsh.id/v3/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root { 
            --primary: #00a2e9; 
            --secondary: #ffc107; 
            --dark-blue: #005691; 
            --orange-pln: #ff6600; 
        }
        
        body { font-family: 'Roboto', sans-serif; margin: 0; padding: 0; overflow-x: hidden; }
        
        .topbar { background: #f8f9fa; font-size: 14px; }
        .navbar-light .navbar-nav .nav-link { color: #333; font-weight: 500; }
        .navbar-light .navbar-nav .nav-link:hover, .active { color: var(--primary) !important; }

        .btn-login-orange { 
            background-color: var(--orange-pln); 
            color: white; 
            border: none; 
            width: 42px; 
            height: 42px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            border-radius: 5px; 
            transition: 0.3s;
            text-decoration: none;
        }
        .btn-login-orange:hover { background-color: #e65c00; color: white; transform: scale(1.05); }

        .carousel-item img { 
            width: 100vw; 
            height: 70vh; 
            object-fit: cover; 
            object-position: center; 
            filter: brightness(0.7); 
        }

        .carousel-caption { bottom: 30%; text-align: center; }
        marquee { background: var(--secondary); padding: 8px 0; font-weight: bold; color: #000; }

        .section-title { font-family: 'Playfair Display', serif; color: var(--dark-blue); font-weight: 900; margin-bottom: 40px; }
        .news-card { border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 10px; transition: 0.3s; height: 100%; overflow: hidden; }
        .news-card:hover { transform: translateY(-5px); }
        .news-card img { height: 220px; width: 100%; object-fit: cover; }
        .news-date { font-size: 0.85rem; color: #f39c12; }
        .btn-selengkapnya { 
            background-color: var(--orange-pln); 
            color: white; 
            border: none; 
            padding: 8px 20px; 
            border-radius: 5px; 
            font-weight: bold; 
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-selengkapnya:hover { background-color: #e65c00; color: white; }

        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 5px solid white;
        }

        @media (max-width: 768px) {
            .carousel-item img { height: 50vh; }
            .carousel-caption h1 { font-size: 2rem; }
            .btn-login-orange { width: 100%; margin-top: 10px; }
        }
    </style>
</head>

<body>
    <div class="container-fluid topbar d-none d-xl-block w-100 py-2 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <i class="fas fa-phone-alt text-primary me-2"></i> Contact Center: 123 
                    <i class="fas fa-envelope text-primary ms-3 me-2"></i> info@plnjambi.id
                </div>
                <div class="col-lg-6 text-end">
                    <i class="fas fa-clock text-primary me-2"></i> 
                    <?php 
                        date_default_timezone_set('Asia/Jakarta');
                        echo date('l, d F Y, H:i') . " WIB"; 
                    ?>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a href="index.php" class="navbar-brand d-flex align-items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Logo_PLN.svg" height="45" class="me-2">
                <h1 class="h4 m-0 text-primary fw-bold">PLN UP3 JAMBI</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Profil</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Layanan</a></li>
                    <li class="nav-item ms-lg-3">
                        <a href="https://play.google.com/store/apps/details?id=com.icon.pln123&hl=id" target="_blank" class="btn btn-primary px-4 rounded-pill text-white shadow-sm">PLN Mobile</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="login.php" class="btn-login-orange" title="Login Petugas">
                            <i class="fas fa-key"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <marquee>Pemberitahuan: PLN UP3 Jambi berkomitmen menjaga keandalan pasokan listrik — Gunakan aplikasi PLN Mobile untuk kemudahan layanan Anda!</marquee>

    <div id="plnSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/pln_up3_jambi.jpg" class="d-block w-100" alt="Kantor PLN Jambi">
                <div class="carousel-caption">
                    <h1 class="display-3 fw-bold text-white animate__animated animate__fadeInDown">Berita PLN UP3 JAMBI</h1>
                    <p class="fs-5 animate__animated animate__fadeInUp">Energi Optimisme untuk Jambi yang Lebih Terang.</p>
                    <a href="#berita" class="btn btn-primary py-3 px-5 mt-3 text-white border-0 shadow">Lihat Berita</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5" id="berita">
        <div class="text-center">
            <h2 class="section-title display-4">Berita Terbaru</h2>
        </div>
        <div class="row g-4 mt-2">
            <?php 
            $query_berita = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id DESC");
            if(mysqli_num_rows($query_berita) > 0) {
                while($d = mysqli_fetch_array($query_berita)) {
            ?>
                <div class="col-md-4">
                    <div class="card news-card">
                        <img src="assets/<?php echo $d['gambar']; ?>" class="card-img-top" alt="<?php echo $d['judul']; ?>">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="news-date"><i class="far fa-calendar-alt"></i> <?php echo date('d M Y', strtotime($d['tanggal'])); ?></span>
                                <span class="text-muted small"><i class="far fa-user"></i> Humas</span>
                            </div>
                            <h5 class="card-title fw-bold text-dark lh-base"><?php echo $d['judul']; ?></h5>
                            <p class="card-text text-muted small">
                                <?php echo substr($d['isi'], 0, 100); ?>...
                            </p>
                            <a href="news.php?id=<?php echo $d['id']; ?>" class="btn-selengkapnya">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php 
                } 
            } else {
                echo "<div class='col-12 text-center'><p class='text-muted'>Belum ada berita yang dipublish.</p></div>";
            }
            ?>
        </div>
    </div>

    <div class="container py-5">
        <div class="text-center">
            <h2 class="section-title display-4">Lokasi PLN UP3 Jambi</h2>
            <p class="text-muted mb-4">Jl. Jenderal Urip Sumoharjo No.02, Sungai Putri, Kec. Danau Tlk., Kota Jambi</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="map-container">
                    <iframe 
                        width="100%" 
                        height="500" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.826830500755!2d103.59032027415413!3d-1.607548136248982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2589f5a7626deb%3A0x38b891b00cae7790!2sKantor%20PLN%20UP3%20Jambi!5e0!3m2!1sid!2sid!4v1708850000000!5m2!1sid!2sid">
                    </iframe>
                </div>
                <div class="text-center mt-4">
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Kantor+PLN+UP3+Jambi&destination_place_id=ChIJ621ipvWIJS4RkHeuDLCRuDg" 
                       target="_blank" 
                       class="btn btn-primary btn-lg rounded-pill shadow px-5">
                        <i class="fas fa-directions me-2"></i>Mulai Rute / Lihat Peta Lebih Besar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">© 2026 PLN UP3 JAMBI - Mengalirkan Energi Menembus Batas</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>