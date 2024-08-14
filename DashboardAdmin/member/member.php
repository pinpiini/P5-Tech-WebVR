<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}

// Include file konfigurasi atau file dengan fungsi-fungsi database
require "../../config/config.php";

// Mengambil data member dari database
$member = queryReadData("SELECT * FROM member");

// Fungsi untuk melakukan pencarian member
if(isset($_POST["search"]) ) {
  $member = searchMember($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member terdaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #2C241C;
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #352E28;
        }

        .navbar-brand img {
            width: 120px;
        }

        .bg-tertiary {
            background-color: #352E28;
        }

        .bg-subtle {
            background-color: #352E28;
        }

        .btn-tertiary {
            background-color: #352E28;
            color: #fff;
            border: 1px solid #fff;
        }

        .btn-tertiary:hover {
            background-color: #6C5B4B;
            border-color: #6C5B4B;
        }

        .table th {
            background-color: #6C5B4B;
        }

        .footer {
            background-color: #352E28;
            color: #fff;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar fixed-top shadow-sm">
        <div class="container-fluid p-3">
            <a class="btn btn-tertiary" href="../dashboardAdmin.php">Dashboard</a>
        </div>
    </nav>

    <!-- Konten -->
    <div class="p-4 mt-5">
        <!-- Form pencarian -->
        <form action="" method="post" class="mt-5">
            <div class="input-group d-flex justify-content-end mb-3">
                <input class="border p-2 rounded rounded-end-0 bg-tertiary text-light" type="text" name="keyword"
                    id="keyword" placeholder="Cari data member...">
                <button class="border border-start-0 bg-light rounded rounded-start-0" type="submit" name="search"><i
                        class="fas fa-search text-dark"></i></button>
            </div>
        </form>

        <!-- Tabel data member -->
        <caption class="text-light">List of Member</caption>
        <div class="table-responsive mt-3">
            <table class="table table-striped table-hover text-light">
                <thead class="text-center">
                    <tr>
                        <th>Nisn</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>No Telepon</th>
                        <th>Pendaftaran</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php foreach ($member as $item) : ?>
                <tr>
                    <td><?= $item["nisn"]; ?></td>
                    <td><?= $item["kode_member"]; ?></td>
                    <td><?= $item["nama"]; ?></td>
                    <td><?= $item["jenis_kelamin"]; ?></td>
                    <td><?= $item["kelas"]; ?></td>
                    <td><?= $item["jurusan"]; ?></td>
                    <td><?= $item["no_tlp"]; ?></td>
                    <td><?= $item["tgl_pendaftaran"]; ?></td>
                    <td>
                        <div class="action">
                            <a href="deleteMember.php?id=<?= $item["nisn"]; ?>" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus data member ?');"><i
                                    class="fas fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="fixed-bottom shadow-lg bg-subtle p-3">
        <div class="container-fluid d-flex justify-content-between">
            <p class="mt-2">Created by <span class="text-primary">Kelompok 1 P5</span> © 202$</p>
            <p class="mt-2">versi 1.0</p>
        </div>
    </footer>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNe">
      </body>

</html>
