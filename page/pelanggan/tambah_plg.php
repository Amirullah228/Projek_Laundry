<?php 
if(isset($_POST["tambahP"])) {
$kode = $_POST["kode_plg"];
$nama_plg = $_POST["nama_plg"];      
$no = $_POST["no"];
$alamat = $_POST["alamat"];

$query = $conn->query("INSERT INTO tb_pelanggan VALUES ('$kode','$nama_plg','$no','$alamat')")or die(mysqli_connect_error($conn));

if($query > 0) {
      echo "<script>
      alert('Data berhasil Tersimpan!');
      document.location. href= '?page=pelanggan';
    </script>";
} else {
      echo "gagal";
}

}