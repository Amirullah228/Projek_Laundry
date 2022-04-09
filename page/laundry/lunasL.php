<?php 
$kode_l = $_GET["kode"];

$query = $conn->query("SELECT * FROM tb_laundry INNER JOIN tb_user ON tb_laundry.id_pga = tb_user.id_pga WHERE id_laundry = '$kode_l'");
$data = mysqli_fetch_assoc($query);

$tanggal = $data["tanggal_terima"];
$nominal = $data["nominal"];
$ctt = $data["catatan"];
$id_pga = $data["id_pga"];
// update ketabel transaksi
$ins = $conn->query("INSERT INTO tb_transaksi (tgl_trans,pemasukan,catatan,keterangan,id_pga) VALUES ('$tanggal','$nominal','$ctt','pemasukan','$id_pga')")or die(mysqli_error($conn));
// update ke tabel laundry
$ins2 = $conn->query("UPDATE tb_laundry SET status = 'Lunas' WHERE id_laundry = '$kode_l'");

if ($ins && $ins2 > 0) {
      echo "<script>
      alert('Terimakasih Sudah Melunaskan!');
      document.location. href= '?page=laundry';
    </script>";
} else {
      echo "gagal";
}