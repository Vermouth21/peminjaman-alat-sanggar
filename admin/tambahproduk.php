<?php include"header.php";?>

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
                    <h2 class="header-title">Tambah Produk</h2>
                    <div class="col-md-6">
	                    <form action="" method="post" enctype="multipart/form-data">
	                    	<div class="form-group">
	                        	<label>Nama Kategori</label>
	                        	<select class="form-control" name="id_kategori" id="id_kategori">
			                        <option>-- Pilih Kategori --</option>
			                        <?php
                                        include"koneksi.php";
                                        $g=mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori");
                                            while($rp=mysqli_fetch_array($g)){
                                            echo"<option value='$rp[id_kategori]'>$rp[nama_kategori]</option>";
                                        }
                                    ?>
		                        </select>
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Nama Produk</label>
	                        	<input type="text" class="form-control"  placeholder="Masukkan Nama Produk" name="nama_produk">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Harga</label>
	                        	<input type="text" class="form-control"  placeholder="Masukkan Harga" name="harga">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Deskripsi</label>
	                        	<input type="text" class="form-control"  placeholder="Masukkan Deskripsi" name="deskripsi">
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Jumlah</label>
	                        	<input type="text" class="form-control"  placeholder="Masukkan Jumlah" name="jumlah"> *Dalam Satuan Set
	                      	</div>

	                      	<div class="form-group">
	                        	<label>Gambar</label>
	                        	<input type="file" class="form-control" name="gambar">
	                      	</div>

	                      	<button type="submit" class="btn btn-primary">Submit</button>
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
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id_kategori   = $_POST['id_kategori'];
  $nama_produk   = $_POST['nama_produk'];
  $harga     = $_POST['harga'];
  $deskripsi    = $_POST['deskripsi'];
  $jumlah    = $_POST['jumlah'];
  $gambar = $_FILES['gambar']['name'];

//cek dulu jika ada gambar produk jalankan coding ini
if($gambar != ""){
  $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];   
  $nama_gambar_baru = 'foto_'.time().'.'.strtolower($x[1]); //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) == TRUE){     
                move_uploaded_file($file_tmp, '../images/barang/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO produk (id_kategori,nama_produk,harga,deskripsi,gambar,jumlah) VALUES ('$id_kategori', '$nama_produk', '$harga', '$deskripsi', '$nama_gambar_baru', '$jumlah')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='dataproduk.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambahproduk.php';</script>";
            }
} else {
   $query = "INSERT INTO produk (id_kategori,nama_produk,harga,deskripsi,gambar,jumlah) VALUES ('$id_kategori', '$nama_produk', '$harga', '$deskripsi', null, '$jumlah')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='dataproduk.php';</script>";
                  }
}