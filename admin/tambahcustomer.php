<?php include"header.php";?>

<!--body wrapper start-->
	<div class="wrapper">
		<!--Start Page Title-->
		<div class="page-title-box">
			<h4 class="page-title">Customer</h4>
			<div class="clearfix"></div>
		</div>

		<div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h2 class="header-title">Tambah Customer</h2>
                    <div class="col-md-6">
	                    <form action="" method="POST" enctype="multipart/form-data">
	                    	<div class="form-group" hidden="hidden">
	                        	<input type="text" class="form-control" name="id_customer" >
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Nama Lengkap</label>
	                        	<input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama_lengkap">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Nik</label>
	                        	<input type="text" class="form-control" placeholder="Masukkan NIK" name="nik" >
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Alamat</label>
	                        	<input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Email</label>
	                        	<input type="text" class="form-control"  placeholder="Masukkan Email" name="email">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Username</label>
	                        	<input type="text" class="form-control"  placeholder="Masukkan Username" name="username">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Password</label>
	                        	<input type="password" class="form-control"  placeholder="Masukkan Password" name="password">
	                      	</div>

	                      	<button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
	                      	<button type="reset" class="btn btn-danger">Kembali</button>

	                    </form>
                	</div>
                </div>
            </div>
        </div>

	</div>
<!-- End Wrapper-->

<?php include"footer.php";?>

<?php
error_reporting(0);
if(isset($_POST['submit'])){
mysqli_query($koneksi, "INSERT INTO customer VALUES ('', '$_POST[nama_lengkap]','$_POST[nik]','$_POST[email]', '$_POST[alamat]', '$_POST[username]', '$_POST[password]')");

echo "<script type='text/javascript'>
      alert('Data Berhasil Ditambah...!!!');
      </script>";
      echo "<meta http-equiv='refresh' content='0; datacustomer.php'>";
}
?>