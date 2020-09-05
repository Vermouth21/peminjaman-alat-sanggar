<?php
$koneksi = mysqli_connect("localhost", "root", "", "sanggar_sna");

if(mysqli_connect_errno()){
	echo "Database Tidak Terkoneksi".mysqli_connect_error(); 
}
?>