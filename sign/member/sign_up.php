<?php 
require "../../loginSystem/connect.php";
if(isset($_POST["signUp"]) ) {
  
  if(signUp($_POST) > 0) {
    echo "<script>
    alert('Sign Up berhasil!')
    </script>";
  }else {
    echo "<script>
    alert('Sign Up gagal!')
    </script>";
  }
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up || Member</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f3f3f3;
            color: #333;
        }
        .card {
            background-color: #f9f9f9;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            padding: 20px;
        }
        .card img {
            width: 85px;
            margin-top: -60px;
        }
        .form-label {
            color: #4d2a20;
            font-weight: bold;
        }
        .input-group-text {
            background-color: #e9ecef;
            color: #4d2a20;
        }
        .btn-primary {
            background-color: #4d2a20;
            border-color: #4d2a20;
        }
        .btn-primary:hover {
            background-color: #3b1f17;
            border-color: #3b1f17;
        }
        .btn-warning {
            background-color: #8c7853;
            border-color: #8c7853;
        }
        .btn-warning:hover {
            background-color: #735c3f;
            border-color: #735c3f;
        }
        .text-primary {
            color: #4d2a20 !important;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card mx-auto" style="max-width: 400px;">
        <img src="../../assets/memberLogo.png" alt="adminLogo">
        <h1 class="text-center">Sign Up</h1>
        <hr>
        <form action="" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">NISN</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                    <input type="number" class="form-control" name="nisn" id="validationCustom01" required>
                    <div class="invalid-feedback">
                        NISN wajib diisi!
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom02" class="form-label">Kode Member</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="kode_member" id="validationCustom02" required>
                    <div class="invalid-feedback">
                        Kode member wajib diisi!
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom03" class="form-label">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control" name="nama" id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Nama wajib diisi!
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom04" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" id="validationCustom04" required>
                    <div class="invalid-feedback">
                        Password wajib diisi!
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom05" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" name="confirmPw" id="validationCustom05" required>
                    <div class="invalid-feedback">
                        Konfirmasi password wajib diisi!
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom06" class="form-label">Gender</label>
                <select class="form-select" id="validationCustom06" name="jenis_kelamin" required>
                    <option selected disabled>Choose...</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    Pilih salah satu jenis kelamin!
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom07" class="form-label">Kelas</label>
                <select class="form-select" id="validationCustom07" name="kelas" required>
                    <option selected disabled>Choose...</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                    <option value="XIII">XIII</option>
                </select>
                <div class="invalid-feedback">
                    Pilih salah satu kelas!
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom08" class="form-label">Jurusan</label>
                <select class="form-select" id="validationCustom08" name="jurusan" required>
                    <option selected disabled>Choose...</option>
                    <option value="Desain Gambar Mesin">Desain Gambar Mesin</option>
                    <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                    <option value="Teknik Otomotif">Teknik Otomotif</option>
                    <option value="Desain Pemodelan Informasi Bangunan">Desain Pemodelan Informasi Bangunan</option>
                    <option value="Teknik Konstruksi Perumahan">Teknik Konstruksi Perumahan</option>
                    <option value="Teknik Tenaga Listrik">Teknik Tenaga Listrik</option>
                    <option value="Teknik Instalasi Tenaga Listrik">Teknik Instalasi Tenaga Listrik</option>
                    <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                    <option value="Sistem Informatika Jaringan dan Aplikasi">Sistem Informatika Jaringan dan Aplikasi</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                </select>
                <div class="invalid-feedback">
                    Pilih salah satu jurusan!
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom09" class="form-label">No Telepon</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                    <input type="text" class="form-control" name="no_tlp" id="validationCustom09" required>
                    <div class="invalid-feedback">
                        No telepon wajib diisi!
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom10" class="form-label">Tanggal Pendaftaran</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                    <input type="date" class="form-control" name="tgl_pendaftaran" id="validationCustom10" required>
                    <div class="invalid-feedback">
                        Tanggal pendaftaran wajib diisi!
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit" name="signUp">Sign Up</button>
                <input type="reset" class="btn btn-warning text-light" value="Reset">
            </div>
        </form>
        <p class="text-center">Already have an account? <a href="sign_in.php" class="text-decoration-none text-primary">Sign In</a></p>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Form Validation Script -->
<script>
    (() => {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
</body>
</html>

