<?php 
require "../../config/config.php"; 
$dataDenda = queryReadData("SELECT pengembalian.id_pengembalian, pengembalian.id_buku, buku.judul, pengembalian.nisn, member.nama, member.jurusan, admin.nama_admin, pengembalian.buku_kembali, pengembalian.keterlambatan, pengembalian.denda
FROM pengembalian
INNER JOIN buku ON pengembalian.id_buku = buku.id_buku
INNER JOIN member ON pengembalian.nisn = member.nisn
INNER JOIN admin ON pengembalian.id_admin = admin.id
WHERE pengembalian.denda > 0");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Kelola denda buku || admin</title>
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
    <div class="container-fluid p-3">
            <a class="btn btn-tertiary" href="../dashboardAdmin.php">Dashboard</a>
        </div>
    </nav>
    
    <div class="p-4 mt-5">
      <div class="mt-5">
        <caption>List of denda</caption>
          <div class="table-responsive mt-3">
    <table class="table table-striped table-hover">
      <thead class="text-center">
      <tr>
        <th class="bg-primary text-light">id buku</th>
        <th class="bg-primary text-light">Judul buku</th>
        <th class="bg-primary text-light">Nisn</th>
        <th class="bg-primary text-light">Nama siswa</th>
        <th class="bg-primary text-light">Jurusan</th>
        <th class="bg-primary text-light">Nama admin</th>
        <th class="bg-primary text-light">Hari pengembalian</th>
        <th class="bg-primary text-light">Keterlambatan</th>
        <th class="bg-primary text-light">Denda</th>
      </tr>
      </thead>
        <?php foreach ($dataDenda as $item) : ?>
      <tr>
        <td><?= $item["id_buku"]; ?></td>
        <td><?= $item["judul"]; ?></td>
        <td><?= $item["nisn"]; ?></td>
        <td><?= $item["nama"]; ?></td>
        <td><?= $item["jurusan"]; ?></td>
        <td><?= $item["nama_admin"]; ?></td>
        <td><?= $item["buku_kembali"]; ?></td>
        <td><?= $item["keterlambatan"]; ?></td>
        <td><?= $item["denda"]; ?></td>
      </tr>
        <?php endforeach; ?>
    </table>
    </div>
   </div>
  </div>
     
    <footer class="fixed-bottom shadow-lg bg-subtle p-3">
        <div class="container-fluid d-flex justify-content-between">
            <p class="mt-2">Created by <span class="text-primary">Kelompok 1 P5</span> © 2024</p>
        </div>
    </footer>
  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>