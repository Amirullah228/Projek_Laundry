<?php 

include "koneksi.php";

if($_GET["page"] == ""){
include "home.php";
} else if($_GET["page"] == "pelanggan"){//data pelanggan
  include "page/pelanggan/pelanggan.php";
} else if($_GET["page"] == "tambah_plg"){
  include "page/pelanggan/tambah_plg.php";
} else if($_GET["page"] == "hapus_plg"){
  include "page/pelanggan/hapus_plg.php";
} else if($_GET["page"] == "edit_plg"){
  include "page/pelanggan/edit_plg.php";
}else if($_GET["page"] == "laundry"){//data laundry
  include "page/laundry/laundry.php";
}else if($_GET["page"] == "tambahL"){
  include "page/laundry/tambahL.php";
}else if($_GET["page"] == "editL"){
  include "page/laundry/editL.php";
}
else if($_GET["page"] == "lunasL"){
  include "page/laundry/lunasL.php";
}
else if($_GET["page"] == "hapusL"){
  include "page/laundry/hapusL.php";
}
else if($_GET["page"] == "transaksi"){ //transaksi
  include "page/transaksi/transaksi.php";
}
else if($_GET["page"] == "tambah_trans"){ 
  include "page/transaksi/tambahT.php";
}
else if($_GET["page"] == "user"){ //user
  include "page/user/user.php";
}
else if($_GET["page"] == "tambah_pgg"){ 
  include "page/user/tambahU.php";
}
else if($_GET["page"] == "hapusU"){ 
  include "page/user/hapusU.php";
}
else if($_GET["page"] == "edit_pgg"){ 
  include "page/user/editU.php";
}