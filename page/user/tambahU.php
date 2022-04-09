<?php  
if(isset($_POST['tambahU'])) {
 $nama = $_POST["nama"];
 $level = $_POST["level"];
 $pss = $_POST["pss"];

// pengecekan jika nama sudah ada
 $query = $conn->query("SELECT * FROM tb_user WHERE nama_pga = '$nama'");

 if($query->num_rows > 0) {
      echo "<script>
      alert('Username Sudah Terdaftar');
      document.location.href= '?page=user';
      </script>";
      return false; 
 }

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
$nma_file = $_FILES['foto']['name'];//nama file di tb
$ukuran_file = $_FILES['foto']['size'];//size
$ext = pathinfo($nma_file, PATHINFO_EXTENSION);

if(!in_array($ext,$ektensi)) {
      echo "<script>
      alert('Ektensi Gambar Tidak Sesuai!');
      document.location.href= '?page=user';
      </script>";
      return false;   
} else {
      // cek ukuran 
if($ukuran_file < 1044070)
  $img = $rand.'-'.$nma_file;//generete nama gambar menjadi blngan acak
  move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$rand.'-'.$nma_file); 
  $conn->query("INSERT INTO tb_user(nama_pga,level,password,foto)VALUES ('$nama','$level','$pss','$img')")or die(mysqli_error($conn));

    echo "<script>
            alert('Berhasil Tersimpan!');
            document.location.href= '?page=user';
          </script>";
           
      } 
      echo "<script>
            alert('File Gambar Terlalu Besar!');
            document.location.href= '?page=user';
          </script>";
          
      
}



