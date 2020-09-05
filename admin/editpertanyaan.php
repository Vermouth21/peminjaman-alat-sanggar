<?php include"header.php";?>

<!--body wrapper start-->
<?php
	include"koneksi.php";
	$r=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pertanyaan WHERE id_pertanyaan='$_GET[id]'"));
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
	                        	<input type="text" class="form-control"name="id_pertanyaan" value="<?php echo $r['id_pertanyaan'];?>">
	                      	</div>

	                    	<div class="form-group">
	                        	<label>Pesan</label>
	                        	<input type="text" class="form-control" name="pesan" value="<?php echo $r['pesan'];?>">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Jawaban</label>
	                        	<input type="text" class="form-control" name="jawaban" value="<?php echo $r['jawaban'];?>">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Tanggal Dikirim</label>
	                        	<input type="text" class="form-control" name="tgl_post" value="<?php echo $r['tgl_post'];?>">
	                      	</div>

	                      	<div class="form-group">
	                            <label>Status</label>
	                            <select class="form-control" name="status">
	                            	<?php if ($r['status']=='Belum Dipost'){?>	
		                                <option value="Belum Dipost" selected>Belum Dipost</option>
		                                <option value="Posting">Posting</option>
		                            <?php } else {?>
		                            	<option value="Belum Dipost">Belum Dipost</option>
		                                <option value="Posting" selected>Posting</option>
		                            <?php } ?>
	                            </select>
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
mysqli_query($koneksi, "UPDATE pertanyaan SET jawaban='$_POST[jawaban]', status='$_POST[status]' WHERE id_pertanyaan='$_POST[id_pertanyaan]'");

echo "<script type='text/javascript'>
      alert('Data Berhasil Diedit...!!!');
      </script>";
      echo "<meta http-equiv='refresh' content='0; datapertanyaan.php'>";
}
?>