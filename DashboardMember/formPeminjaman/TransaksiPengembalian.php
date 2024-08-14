<?php 
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}
require "../../config/config.php";
$akunMember = $_SESSION["member"]["nisn"];
$dataPengembalian = queryReadData("SELECT pengembalian.id_pengembalian, pengembalian.id_buku, buku.judul, buku.kategori, pengembalian.nisn, member.nama, admin.nama_admin, pengembalian.buku_kembali, pengembalian.keterlambatan, pengembalian.denda
FROM pengembalian
INNER JOIN buku ON pengembalian.id_buku = buku.id_buku
INNER JOIN member ON pengembalian.nisn = member.nisn
INNER JOIN admin ON pengembalian.id_admin = admin.id
WHERE pengembalian.nisn = $akunMember");

if(isset($_POST["search"]) ) {
  $dataPengembalian = search($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Transaksi Pengembalian Buku || Member</title>
    <style>
      body {
        background-color: #3E2723;
        color: #FFFFFF;
        font-family: 'Poppins', sans-serif;
      }
      .navbar {
        background-color: #4E342E !important;
      }
      .btn-tertiary {
        background-color: #795548;
        border-color: #795548;
        color: #FFFFFF;
      }
      .btn-tertiary:hover {
        background-color: #5D4037;
        border-color: #5D4037;
        color: #FFFFFF;
      }
      .table th {
        background-color: #4E342E;
        color: #FFFFFF;
      }
      .table td {
        background-color: #5D4037;
        color: #FFFFFF;
      }
      .alert-primary {
        background-color: #6D4C41;
        color: #FFFFFF;
        border-color: #5D4037;
      }
      .bg-subtle {
        background-color: #3E2723 !important;
        color: #FFFFFF;
      }
    </style>
  </head>
  <body>
    <nav class="navbar fixed-top shadow-sm">
      <div class="container-fluid p-3">
        <a class="navbar-brand" href="#">
        </a>
        <a class="btn btn-tertiary" href="../dashboardMember.php">Dashboard</a>
      </div>
    </nav>
    
    <div class="p-4 mt-5">
      <div class="mt-5 alert alert-primary" role="alert">Riwayat transaksi Pengembalian Buku Anda - <span class="fw-bold text-capitalize"><?php echo htmlentities($_SESSION["member"]["nama"]); ?></span></div>
    
      <div class="table-responsive mt-3">
        <table class="table table-striped table-hover">
          <thead class="text-center">
            <tr>
              <th>Id Pengembalian</th>
              <th>Id Buku</th>
              <th>Judul Buku</th>
              <th>Kategori</th>
              <th>Nisn</th>
              <th>Nama</th>
              <th>Nama Admin</th>
              <th>Tanggal Pengembalian</th>
              <th>Keterlambatan</th>
              <th>Denda</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($dataPengembalian as $item) : ?>
              <tr>
                <td><?= $item["id_pengembalian"]; ?></td>
                <td><?= $item["id_buku"]; ?></td>
                <td><?= $item["judul"]; ?></td>
                <td><?= $item["kategori"]; ?></td>
                <td><?= $item["nisn"]; ?></td>
                <td><?= $item["nama"]; ?></td>
                <td><?= $item["nama_admin"]; ?></td>
                <td><?= $item["buku_kembali"]; ?></td>
                <td><?= $item["keterlambatan"]; ?></td>
                <td><?= $item["denda"]; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <footer class="fixed-bottom shadow-lg bg-subtle p-3">
      <div class="container-fluid d-flex justify-content-between">
        <p class="mt-2">Karya <span class="text-primary">P5 Kelompok 1</span> © 2023</p>
      </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
