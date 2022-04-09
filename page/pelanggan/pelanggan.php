
<div class="card">
      <div class="card-header">
      <button type="button" class="btn btn-primary" data-toggle="modal"   data-target="#modal-default">Tambah Pelangan
      </button>
      </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
            <th>Kode Pelanggan</th>
            <th>Nama</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th style="text-align: center;">Opsi</th>
      </tr>
      </thead>
      <tbody>
            <!-- tampil data -->
           <?php 
            $query = $conn->query("SELECT * FROM tb_pelanggan");

            while($data = $query->fetch_assoc()) {
                  $plg = $data["id_pelanggan"];
                  $nma_plg = $data["kode_pelanggan"];
                  $noHp = $data["no_hp"];
                  $alamat = $data["alamat"];
           
           ?>
      <tr>
            <td><?= $plg ?></td>
            <td><?= $nma_plg ?></td>
            <td><?= $noHp ?></td>
            <td><?= $alamat ?></td>
            <td>           
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#editP<?= $plg; ?>">Edit
           </button> &nbsp;
            <a href="?page=hapus_plg&kode=<?= $plg; ?>">
            <button class="btn btn-danger" type="button" onclick="return confirm('Anda akan menghapus data ini?');">Hapus</button>
            </a>
            </td>
      </tr>
<!-- form edit  -->
<div class="modal fade" id="editP<?= $plg; ?>">
      <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Form Edit Pelanggan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
      
            <!-- form -->
            <form method="POST" action="?page=edit_plg">
            <div class="card-body">
            <div class="form-group">           
            <label for="exampleInputEmail1">Kode Pelanggan</label>
            <input type="text" class="form-control" value="<?= $plg; ?>" name="kode_plg" readonly>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" name="nma" value="<?= $nma_plg; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">No Hp</label>
            <input type="text" class="form-control" name="no" maxlength="12" value="<?= $noHp; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <textarea name="alamat" class="form-control" cols="25" rows="6"><?= $alamat; ?></textarea>
            </div>                    
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="editP">Save</button>
            </div>
            </form>
      </div>
      <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
</div>
</div>
 


      <?php } ?>
      </tbody>
      </table>
      </div>
</div>
<!-- definisikan kode barang -->
<?php 
      $sql = $conn->query("SELECT id_pelanggan FROM tb_pelanggan ORDER BY id_pelanggan DESC");
      $data = $sql->fetch_assoc();                   
      $id_pelangan = $data['id_pelanggan'];
      $urut = substr($id_pelangan, 4, 4);
      $tambah = (int) $urut + 1;
      // kondisi
      if (strlen($tambah) == 1) {
      $format = "PLG-" . "000" . $tambah;
      } else if (strlen($tambah) == 2) {
      $format = "PLG-" . "00" . $tambah;
      } else if (strlen($tambah) == 3) {
      $format = "PLG-" . "0" . $tambah;
      } else {
      $format = "PLG-" . $tambah;
      }
      
?>

<!-- form tambah  -->
<div class="modal fade" id="modal-default">
      <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Form Tambah Pelanggan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
      
            <!-- form -->
            <form method="POST" action="?page=tambah_plg">
            <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Kode Pelanggan</label>
            <input type="text" class="form-control" value="<?= $format; ?>" name="kode_plg" readonly>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" name="nama_plg">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">No Hp</label>
            <input type="text" class="form-control" name="no" maxlength="12">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <textarea name="alamat" class="form-control" cols="25" rows="6"></textarea>
            </div>                    
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="tambahP">Save</button>
            </div>
            </form>
      </div>
      <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
</div>
</div>
      
            