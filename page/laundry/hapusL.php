<?php 
$kode = $_GET["kode"];

$query = $conn->query("DELETE  FROM tb_laundry WHERE id_laundry = '$kode'");

if ($query > 0) {
      echo "<script>
      alert('Berhasil TerHapus!');
      document.location= '?page=laundry';
      </script>";
} else {
      echo "Gagal";
}



?>