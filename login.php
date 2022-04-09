<?php 
session_start();
if(isset($_SESSION['nama_pga'])) {
  header('location: index.php');
}

include "config/koneksi.php";

if(isset($_POST['login'])) {
  
  $username = htmlspecialchars($_POST["username"]);
  $pss =  htmlspecialchars($_POST["pss"]);
        
  $query = $conn->query("SELECT * FROM tb_user WHERE nama_pga = '$username' and password = '$pss'");

  if(mysqli_num_rows($query) > 0) { 
       $row = mysqli_fetch_assoc($query);
       $_SESSION['nama_pga'] = $row['nama_pga'];
       $_SESSION['level'] = $row["level"];
       $_SESSION['foto'] = $row["foto"];
       header('location: index.php');
  } else {
        echo "<script>
        alert('Username atau password yang anda masukan salah, Silahkan coba lagi!');
        document.location.href= 'login.php';
      </script>";
  }


}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laundry Offical</title>
  <link rel="stylesheet" href="style.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page bg-white">
<div class="login-box">
  <div class="login-logo">
    <img src="img/logo.png" width="250" height="200">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg font-weight-bold">SELAMAT DATANG DI LAUNDRY OFFICAL</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pss">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
