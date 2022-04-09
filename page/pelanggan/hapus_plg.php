<?php 

$kode = $_GET["kode"];

$query = $conn->query("DELETE FROM tb_pelanggan WHERE id_pelanggan = '$kode'");

if ($query) {
      echo "<script>
      alert('Data berhasil Terhapus!');
      document.location. href= '?page=pelanggan';
    </script>";
} else {
      echo "gagal";
}