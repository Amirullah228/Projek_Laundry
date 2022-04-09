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
$id_laundry = $_GET["kode"];
$query = $conn->query("SELECT * FROM tb_laundry INNER JOIN tb_pelanggan ON tb_laundry.id_pelanggan = tb_pelanggan.id_pelanggan INNER JOIN tb_user ON tb_laundry.id_pga = tb_user.id_pga WHERE id_laundry = '$id_laundry'");
$data2 = mysqli_fetch_array($query);
$idPga = $data2["id_pga"];


?>
<section class="content">
<div class="container-fluid">
      <div class="row">
      <!-- left column -->
      <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Form Edit Data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST">
            <div class="card-body">
            <div class="form-group">
                  <label>Pelanggan</label>
                  <select name="plg" class="form-control">
                  <option value="<?= $data2['id_pelanggan']; ?>"><?= $data2['kode_pelanggan']; ?></option>
                  <?php 
                  $data = $conn->query("SELECT * FROM tb_pelanggan");
                  while($t = $data->fetch_assoc()) {
                       $id = $t["id_pelanggan"];
                       $kode = $t["kode_pelanggan"];
                       echo "<option value='$id'>$kode</option>";
                  }
                  ?>
                  </select>
            </div>
            <div class="form-group">
                  <label>Tanggal Terima</label>
                  <input type="date" class="form-control" name="tgl_t" value="<?= $data2['tanggal_terima']; ?>" >
            </div>
            <div class="form-group">
                  <label>Tanggal Selesai</label>
                  <input type="date" class="form-control" name="tgl_s" value="<?= $data2['tanggal_selesai']; ?>">
            </div>
            <div class="form-group">
                  <label>jumlah kilo</label>
                  <input type="number" onkeyup="sum();" class="form-control" id="jumlah" name="jumlah" value="<?= $data2['jumlah']; ?>">
            </div>
            <div class="form-group">
                  <label>Total</label>
                  <input type="text" class="form-control" id="total" readonly name="total" value="<?= $data2['nominal']; ?>">
            </div>
            <div class="form-group">
                  <label>Status</label>
                  <select name="stt" class="form-control" >
                  <option value="<?= $data2['status']; ?>"><?= $data2['status']; ?></option>
                  <option value="Lunas">Lunas</option>
                  <option value="Belum Lunas">Belum Lunas</option>
                  </select>
            </div>          
            <div class="form-group">
                  <label>Catatan</label>
                  <textarea name="ctt" cols="25" rows="5" class="form-control"><?= $data2['catatan']; ?></textarea>
            </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="editL">Simpan</button>
            </div>
            </form>
      </div>
      <!-- /.card -->
      </div>
      </div>
</div>
</section>

<?php 
if (isset($_POST["editL"])) {
     
     $plg = $_POST["plg"]; 
     $tgl_t = $_POST["tgl_t"]; 
     $tgl_s = $_POST["tgl_s"]; 
     $jumlah = $_POST["jumlah"]; 
     $total = $_POST["total"];  
     $ctt = $_POST["ctt"]; 
     $stt = $_POST["stt"];
     

     $query = $conn->query("UPDATE tb_laundry SET
     id_pelanggan = '$plg',
     tanggal_terima = '$tgl_t',
     tanggal_selesai = '$tgl_s',
     jumlah = '$jumlah',
     nominal = '$total',
     catatan = '$ctt',
     status = '$stt',
     id_pga = '$idPga'
     WHERE id_laundry = '$id_laundry'     
     ")or die(mysqli_error($conn));

     if ($query > 0) {
           echo "<script>
           alert('Berhasil TerUpdate!');
           document.location= '?page=laundry';
           </script>";
     } else {
           echo "Gagal";
     }

}


?>