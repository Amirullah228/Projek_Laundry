<?php
require "../../config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Offical</title>
    <style>
        tr td{
            padding: 4px;
            font-size: 19px;
        }
        h2 {
            font-weight: bold;
            color: blue;
            font-family: arial sans-serif;
        }
      </style>
</head>
<body onload="window.print();">
    <h2>Laundry Offical</h2>
    <p>Jln. Sukarjo Mesim No 04/05</p>
    <p>Telphone : 082284207229</p>
    <hr>

    <table>
    <tbody>
<?php 
$idl = $_GET["kode"];
$query = $conn->query("SELECT * FROM tb_laundry INNER JOIN tb_pelanggan ON tb_laundry.id_pelanggan = tb_pelanggan.id_pelanggan INNER JOIN tb_user ON tb_laundry.id_pga = tb_user.id_pga WHERE id_laundry = '$idl'");

while($data = $query->fetch_assoc()) {
      $laundry = $data["id_laundry"];
      $kode_plg = $data["kode_pelanggan"];
      $tgl_t = $data["tanggal_terima"];
      $tgl_s = $data["tanggal_selesai"];
      $nominal = $data["nominal"];
      $ctt = $data["catatan"];
      $stt = $data["status"];
      $kode_u = $data["nama_pga"];

?>
    <tr>
        <td>Pelanggan</td>
        <td>:</td>
        <td><?php echo $kode_plg ?></td>
    </tr>
    <tr>
        <td>Tanggal Terima</td>
        <td>:</td>
        <td><?php echo $tgl_t ?></td>
    </tr>
    <tr>
        <td>Tanggal Selesai</td>
        <td>:</td>
        <td><?php echo $tgl_s ?></td>
    </tr>
    <tr>
        <td>Jumlah</td>
        <td>:</td>
        <td><?php echo $nominal ?></td>
    </tr>
    <tr>
        <td>Catatan</td>
        <td>:</td>
        <td><?php echo $ctt ?></td>
    </tr>
    <tr>
        <td>Catatan</td>
        <td>:</td>
        <td><?php echo  $stt ?></td>
    </tr>
    <tr>
        <td>Kasir</td>
        <td>:</td>
        <td><?php echo $kode_u ?></td>
    </tr>
<?php }?>
  </table>
        <p style="text-align: center; margin-top: 70px">Terimkasih Laundry Offical <br>
        Email: LaundryOffical@gmail.com <br><?php echo date("Y-m-d"); ?></P>
</body>
</html>
<script>
    window.print();
    window.onfocus*function() {
        window.close();
    }
</script>