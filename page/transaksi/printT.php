<?php 
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING)); //notif error
?>
<style>
    h3, p {
        text-align: center;
        font-weight: bold;
        padding: 5px 0 2px 0;
        text-transform: uppercase;
    }
    th, td {
          padding: 10px 10px;
    }
    table, th, td {
      border: 1px solid black;
      }
    .warna {
          background-color: #808080;
          text-align: left;
    }
</style>
<body >
<h3>Laporan Transaksi Laundry</h3>
<p>PT. Laundry Offical</p>
<center>
<table width="100%">
      <thead>
      <tr class="warna">
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
include "../../config/koneksi.php";
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
      </center>   
</body>
<!-- cetak -->
<script>
    window.print();
    window.onfocus*function() {
        window.close();
    }
</script>