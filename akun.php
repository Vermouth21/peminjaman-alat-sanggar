<?php 
$menu = "login";
include "header.php";
?>
	<!-- Start My Account Area -->
		<section class="my_account_area pt--30 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<?php if(empty($_SESSION['id_customer'])) { ?>
							<h3 class="account__title">Login</h3>
							<form action="cek_login.php" method="POST" enctype="multipart/form-data">
								<div class="account__form">
									<div class="input__box">
										<label>Username Atau Alamat Email <span>*</span></label>
										<input type="text" name="username" required="">
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="password" name="password" required="">
									</div>
									<div class="form__btn">
										<button type="submit" value="submit" name="submit">Login</button>	
									</div>
								</div>
							</form>
							<?php } ?>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Register</h3>
							<form action="#" method="POST" enctype="multipart/form-data">
								<div class="account__form">
									<div class="input__box">
										<label>Nama Lengkap <span>*</span></label>
										<input type="text" name="nama_lengkap" required="">
									</div>

									<div class="input__box">
										<label>NIK <span>*</span></label>
										<input type="text" name="nik" required="">
									</div>

									<div class="input__box">
										<label>Alamat Email <span>*</span></label>
										<input type="email" name="email" required="">
									</div>

									<div class="input__box">
										<label>Alamat <span>*</span></label>
										<input type="text" name="alamat" required="">
									</div>

									<div class="input__box">
										<label>Username <span>*</span></label>
										<input type="text" name="username" required="">
									</div>

									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="password" name="password" required="">
									</div>

									<div class="form__btn">
										<button type="submit" value="submit" name="submit">Register</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End My Account Area -->
<?php include "footer.php";?>

<?php
	if(isset($_POST['submit'])){
		$nama_lengkap=$_POST['nama_lengkap'];
		$nik=$_POST['nik'];
		$email=$_POST['email'];
		$alamat=$_POST['alamat'];
		$username=$_POST['username'];
		$password=$_POST['password'];

		$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM customer WHERE email='$email' or username='$username'"));

		if($cek > 0){
			echo "<script>window.alert('Email dan Username Sudah Ada')window.location='akun.php'</script>";
		}else{
			mysqli_query($koneksi, "INSERT INTO customer VALUES (
					'',
					'$nama_lengkap',
                    '$nik',
                    '$email',
                    '$alamat',
                    '$username',
					'$password')");

			echo"<script>alert('Data Berhasil Disimpan, Silahkan Login!!!');window.location.href='akun.php'</script>";
		}
	}	
?>