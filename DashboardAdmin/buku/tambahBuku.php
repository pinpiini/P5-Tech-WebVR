<?php 
require "../../config/config.php";
//$informatika = "informatika";
$kategori = queryReadData("SELECT * FROM kategori_buku");
if(isset($_POST["tambah"]) ) {
  
  if(tambahBuku($_POST) > 0) {
    echo "<script>
    alert('Data buku berhasil ditambahkan');
    </script>";
  }else {
    echo "<script>
    alert('Data buku gagal ditambahkan!');
    </script>";
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah buku || Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <style>
        .navbar {
            background-color: #352E28; /* Ubah warna background navbar */
        }

        .navbar-brand img {
            width: 120px;
        }

        .navbar-toggler {
            border-color: #fff; /* Ubah warna ikon navbar toggle */
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e"); /* Ubah warna ikon navbar toggle */
        }

        body {
            background-color: #2C241C;
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .bg-body-tertiary {
            background-color: #352E28; /* Ubah warna background body */
        }

        .bg-subtle {
            background-color: #352E28; /* Ubah warna background footer */
        }

        .btn-success {
            background-color: #5a9367; /* Ubah warna background tombol Tambah */
            border-color: #5a9367; /* Ubah warna border tombol Tambah */
        }

        .btn-success:hover {
            background-color: #4d7e5b; /* Ubah warna background tombol Tambah saat dihover */
            border-color: #4d7e5b; /* Ubah warna border tombol Tambah saat dihover */
        }

        .btn-warning {
            background-color: #E27D60; /* Ubah warna background tombol Reset */
            border-color: #E27D60; /* Ubah warna border tombol Reset */
        }

        .btn-warning:hover {
            background-color: #c97153; /* Ubah warna background tombol Reset saat dihover */
            border-color: #c97153; /* Ubah warna border tombol Reset saat dihover */
        }
    </style>
</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../dashboardAdmin.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="daftarBuku.php">Browse</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container p-3 mt-5">
    <div class="card p-2 mt-5">
        <h1 class="text-center fw-bold p-3">Form Tambah buku</h1>
        <form action="" method="post" enctype="multipart/form-data" class="mt-3 p-2">
            <div class="custom-css-form">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Cover Buku</label>
                    <input class="form-control" type="file" name="cover" id="formFileMultiple" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Id Buku</label>
                    <input type="text" class="form-control" name="id_buku" id="exampleFormControlInput1"
                           placeholder="example inf01" required>
                </div>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
                <select class="form-select" id="inputGroupSelect01" name="kategori">
                    <option selected>Choose</option>
                    <?php foreach ($kategori as $item) : ?>
                        <option><?= $item["kategori"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>

            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" required>
            </div>

            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" required>
            </div>

            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_halaman" class="form-label">Jumlah Halaman</label>
                <input type="number" class="form-control" id="jumlah_halaman" name="jumlah_halaman" required>
            </div>

            <div class="mb-3">
                <label for="buku_deskripsi" class="form-label">Sinopsis</label>
                <textarea class="form-control" id="buku_deskripsi" name="buku_deskripsi" rows="3" required></textarea>
            </div>

            <!-- Tambahkan form input lainnya sesuai kebutuhan -->

            <button type="submit" class="btn btn-success" name="tambah">Tambah</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </div>
</div>

<footer class="mt-5 shadow-lg bg-subtle p-3">
    <div class="container-fluid d-flex justify-content-between">
        <p class="mt-2">P5 <span class="text-primary">Kelompok 1</span> </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
