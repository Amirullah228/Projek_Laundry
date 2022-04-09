<script>
function sum() {
      const jumlah = document.getElementById("jumlah").value;
      const total = parseInt(jumlah) * 8000;
      console.log(total);

      if(!isNaN(total)) {
            document.getElementById("total").value = total;
      }
}
</script>
<?php 
// yang login
$query = $conn->query("SELECT * FROM tb_laundry INNER JOIN tb_user ON tb_laundry.id_pga = tb_user.id_pga");
$data = mysqli_fetch_array($query);
 // simpan kedalam tabel transaksi jugak
 $tanggal = $data["tanggal_terima"];
 $nominal = $data["nominal"];
 $ctt = $data["catatan"];
 $id_pga = $data["id_pga"];
?>
<section class="content">
<div class="container-fluid">
      <div class="row">
      <!-- left column -->
      <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Form Tambah Data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST">
            <div class="card-body">
            <div class="form-group">
                  <label>Pelanggan</label>
                  <select name="plg" class="form-control">
                  <option value="">--Pilih--</option>
                  <?php 
                  $data1 = $conn->query("SELECT * FROM tb_pelanggan");
                  while($t = $data1->fetch_assoc()) {
                       $id = $t["id_pelanggan"];
                       $kode = $t["kode_pelanggan"];
                       echo "<option value='$id'>$kode</option>";
                  }
                  ?>
                  </select>
            </div>
            <div class="form-group">
                  <label>Tanggal Terima</label>
                  <input type="date" class="form-control" name="tgl_t">
            </div>
            <div class="form-group">
                  <label>Tanggal Selesai</label>
                  <input type="date" class="form-control" name="tgl_s">
            </div>
            <div class="form-group">
                  <label>jumlah kilo</label>
                  <input type="number" onkeyup="sum();" class="form-control" id="jumlah" name="jumlah">
            </div>
            <div class="form-group">
                  <label>Total</label>
                  <input type="text" class="form-control" id="total" readonly name="total">
            </div>
            <div class="form-group">
                  <label>Status</label>
                  <select name="stt" class="form-control">
                  <option value="Lunas">--Pilih--</option>
                  <option value="Lunas">Lunas</option>
                  <option value="Belum Lunas">Belum Lunas</option>
                  </select>
            </div>          
            <div class="form-group">
                  <label>Catatan</label>
                  <textarea name="ctt" cols="25" rows="5" class="form-control"></textarea>
            </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="tambahL">Simpan</button>
            </div>
            </form>
      </div>
      <!-- /.card -->
      </div>
      </div>
</div>
</section>

<?php 
if (isset($_POST["tambahL"])) {
      
     $plg = $_POST["plg"]; 
     $tgl_t = $_POST["tgl_t"]; 
     $tgl_s = $_POST["tgl_s"]; 
     $jumlah = $_POST["jumlah"]; 
     $total = $_POST["total"];  
     $ctt = $_POST["ctt"]; 
     $stt = $_POST["stt"];
     

    if($stt == 'Lunas') {
      $query = $conn->query("INSERT INTO tb_laundry(id_pelanggan,tanggal_terima,tanggal_selesai,jumlah,nominal,catatan,status,id_pga)VALUES('$plg','$tgl_t','$tgl_s','$jumlah','$total','$ctt','$stt','$id_pga')")or die(mysqli_error($conn));

     
      // update ketabel transaksi
      $ins = $conn->query("INSERT INTO tb_transaksi (tgl_trans,pemasukan,catatan,keterangan,id_pga) VALUES ('$tanggal','$nominal','$ctt','pemasukan','$id_pga')")or die(mysqli_error($conn));

      echo "<script>
      alert('Berhasil TerSimpan || Status: .$stt.');
      document.location= '?page=laundry';
      </script>";
    } else if($stt == 'Belum Lunas'){
      $query = $conn->query("INSERT INTO tb_laundry(id_pelanggan,tanggal_terima,tanggal_selesai,jumlah,nominal,catatan,status,id_pga)VALUES('$plg','$tgl_t','$tgl_s','$jumlah','$total','$ctt','$stt','$id_pga')")or die(mysqli_error($conn));   
      
      echo "<script>
      alert('Berhasil TerSimpan || Status: .$stt.');
      document.location= '?page=laundry';
      </script>";
    } else {
          echo "Transaksi gagal!";
    }

}


?>