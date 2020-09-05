<?php include"header.php";?>

<!--body wrapper start-->
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
	                    	<div class="form-group">
	                        	<label>Nama Kategori</label>
	                        	<input type="text" class="form-control"  placeholder="Masukkan Kategori" name="nama_kategori">
	                      	</div>

	                      	<button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
	                      	<button type="reset" class="btn btn-danger">Reset</button>

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
include"koneksi.php";
if(isset($_POST['submit'])){
    mysqli_query($koneksi, "INSERT INTO kategori VALUES (
        '',
        '$_POST[nama_kategori]')");
    echo"<script>alert('Data Berhasil Disimpan!');window.location.href='datakategori.php.'</script>";
}
?>