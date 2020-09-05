<?php

	function kategori(){
		include "koneksi.php";

		$sql1 = mysqli_query($koneksi, "SELECT * FROM kategori");
		
		while($kat=mysqli_fetch_array($sql1)){

			$id_kategori = $kat['id_kategori'];
			$nama_kategori = $kat['nama_kategori'];
		
			echo"<li class='drop with--one--item'><a href='kategori.php?cat=$id_kategori'>$nama_kategori</a></li>";
		}
	}
?>