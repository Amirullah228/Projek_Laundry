<?php 
global $conn; 
$conn = mysqli_connect("localhost", "root", "", "db_laundry");
if(!$conn) {
      die("Koneksi kedatabase gagal");
}