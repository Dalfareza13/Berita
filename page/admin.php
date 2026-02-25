<?php 
session_start();
include '../koneksi.php'; 

if ($_SESSION['status'] != "login") {
    header("location:../login.php?pesan=belum_login");
    exit();
}

// Logika Menambah Berita
if (isset($_POST['submit_berita'])) {
    $judul  = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi    = mysqli_real_escape_string($koneksi, $_POST['isi']);

    // Konfigurasi Upload Gambar ke folder assets/
    $nama_file = $_FILES['gambar']['name'];
    $tmp_file  = $_FILES['gambar']['tmp_name'];
    
    // Path folder assets (naik satu folder dari folder admin)
    $path = "../assets/" . $nama_file;

    // Proses pindah file
    if (move_uploaded_file($tmp_file, $path)) {
        // Simpan hanya nama filenya ke database
        $query = "INSERT INTO berita (judul, isi, gambar) VALUES ('$judul', '$isi', '$nama_file')";
        
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Berita Berhasil Dipublish!'); window.location='../index.php';</script>";
        } else {
            echo "Error Database: " . mysqli_error($koneksi);
        }
    } else {
        echo "<script>alert('Gagal mengupload gambar ke folder assets!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel - PLN UP3 Jambi</title>
    <link href="https://mdrsh.id/v3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <style>
        :root { --primary: #00a2e9; --dark-blue: #005691; }
        body { background-color: #f4f7f6; font-family: 'Roboto', sans-serif; }
        .sidebar { background: var(--dark-blue); min-height: 100vh; color: white; padding-top: 20px; }
        .sidebar a { color: #bdc3c7; text-decoration: none; padding: 15px 20px; display: block; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar a:hover { background: var(--primary); color: white; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <div class="text-center mb-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Logo_PLN.svg" height="50">
                <p class="mt-2 fw-bold">ADMIN PLN</p>
            </div>
            <a href="../index.php"><i class="fas fa-home me-2"></i> Lihat Web</a>
            <a href="admin.php" class="bg-primary text-white"><i class="fas fa-edit me-2"></i> Tambah Berita</a>
            <a href="../login.php" class="text-warning"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a>
        </div>

        <div class="col-md-10 p-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="fw-bold text-primary mb-4">Input Berita Terbaru</h4>
                    
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Berita</label>
                            <input type="text" name="judul" class="form-control" placeholder="Contoh: Pemeliharaan Jaringan..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Pilih Gambar</label>
                            <input type="file" name="gambar" class="form-control" accept="image/*" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Isi Berita</label>
                            <textarea name="isi" class="form-control" rows="6" required></textarea>
                        </div>

                        <button type="submit" name="submit_berita" class="btn btn-primary px-5 fw-bold">PUBLISH</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>