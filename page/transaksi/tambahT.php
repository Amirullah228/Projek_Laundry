<?php
$query = $conn->query("SELECT * FROM tb_user");
$data = mysqli_fetch_assoc($query);
$id_pga = $data["id_pga"];


if (isset($_POST["tambahT"])) {
      $tgl = $_POST["tgl"];
      $nominal = $_POST["nominalP"];
      $ctt = $_POST["ctt"];

      $query = $conn->query("INSERT INTO tb_transaksi(tgl_trans,pemasukan,catatan,keterangan,pengeluaran,id_pga)VALUES('$tgl','0','$ctt','pengeluaran','$nominal','$id_pga')")or die (mysqli_error($conn));

      if($query > 0) {
            echo "<script>
            alert('Data berhasil Tersimpan!');
            document.location. href= '?page=transaksi';
          </script>";

      }else {
            echo "gagal";
      }
}