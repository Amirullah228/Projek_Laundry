
<div class="card">
<div class="card-header">
<button type="button" class="btn btn-primary" data-toggle="modal"   data-target="#modal-default">Tambah Pengguna
</button>
</div>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
      <th>No</th>
      <th>Foto</th>
      <th>Nama</th>
      <th>Level</th>
      <th>Password</th>
      <th style="text-align: center;">Opsi</th>
</tr>
</thead>
<tbody>
      <!-- tampil data -->
      <?php
      $no = 1; 
      $query = $conn->query("SELECT * FROM tb_user");

      while($data = $query->fetch_assoc()) {
            $id_pga = $data["id_pga"];
            $foto = $data["foto"];
            $nama_pga = $data["nama_pga"];
            $level = $data["level"];
            $password = $data["password"];
      
      ?>
<tr>
      <td><?= $no++; ?></td>
      <td><img src="img/<?= $foto ?>" width="80" height="80"></td>
      <td><?= $nama_pga ?></td>
      <td><?= $level ?></td>
      <td><?= $password ?></td>
      <td style="text-align: center;">           
      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#editU<?= $id_pga; ?>">Edit
      </button> &nbsp;
      <a href="?page=hapusU&kode=<?= $id_pga; ?>">
      <button class="btn btn-danger" type="button" onclick="return confirm('Anda akan menghapus data ini?');">Hapus</button>
      </a>
      </td>
</tr>

<!-- form edit  -->
<div class="modal fade" id="editU<?= $id_pga; ?>">
<div class="modal-dialog">
<div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Form Edit Pengguna</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">

      <!-- form -->
      <form method="POST" action="?page=edit_pgg" enctype="multipart/form-data">
      <div class="card-body">
      <div class="form-group">
      <input type="hidden" name="idnya" value="<?= $id_pga; ?>">           
      <label for="exampleInputEmail1">Foto</label>
      <input type="file" class="form-control" name="foto1" value="<?= $data["foto"]; ?>" >
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Nama</label>
      <input type="text" class="form-control" name="nma" value="<?= $nama_pga; ?>">
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Level</label>
      <select name="level" class="form-control">
      <option > <?= $level; ?></option>
      <option value="Admin">Admin</option>
      <option value="Kasir">Kasir</option>
      </select>
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Password</label>
      <input type="text" class="form-control" name="pss" value="<?= $password; ?>">
      </div>                    
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
      <button type="submit" class="btn btn-primary" name="editU">Save</button>
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

<!-- form tambah  -->
<div class="modal fade" id="modal-default">
<div class="modal-dialog">
<div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Form Tambah Pengguna</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">

      <!-- form -->
      <form method="POST" action="?page=tambah_pgg" enctype="multipart/form-data">
      <div class="card-body">
      <div class="form-group">
      <label for="exampleInputEmail1">Foto</label>
      <input type="file" class="form-control" name="foto">
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Nama</label>
      <input type="text" class="form-control" name="nama">
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Level</label>
      <select name="level" class="form-control">
      <option value="">--Pilih--</option>
      <option value="Admin">Admin</option>
      <option value="Kasir">Kasir</option>
      </select>
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Password</label>
      <input type="password" class="form-control" name="pss">
      </div>                    
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
      <button type="submit" class="btn btn-primary" name="tambahU">Save</button>
      </div>
      </form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>

      