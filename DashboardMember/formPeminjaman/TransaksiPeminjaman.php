<?php 
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}
require "../../config/config.php";
$akunMember = $_SESSION["member"]["nisn"];
$dataPinjam = queryReadData("SELECT peminjaman.id_peminjaman, peminjaman.id_buku, buku.judul, peminjaman.nisn, member.nama, admin.nama_admin, peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian
FROM peminjaman
INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
INNER JOIN member ON peminjaman.nisn = member.nisn
INNER JOIN admin ON peminjaman.id_admin = admin.id
WHERE peminjaman.nisn = $akunMember");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaksi Peminjaman Buku || Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous">
    <style>
        body {
            background-color: #2C241C;
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #4D3D2E;
        }

        .navbar-brand img {
            width: 120px;
        }

        .btn-modern {
            background-color: #6C5B4B;
            color: #fff;
            border: none;
            transition: all 0.3s ease-in-out;
        }

        .btn-modern:hover {
            background-color: #4D3D2E;
            transform: translateY(-3px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table {
            background-color: #352E28;
            color: #fff;
        }

        .table th,
        .table td {
            border: none;
            vertical-align: middle;
        }

        .table th {
            background-color: #6C5B4B;
            text-align: center;
        }

        .table tbody tr:hover {
            background-color: #4D3D2E;
        }

        .footer {
            background-color: #352E28;
            color: #fff;
        }
    </style>
</head>

<body>

    <nav class="navbar fixed-top">
        <div class="container-fluid p-3">
            <a class="navbar-brand" href="#">
                
            </a>
            <a class="btn btn-modern" href="../dashboardMember.php">Dashboard</a>
        </div>
    </nav>

    <div class="p-4 mt-5">
        <div class="mt-5 alert alert-primary" role="alert">Riwayat transaksi Peminjaman Buku Anda - <span
                class="fw-bold text-capitalize"><?php echo htmlentities($_SESSION["member"]["nama"]); ?></span></div>

        <div class="table-responsive mt-3">
            <table class="table table-striped table-hover">
                <thead class="text-center">
                    <tr>
                        <th>Id Peminjaman</th>
                        <th>Id Buku</th>
                        <th>Judul Buku</th>
                        <th>Nisn</th>
                        <th>Nama</th>
                        <th>Nama Admin</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataPinjam as $item) : ?>
                    <tr class="text-center">
                        <td><?= $item["id_peminjaman"]; ?></td>
                        <td><?= $item["id_buku"]; ?></td>
                        <td><?= $item["judul"]; ?></td>
                        <td><?= $item["nisn"]; ?></td>
                        <td><?= $item["nama"]; ?></td>
                        <td><?= $item["nama_admin"]; ?></td>
                        <td><?= $item["tgl_peminjaman"]; ?></td>
                        <td><?= $item["tgl_pengembalian"]; ?></td>
                        <td>
                            <a class="btn btn-success btn-modern"
                                href="pengembalianBuku.php?id=<?= $item["id_peminjaman"]; ?>">Kembalikan</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="fixed-bottom shadow-lg bg-subtle p-3">
        <div class="container-fluid d-flex justify-content-between">
            <p class="mt-2">Created by <span class="text-primary">Mangandaralam Sakti</span> © 2023</p>
            <p class="mt-2">versi 1.0</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
