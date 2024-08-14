<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../sign/admin/sign_in.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous">
  <style>
    body {
      background-color: #2C241C;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .navbar {
      background-color: #352E28;
    }

    .navbar-brand img {
      width: 120px;
    }

    .dropdown-menu {
      margin-left: -7rem;
    }

    .dropdown-menu .dropdown-item {
      background-color: #352E28;
      color: #fff;
    }

    .dropdown-menu .dropdown-item:hover {
      background-color: #6C5B4B;
    }

    .cardImg {
      max-width: 600px;
    }

    .footer {
      background-color: #352E28;
      color: #fff;
      margin-top: auto; /* Ini untuk menjaga footer di bagian bawah */
    }

    .btn-modern {
      transition: all 0.3s ease-in-out;
    }

    .btn-modern:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>

  <nav class="navbar fixed-top shadow-sm">
    <div class="container-fluid p-3">
      <a class="navbar-brand" href="#"></a>
  

      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="../assets/adminLogo.png" alt="adminLogo" width="40px">
        </button>
        <ul class="dropdown-menu position-absolute mt-2 p-2">
          <li>
            <a class="dropdown-item text-center" href="#">
              <img src="../assets/adminLogo.png" alt="adminLogo" width="30px">
            </a>
          </li>
          <li>
            <a class="dropdown-item text-center text-secondary" href="#">
              <span class="text-capitalize"><?php echo $_SESSION['admin']['nama_admin']; ?></span>
            </a>
          </li>
          <hr>
          <li>
            <a class="dropdown-item text-center mb-2" href="#">
              Akun Terverifikasi <span class="text-primary"><i class="fas fa-circle-check"></i></span>
            </a>
          </li>
          <li>
            <a class="dropdown-item text-center p-2 bg-danger text-light rounded" href="signOut.php">
              Sign Out <i class="fas fa-right-to-bracket"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5 p-4">
    <?php
    // Mendapatkan tanggal dan waktu saat ini
    $date = date('Y-m-d H:i:s'); // Format tanggal dan waktu default (tahun-bulan-tanggal jam:menit:detik)
    // Mendapatkan hari dalam format teks (e.g., Senin, Selasa, ...)
    $day = date('l');
    // Mendapatkan tanggal dalam format 1 hingga 31
    $dayOfMonth = date('d');
    // Mendapatkan bulan dalam format teks (e.g., Januari, Februari, ...)
    $month = date('F');
    // Mendapatkan tahun dalam format 4 digit (e.g., 2023)
    $year = date('Y');
    ?>

    <h1 class="mt-5 fw-bold">Dashboard - <span class="fs-4 text-secondary"><?php echo $day. " ". $dayOfMonth." ". " ". $month. " ". $year; ?></span></h1>

    <div class="alert alert-success" role="alert">
      Selamat datang admin - <span class="fw-bold text-capitalize"></span> di
      Dashboard Pengelolaan Perpustakaan
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-3">

    <div class="card bg-transparent border-light" style="width: 18rem;">
    <div class="card-body text-light">
    <h5 class="card-title">Member</h5>
    <p class="card-text">Mengelola data anggota perpustakaan.</p>
    <a href="member/member.php" class="btn btn-outline-light">Buka</a>
      </div>
    </div>
      <div class="card bg-transparent border-light" style="width: 18rem;">
      <div class="card-body text-light">
        <h5 class="card-title">Buku</h5>
        <p class="card-text">Melihat dan mengelola daftar buku.</p>
        <a href="buku/daftarBuku.php" class="btn btn-outline-light">Buka</a>
      </div>
    </div>
    <div class="card bg-transparent border-light" style="width: 18rem;">
      <div class="card-body text-light">
        <h5 class="card-title">Peminjaman</h5>
        <p class="card-text">Melihat dan mengelola peminjaman buku.</p>
        <a href="peminjaman/peminjamanBuku.php" class="btn btn-outline-light">Buka</a>
      </div>
    </div>
    <div class="card bg-transparent border-light" style="width: 18rem;">
      <div class="card-body text-light">
        <h5 class="card-title">Pengembalian</h5>
        <p class="card-text">Melihat dan mengelola pengembalian buku.</p>
        <a href="pengembalian/pengembalianBuku.php" class="btn btn-outline-light">Buka</a>
      </div>
    </div>
    <div class="card bg-transparent border-light" style="width: 18rem;">
      <div class="card-body text-light">
        <h5 class="card-title">Denda</h5>
        <p class="card-text">Melihat dan mengelola denda yang diterapkan.</p>
        <a href="denda/daftarDenda.php" class="btn btn-outline-light">Buka</a>
      </div>
    </div>

    </div>
  </div>
  <footer class="footer shadow-lg p-3">
    <div class="container-fluid d-flex justify-content-between">
      <p class="mt-2">Karya <span class="text-primary">Kelompok 1 P5</span> </p>
    </div>
  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
</html>









