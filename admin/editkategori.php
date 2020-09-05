<?php include"header.php";?>

<!--body wrapper start-->
<?php
	include"koneksi.php";
	$r=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$_GET[id]'"));
?>
	<div class="wrapper">
		<!--Start Page Title-->
		<div class="page-title-box">
			<h4 class="page-title">Kategori</h4>
			<div class="clearfix"></div>
		</div>

		<div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h2 class="header-title">Tambah Kategori</h2>
                    <div class="col-md-6">
	                    <form action="" method="post" enctype="multipart/form-data">

	                    	<div class="form-group" hidden="hidden">
	                        	<input type="text" class="form-control" placeholder="Masukkan Kategori" name="id_kategori" value="<?php echo $r['id_kategori'];?>">
	                      	</div>

	                    	<div class="form-group">
	                        	<label>Nama Kategori</label>
	                        	<input type="text" class="form-control" placeholder="Masukkan Kategori" name="nama_kategori" value="<?php echo $r['nama_kategori'];?>">
	                      	</div>

	                      	<button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
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
mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$_POST[nama_kategori]' WHERE id_kategori='$_POST[id_kategori]'");

echo "<script type='text/javascript'>
      alert('Data Berhasil Diedit...!!!');
      </script>";
      echo "<meta http-equiv='refresh' content='0; datakategori.php'>";
}
?>