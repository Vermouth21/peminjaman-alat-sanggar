<?php include"header.php";?>

<?php
	include "koneksi.php";
	$p = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$_GET[id]'"));
?>
<!--body wrapper start-->
	<div class="wrapper">
		<!--Start Page Title-->
		<div class="page-title-box">
			<h4 class="page-title">Produk</h4>
			<div class="clearfix"></div>
		</div>

		<div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h2 class="header-title">Edit Produk</h2>
                    <div class="col-md-6">
	                    <form action="aksiedit.php" method="POST" enctype="multipart/form-data">
	                    	<div class="form-group" hidden="hidden">
	                        	<input type="text" class="form-control"name="id_produk" value="<?php echo $p['id_produk'];?>">
	                      	</div>
	                    	<div class="form-group">
	                        	<label>Nama Kategori</label>
	                        	<select class="form-control" name="id_kategori" id="id_kategori">
			                        <option>-- Pilih Kategori --</option>
			                        <?php
                                        include"koneksi.php";
                                        $g=mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori");
                                            while($rp=mysqli_fetch_array($g)){
                                            	if($p['id_kategori']==$rp['id_kategori']){
                                                    $select="selected";
                                                }else{
                                                    $select="";
                                                }
                                            echo"<option $select value='$rp[id_kategori]'>$rp[nama_kategori]</option>";
                                        }
                                    ?>
		                        </select>
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Nama Produk</label>
	                        	<input type="text" class="form-control" placeholder="Masukkan Nama Produk" name="nama_produk" value="<?php echo $p['nama_produk'] ;?>">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Harga</label>
	                        	<input type="text" class="form-control" placeholder="Masukkan Harga" name="harga" value="<?php echo $p['harga'] ;?>">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Deskripsi</label>
	                        	<input type="text" class="form-control" placeholder="Masukkan Deskripsi" name="deskripsi" value="<?php echo $p['deskripsi'] ;?>">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Jumlah</label>
	                        	<input type="text" class="form-control"  placeholder="Masukkan Jumlah" name="jumlah" value="<?php echo $p['jumlah'] ;?>"> *Dalam Satuan Set
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Gambar</label><br/>
	                        	<img src="../images/barang/<?php echo $p['gambar']; ?>" style="width: 50px;float: left;margin-bottom: 5px;">
	                        	<input type="file" class="form-control" name="gambar">
	                      	</div>

	                      	<button type="submit" class="btn btn-primary">Submit</button>
	                      	<button type="reset" class="btn btn-danger">Kembali</button>

	                    </form>
                	</div>
                </div>
            </div>
        </div>

	</div>
<!-- End Wrapper-->

<?php include"footer.php";?>
