<?php 
if(isset($_POST["editP"])) 
{
      $kode = $_POST["kode_plg"];    
      $nama_plg = $_POST["nma"];      
      $no = $_POST["no"];
      $alamat = $_POST["alamat"];
      
      $query = $conn->query("UPDATE tb_pelanggan SET    
      kode_pelanggan = '$nama_plg',
      no_hp = '$no',
      alamat = '$alamat' 
      WHERE id_pelanggan = '$kode'
      ")or die(mysqli_connect_error($conn));
      
      if($query > 0) {
            echo "<script>
            alert('Data berhasil TerUpdate!');
            document.location. href= '?page=pelanggan';
          </script>";
      } else {
            echo "gagal";
      }
          
}