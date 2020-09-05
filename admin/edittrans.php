<?php 
	include"header.php";
	include"format.php"
;?>

<?php
	include "koneksi.php";
	$p = mysqli_fetch_array(mysqli_query($koneksi, "SELECT DISTINCT customer.id_customer, nama_lengkap, produk.id_produk, nama_produk, harga, gambar, transaksi.id_trans, tgl_awal, tgl_akhir, durasi, status, total, no_sewa, bukti FROM transaksi, customer, produk WHERE transaksi.id_customer=customer.id_customer AND transaksi.id_produk=produk.id_produk AND transaksi.id_trans='$_GET[id]'"));
?>
<!--body wrapper start-->
	<div class="wrapper">
		<!--Start Page Title-->
		<div class="page-title-box">
			<h4 class="page-title">Konfirmasi Transaksi</h4>
			<div class="clearfix"></div>
		</div>

		<div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h2 class="header-title">Transaksi</h2>
                    <div class="col-md-4">
                    	<img src="bukti/<?php echo $p['bukti']; ?>" width="100%" height="100%">
                    </div>
                    <div class="col-md-8">
	                    <form action="" method="POST" enctype="multipart/form-data">
	                    	<div class="form-group" hidden="hidden">
	                        	<input type="text" class="form-control" name="id_trans" value="<?php echo $p['id_trans'];?>">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>No Sewa</label>
	                        	<input type="text" class="form-control" name="no_sewa" value="<?php echo $p['no_sewa'] ;?>" disabled>
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Nama Produk</label>
	                        	<input type="text" class="form-control" name="nama_produk" value="<?php echo $p['nama_produk'] ;?>" disabled>
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Nama Customer</label>
	                        	<input type="text" class="form-control" name="nama_lengkap" value="<?php echo $p['nama_lengkap'] ;?>" disabled>
	                      	</div>


	                      	<div class="form-group">
	                        	<label>Tanggal Pinjam</label>
	                        	<input type="text" class="form-control" name="tgl_awal" value="<?php echo format_indo($p['tgl_awal']) ;?>" disabled>
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Tanggal Pinjam</label>
	                        	<input type="text" class="form-control" name="tgl_akhir" value="<?php echo format_indo($p['tgl_akhir']) ;?>" disabled>
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Durasi</label>
	                        	<input type="text" class="form-control" name="durasi" value="<?php echo $p['durasi'] ;?>" disabled>
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Total Bayar</label>
	                        	<input type="text" class="form-control" name="total" value="<?php echo number_format($p['total'],0,",",".") ;?>" disabled>
	                      	</div>

	                      	<div class="form-group">
	                            <label>Status</label>
	                            <select class="form-control" name="status">
	                            	<?php if ($p['status']=='Menunggu Konfirmasi'){?>	
		                                <option value="Menunggu Konfirmasi" selected>Menunggu Konfirmasi</option>
		                                <option value="Sudah Dibayar">Sudah Dibayar</option>
		                                <option value="Selesai">Selesai</option>
		                                <option value="Batal">Batal</option>
		                            <?php } else if ($p['status']=='Sudah Dibayar'){?>
		                            	<option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
		                                <option value="Sudah Dibayar" selected>Sudah Dibayar</option>
		                                <option value="Selesai">Selesai</option>
		                                <option value="Batal">Batal</option>
		                            <?php } else if ($p['status']=='Selesai'){?>
		                            	<option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
		                                <option value="Sudah Dibayar">Sudah Dibayar</option>
		                                <option value="Selesai" selected>Selesai</option>
		                                <option value="Batal">Batal</option>
		                            <?php } else {?>
		                            	<option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
		                                <option value="Sudah Dibayar" selected>Sudah Dibayar</option>
		                                <option value="Selesai">Selesai</option>
		                                <option value="Batal" selected>Batal</option>
		                            <?php } ?>
	                            </select>
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
mysqli_query($koneksi, "UPDATE transaksi SET status='$_POST[status]' where id_trans='$_POST[id_trans]'");

echo "<script type='text/javascript'>
      alert('Data Berhasil Diedit...!!!');
      </script>";
      echo "<meta http-equiv='refresh' content='0; index.php'>";
}
?>