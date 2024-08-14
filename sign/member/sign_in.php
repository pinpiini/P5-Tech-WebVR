<?php 
session_start();

//Jika member sudah login, tidak boleh kembali ke halaman login ,kecuali logout
if(isset($_SESSION["signIn"]) ) {
  header("Location: ../../DashboardMember/dashboardMember.php");
  exit;
}

require "../../loginSystem/connect.php";

if(isset($_POST["signIn"]) ) {
  
  $nama = strtolower($_POST["nama"]);
  $nisn = $_POST["nisn"];
  $password = $_POST["password"];
  
  
  $result = mysqli_query($connect, "SELECT * FROM member WHERE nama = '$nama' AND nisn = $nisn");
  
  if(mysqli_num_rows($result) === 1) {
    //cek pw 
    $pw = mysqli_fetch_assoc($result);
    if(password_verify($password, $pw["password"]) ) {
      // SET SESSION 
      $_SESSION["signIn"] = true;
      $_SESSION["member"]["nama"] = $nama;
      $_SESSION["member"]["nisn"] = $nisn;
      header("Location: ../../DashboardMember/dashboardMember.php");
      exit;
    }
  }
  $error = true;
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In || Member</title>
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
        .btn-success {
            background-color: #8c7853;
            border-color: #8c7853;
        }
        .btn-success:hover {
            background-color: #735c3f;
            border-color: #735c3f;
        }
        .text-primary {
            color: #4d2a20 !important;
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card mx-auto" style="max-width: 400px;">
        <img src="../../assets/memberLogo.png" alt="adminLogo">
        <h1 class="text-center">Sign In</h1>
        <hr>
        <form action="" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control" name="nama" id="validationCustom01" required>
                    <div class="invalid-feedback">
                        Masukkan nama anda!
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom02" class="form-label">NISN</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                    <input type="number" class="form-control" name="nisn" id="validationCustom02" required>
                    <div class="invalid-feedback">
                        Masukkan NISN anda!
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="validationCustom03" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Masukkan password anda!
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit" name="signIn">Sign In</button>
                <a class="btn btn-success" href="../link_login.html">Batal</a>
            </div>
            <p class="text-center mt-3">Don't have an account yet? <a href="sign_up.php" class="text-decoration-none text-primary">Sign Up</a></p>
        </form>
        <?php if(isset($error)) : ?>
            <div class="alert alert-danger mt-2" role="alert">Nama / NISN / Password tidak sesuai!
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
</body>
</html>