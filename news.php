<?php 
include 'koneksi.php';

// Menangkap ID berita dari URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id='$id'");
    $d = mysqli_fetch_array($query);

    // Jika data tidak ditemukan, balikkan ke index
    if (!$d) {
        header("location:index.php");
        exit;
    }
} else {
    header("location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $d['judul']; ?> - PLN UP3 JAMBI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400..900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://mdrsh.id/v3/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root { 
            --primary: #00a2e9; 
            --secondary: #ffc107; 
            --dark-blue: #005691; 
            --orange-pln: #ff6600; 
        }
        
        body { font-family: 'Roboto', sans-serif; background-color: #f4f7f9; margin: 0; padding: 0; }
        
        /* Gaya Navbar & Topbar (Sesuai Index) */
        .topbar { background: #f8f9fa; font-size: 14px; }
        .navbar-light .navbar-nav .nav-link { color: #333; font-weight: 500; }
        .navbar-light .navbar-nav .nav-link:hover { color: var(--primary) !important; }
        .btn-login-orange { 
            background-color: var(--orange-pln); color: white; width: 42px; height: 42px; 
            display: flex; align-items: center; justify-content: center; border-radius: 5px; text-decoration: none; 
        }
        marquee { background: var(--secondary); padding: 8px 0; font-weight: bold; color: #000; display: block; }

        /* Gaya Konten Berita */
        .news-container { background: white; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); padding: 40px; margin-top: 30px; }
        .full-img { width: 100%; max-height: 500px; object-fit: cover; border-radius: 10px; margin-bottom: 25px; }
        .content-text { line-height: 1.8; font-size: 1.1rem; color: #333; white-space: pre-line; }
        .btn-back { margin-bottom: 20px; display: inline-block; color: var(--primary); text-decoration: none; font-weight: bold; }
        .btn-back:hover { text-decoration: underline; }
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
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Profil</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Layanan</a></li>
                    <li class="nav-item ms-lg-3">
                        <a href="#" class="btn btn-primary px-4 rounded-pill text-white shadow-sm">PLN Mobile</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="login.php" class="btn-login-orange"><i class="fas fa-key"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <marquee>Pemberitahuan: PLN UP3 Jambi berkomitmen menjaga keandalan pasokan listrik — Gunakan aplikasi PLN Mobile untuk kemudahan layanan Anda!</marquee>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <a href="index.php" class="btn-back"><i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda</a>
                
                <div class="news-container mb-5">
                    <h1 class="fw-bold text-dark mb-2"><?php echo $d['judul']; ?></h1>
                    <p class="text-muted small mb-4">
                        <i class="far fa-calendar-alt me-1"></i> <?php echo date('d F Y', strtotime($d['tanggal'])); ?> | 
                        <i class="far fa-user me-1"></i> Admin Humas
                    </p>

                    <img src="assets/<?php echo $d['gambar']; ?>" class="full-img shadow-sm" alt="Gambar Berita">

                    <div class="content-text">
                        <?php echo nl2br($d['isi']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4">
        <p class="m-0 small">&copy; 2026 PLN UP3 JAMBI. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>