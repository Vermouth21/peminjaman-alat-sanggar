<?php
session_start();
if($_SESSION){
	header("location: index.php");
}
?>
<?php
	include "koneksi.php";

	$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$_POST[username]' and password = '$_POST[password]'");
	$data = mysqli_fetch_array($sql);
	$row = mysqli_num_rows($sql);

	if($row > 0){
		
		$_SESSION['id_admin'] = $data['id_admin'];
		$_SESSION['nama_lengkap'] = $data['nama_lengkap'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		
?>
		<script type="text/javascript">
			var answer = confirm("Anda Berhasil Login, SELAMAT DATANG <?php echo "$_SESSION[nama_lengkap]";?> Pilih OK untuk Lanjut")
		if(answer)
			window.location="<?php echo "index.php";?>"
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			var answer = confirm("Anda Gagal Login, Silahkan Login Kembali")
		if(answer)
			window.location="<?php echo "login.php";?>"
		</script>
		<?php
	}
?>