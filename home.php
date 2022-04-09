<?php 
include "config/koneksi.php";
// pelanggan
$ceks1 = $conn->query("SELECT * FROM tb_pelanggan");
$cek1 = $ceks1->num_rows;
// laundry
$ceks2 = $conn->query("SELECT * FROM tb_laundry");
$cek2 = $ceks2->num_rows;
// transaksi
$ceks3 = $conn->query("SELECT * FROM tb_transaksi");
$cek3 = $ceks3->num_rows;
// user
$ceks4 = $conn->query("SELECT * FROM tb_user");
$cek4 = $ceks4->num_rows;

?>
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $cek1; ?></h3>

                <p>PELANGGAN</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="?page=pelanggan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $cek2; ?></h3>

                <p>DATA LAUNDRY</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="?page=laundry" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $cek3; ?></h3>

                <p>TRANSAKSI LAUNDRY</p>
              </div>
              <div class="icon">
              <i class="ion ion-pie-graph"></i>
              </div>
              <a href="?page=transaksi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $cek4; ?></h3>

                <p>DATA PENGGUNA</p>
              </div>
              <div class="icon">
              <i class="ion ion-person-add"></i>
              </div>
              <a href="?page=user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        <!-- /.row (main row) -->
       
      </div><!-- /.container-fluid -->
      
    </section>
    <!-- /.content -->
