<?php 
session_start();
include 'koneksi.php'; 

if (isset($_POST['submit_login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Mencari di tabel users sesuai database pln_news Anda
    $login = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        
        // --- PERUBAHAN DI SINI ---
        header("location:page/admin.php"); 
        // -------------------------
        exit();
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Petugas - PLN UP3 JAMBI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://mdrsh.id/v3/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root { --primary: #00a2e9; --dark-blue: #005691; --orange-pln: #ff6600; }
        body {
            background: linear-gradient(135deg, var(--dark-blue) 0%, var(--primary) 100%);
            height: 100vh; display: flex; align-items: center; justify-content: center; font-family: 'Roboto', sans-serif;
        }
        .login-card {
            background: #ffffff; padding: 40px; border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2); width: 100%; max-width: 400px;
        }
        .btn-login {
            background-color: var(--orange-pln); color: white; border: none;
            font-weight: bold; width: 100%; padding: 12px; transition: 0.3s;
        }
        .btn-login:hover { background-color: #e65c00; color: white; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-logo text-center mb-4">
        <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Logo_PLN.svg" height="60" alt="Logo PLN">
        <h4 class="mt-3 fw-bold text-dark">Portal Login Petugas</h4>
        <p class="text-muted small">PLN UP3 JAMBI</p>
    </div>

    <?php if(isset($error)) : ?>
        <div class="alert alert-danger text-center small">Username atau Password Salah!</div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label fw-bold">Username</label>
            <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                <input type="text" name="username" class="form-control" placeholder="admin" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Password</label>
            <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-lock text-primary"></i></span>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
        </div>

        <button type="submit" name="submit_login" class="btn btn-login rounded-pill shadow">MASUK SEKARANG</button>
    </form>

    <div class="text-center mt-4">
        <a href="index.php" class="text-decoration-none small text-muted"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
    </div>
</div>

</body>
</html>