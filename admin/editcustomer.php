<?php include"header.php";?>

<?php
	include "koneksi.php";
	$p = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM customer WHERE id_customer='$_GET[id]'"));
?>
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
                    <h2 class="header-title">Edit Customer</h2>
                    <div class="col-md-6">
	                    <form action="" method="POST" enctype="multipart/form-data">
	                    	<div class="form-group" hidden="hidden">
	                        	<input type="text" class="form-control" name="id_customer" value="<?php echo $p['id_customer'];?>">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Nama Lengkap</label>
	                        	<input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama_lengkap" value="<?php echo $p['nama_lengkap'] ;?>">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Nik</label>
	                        	<input type="text" class="form-control" placeholder="Masukkan NIK" name="nik" value="<?php echo $p['nik'] ;?>">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Alamat</label>
	                        	<input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat" value="<?php echo $p['alamat'] ;?>">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Email</label>
	                        	<input type="text" class="form-control"  placeholder="Masukkan Email" name="email" value="<?php echo $p['email'] ;?>">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Username</label>
	                        	<input type="text" class="form-control"  placeholder="Masukkan Username" name="username" value="<?php echo $p['username'] ;?>">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Password</label>
	                        	<input type="text" class="form-control"  placeholder="Masukkan Password" name="password" value="<?php echo $p['password'] ;?>">
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
mysqli_query($koneksi, "UPDATE customer SET nama_lengkap='$_POST[nama_lengkap]',nik='$_POST[nik]',email='$_POST[email]', alamat='$_POST[alamat]', username='$_POST[username]', password='$_POST[password]' where id_customer='$_POST[id_customer]'");

echo "<script type='text/javascript'>
      alert('Data Berhasil Diedit...!!!');
      </script>";
      echo "<meta http-equiv='refresh' content='0; datacustomer.php'>";
}
?>