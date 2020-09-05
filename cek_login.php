	<?php
	session_start();
	include "koneksi.php";

	$sql=mysqli_query($koneksi, "SELECT * FROM customer WHERE username = '$_POST[username]' and password='$_POST[password]'");

	$data=mysqli_fetch_array($sql);
	

	if($data['id_customer']!=''){
		
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['id_customer']=$data['id_customer'];
		$_SESSION['nama_lengkap']=$data['nama_lengkap'];
		
	?>
		<script type="text/javascript">
			var answer = confirm ("Anda berhasil Login, selamat datang <?php echo "$_SESSION[nama_lengkap]"; ?> pilih OK untuk lanjut")
			if (answer)
			window.location="<?php echo"index.php";?>"
		</script>
	<?php
	}else{
	?>
		<script type="text/javascript">
		<!--
		var answer = confirm ("Anda Gagal Login, Silahkan Login Kembali!")
		if (answer)
		window.location="<?php echo"akun.php";?>"
		// -->
		</script>
	<?php
	}
	?>
?>