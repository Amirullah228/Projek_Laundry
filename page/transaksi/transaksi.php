
<div class="card">
      <div class="card-header">
      <button type="button" class="btn btn-primary" data-toggle="modal"   data-target="#modal-default">Tambah Transaksi
      </button>&nbsp;
      <a target="_blank" href="page/transaksi/printT.php">
      <button class="btn btn-success"><i class="fa fa-print"> Print           
      </i></button></a>
      </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Keterangan</th>
            <th>Catatan</th>
            <th>Kasir</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
      </tr>
      </thead>
      <tbody>
<!-- tampil data -->
<?php
$no = 1; 
$query = $conn->query("SELECT * FROM tb_transaksi INNER JOIN tb_user ON tb_transaksi.id_pga = tb_user.id_pga");

while($data = $query->fetch_assoc()) {
      $id_trans = $data["id_trans"];
      $tgl_trans = $data["tgl_trans"];
      $pemasukan = $data["pemasukan"];
      $ctt = $data["catatan"];
      $ket = $data["keterangan"];
      $pengeluaran = $data["pengeluaran"];
      $id_pga = $data["nama_pga"];
?>
      <tr>
            <td><?= $no++; ?></td>
            <td><?= $tgl_trans ?></td>
            <td><?= $ket ?></td>
            <td><?= $ctt ?></td>
            <td><?= $id_pga ?></td>
            <td>Rp. <?=number_format($pemasukan) ?></td>
            <td>Rp. <?= number_format($pengeluaran) ?></td>           
      </tr>

      <?php 
      $pemasok1 += $pemasukan; //nilai total pemasukan
      $pengeluaran1 += $pengeluaran;//nilai total pengeluaran
      $total = $pemasok1 - $pengeluaran1;
      } ?>
      </tbody>
      <tr>
      <th colspan="5" style="text-align: center;">Total Pemasuk dan Pengeluaran</th>
      <td>Rp. <?= number_format($pemasok1); ?></td>
      <td>Rp. <?= number_format($pengeluaran1); ?></td>
      </tr>
      <tr>
      <th colspan="5" style="text-align: center;">Total Saldo</th>
      <td>Rp. <?= number_format($total); ?></td>
      </tr>
      </table>
      </div>
</div>
  
<!-- form tambah  -->
<div class="modal fade" id="modal-default">
      <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header bg-blue">
            <h4 class="modal-title">Form Tambah Transaksi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
      
            <!-- form -->
            <form method="POST" action="?page=tambah_trans">
            <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Tanggal </label>
            <input type="date" class="form-control" name="tgl">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Nominal Pengeluaran</label>
            <input type="text" class="form-control" name="nominalP">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Catatan</label>
            <textarea name="ctt" class="form-control" cols="25" rows="6"></textarea>
            </div>                    
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="tambahT">Save</button>
            </div>
            </form>
      </div>
      <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
</div>
</div>
          