<?php  
if(isset($_POST['editU'])) {
 
 $nama = $_POST["nma"];
 $level = $_POST["level"];
 $pss = $_POST["pss"];
 $idnya = $_POST["idnya"];
 

// pengecekan jika nama sudah ada
 $query = $conn->query("SELECT * FROM tb_user WHERE id_pga = '$idnya'");
// hapus jugak gambar
$data1 = mysqli_fetch_array($query);



//  pengecekan password jika < 5
if(strlen($pss) < 6){
      echo "<script>
            alert('Password Tidak Boleh Kurang Dari 6!');
            document.location.href= '?page=user';
            </script>";
            return false;
      }

// definisi set gambar
$rand = mt_rand();//menghasilkan bilangan integer acak
$ektensi = array('jpg','jpeg','png');//ektensi gambar yang boleh
$nma_file = $_FILES['foto1']['name'];//nama file di tb
$ukuran_file = $_FILES['foto1']['size'];//size
$ext = pathinfo($nma_file, PATHINFO_EXTENSION);

//   pengecekan jika user tidak upload foto
if($ukuran_file == null) {
     
 $conn->query("UPDATE tb_user SET
 nama_pga = '$nama',
 level = '$level',
 password = '$pss'
 WHERE id_pga = '$idnya'")or die(mysqli_error($conn));

      echo "<script>
            alert('Berhasil TerUpdate!');
            document.location.href= '?page=user';
      </script>";

// user mau upload
}else if($ukuran_file && $ext == true){
// hapus gambar lama
$hapus_img = 'img/'.$data1["foto"];
unlink($hapus_img); 
$img = $rand.'-'.$nma_file;//generete nama gambar menjadi blngan acak
move_uploaded_file($_FILES['foto1']['tmp_name'], 'img/'.$rand.'-'.$nma_file); 
$conn->query("UPDATE tb_user SET
nama_pga = '$nama',
level = '$level',
password  = '$pss',
foto = '$img'
WHERE id_pga = '$idnya'")or die(mysqli_error($conn));


      echo "<script>
            alert('Berhasil TerUpdate!');
            document.location.href= '?page=user';
</script>";




      } else {
            echo "ektensi gambar tidak sesuai";
      }
           

          
      
}



