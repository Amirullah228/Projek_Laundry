
<div class="card">
      <div class="card-header">
      <a href="?page=tambahL">
      <button type="submit" class="btn btn-success">Tambah Transaksi
      </button></a>
      </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
            <th>Pelanggan</th>
            <th>TanggalTerima</th>
            <th>TanggalSelesai</th>
            <th>Jumlah</th>
            <th>Catatan</th>
            <th>Status</th>
            <th>Kasir</th>
            <th colspan="2" style="text-align: center;">Opsi</th>
      </tr>
      </thead>
      <tbody>
<!-- tampil data -->
<?php 
$query = $conn->query("SELECT * FROM tb_laundry,tb_pelanggan,tb_user WHERE tb_laundry.id_pelanggan = tb_pelanggan.id_pelanggan and tb_laundry.id_pga = tb_user.id_pga");

while($data = $query->fetch_assoc()) {
      $laundry = $data["id_laundry"];
      $kode_plg = $data["kode_pelanggan"];
      $tgl_t = $data["tanggal_terima"];
      $tgl_s = $data["tanggal_selesai"];
      $nominal = $data["nominal"];
      $ctt = $data["catatan"];
      $stt = $data["status"];
      $kode_u = $data["nama_pga"];
      $id_pga = $data["id_pga"]
?>
<tr>
      <td><?= $kode_plg; ?></td>
      <td><?= $tgl_t; ?></td>
      <td><?= $tgl_s; ?></td>
      <td>Rp. <?=number_format($nominal) ?></td>
      <td><?= $ctt; ?></td>
      <td><?= $stt; ?></td>
      <td><?= $kode_u; ?></td>
      <td>           
      <a href="?page=editL&kode=<?= $laundry; ?>">
         <button class="btn btn-primary" type="button"><i class="fa fa-edit"></i></button>
      </a>      
      <?php 
       if ($stt=="Belum Lunas"){?>
      <a href="?page=lunasL&kode=<?= $laundry; ?>">
         <button class="btn btn-success" type="button"><i class="fa fa-money-bill"></i></button>
      </a> 
       <?php } ?>
       <a target="_blank" href="page/laundry/printL.php?kode=<?= $laundry; ?>">
       <button class="btn btn-default"><i class="fa fa-print"></i></button>
       </a>
       <a href="?page=hapusL&kode=<?= $laundry; ?>">
       <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
       </a>
      </td>
       </tr>
      <?php } ?>
      </tbody>
      </table>
      </div>
</div>

            