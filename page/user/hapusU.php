<?php 
$kode = $_GET["kode"];
$query = $conn->query("SELECT * FROM tb_user WHERE id_pga = '$kode'");
$data = mysqli_fetch_assoc($query);
$hapus_img = 'img/'.$data["foto"];
unlink($hapus_img);

$query2  = $conn->query("DELETE FROM tb_user WHERE id_pga = '$kode'");
// validasi
if($query2 > 0) {
      echo "<script>
           alert('Berhasil dihapus');
           document.location.href= '?page=user';
           </script>";
   } else {
      echo "gagal";
   }