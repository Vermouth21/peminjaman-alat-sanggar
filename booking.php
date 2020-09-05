<?php 
include "header.php";
;?>
<!-- Start main Content -->
<?php
error_reporting(E_ALL^ (E_NOTICE|E_WARNING));
include"koneksi.php";
session_start();
    if (!isset($_SESSION['id_customer'])) {
        echo"<script>window.location.assign('akun.php')</script>";
    }
?>
		<?php
			$query = mysqli_query($koneksi, "select * from produk where id_produk = '$_GET[id]'");
			$data = mysqli_fetch_array($query);
		?>	
        <div class="maincontent bg--white pt--80 pb--55">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12">
        				<div class="wn__single__product">
        					<div class="row">
        						<div class="col-lg-6 col-12">
		        					<img src="images/barang/<?php echo $data['gambar'];?>" alt="" width="450px" height="500px">	
        						</div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">
        								<h1><?php echo $data['nama_produk'];?></h1>
        							
        								<div class="price-box">
        									<span>Rp. <?php echo number_format($data['harga'],0,",",".");?></span>
        								</div>
										<div class="product__overview">
        									<p><?php echo $data['deskripsi'];?></p>
        								</div>
        								
        							</div>
        						</div>
        					</div>
        				</div>                                
        			</div>
                    <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                        <div class="shop__sidebar">
                            <aside class="wedget__categories poroduct--cat">
                            <h3 class="wedget__title">Pembookingan</h3>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tanggal Mulai</label>
                                    <div class="input-group date">
                                    <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Berakhir</label>
                                    <div class="input-group date">
                                    <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" /> 
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Penyewaan</label>
                                    <input type="text" name="jumlah" class="form-control" id="selisih"/>  
                                </div>
                                <div class="form__btn">
                                    <button type="submit" value="cek" name="cek" style="border: 2px solid gray;background-color: #f44336; font-size: 20px;padding: 10px 49px;color: white;display: inline-block;border-radius: 8px;">Cek Ketersediaan</button><br/><br/>
                                </div>
                            </form>
                            </aside>
                        </div>
                    </div>
        		</div>
        	</div>
        </div>
        <!-- End main Content -->
<?php include "footer.php" ;?>
<?php
include "koneksi.php";
if(isset($_POST['cek'])){
    $id_customer = $_SESSION['id_customer'];
    $id_produk = $_GET['id'];
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $durasi = $_POST['durasi'];
    $jumlah = $_POST['jumlah'];

    $awal = date_create($tgl_awal);
    $akhir =  date_create($tgl_akhir);
    $diff = date_diff($awal, $akhir);
    $durasi = $diff->format("%R%a");

    $substr = substr($durasi,1);
    
    $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_produk='$id_produk' AND tgl_awal = '$tgl_awal' AND tgl_akhir='$tgl_akhir'"));
    if($cek > 0){
        echo "<script>alert('Barang Sudah Ada Yang Booking');window.location='index.php'</script>";
    }else{
        mysqli_query($koneksi, "INSERT INTO booking VALUES (
                    '',
                    '$id_customer',
                    '$id_produk',
                    '$tgl_awal',
                    '$tgl_akhir',
                    '$substr',
                    '$jumlah',
                    NOW(),
                    'Menunggu Pembayaran')");

            echo"<script>alert('Data Berhasil Disimpan, Silahkan Cetak Detail Sewa!!!');window.location.href='detailsewa.php'</script>";
    }
}
?>