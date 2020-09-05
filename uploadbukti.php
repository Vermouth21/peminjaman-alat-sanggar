<?php include "header.php";?>
<?php
error_reporting(E_ALL^ (E_NOTICE|E_WARNING));
include"koneksi.php";
session_start();
    if (!isset($_SESSION['id_customer'])) {
        echo"<script>window.location.assign('akun.php')</script>";
    }
?>
		<div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <?php
                    include "koneksi.php";

                    $sql = "SELECT * FROM produk, customer, booking WHERE booking.id_produk=produk.id_produk and booking.id_customer=customer.id_customer and booking.id_booking='".$_GET['id']."'";
                    $hasil = mysqli_query($koneksi, $sql);
                    while($data=mysqli_fetch_array($hasil)){

                    ?>
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <h3>Upload Bukti Pembayaran</h3><br/>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="my__account__wrapper">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php
                                    include "koneksi.php";
                                    $query = "SELECT max(no_sewa) as idMaks FROM transaksi";
                                    $hasil = mysqli_query($koneksi, $query);
                                    $data1  = mysqli_fetch_array($hasil);
                                    $nim = $data1['idMaks'];

                                    //mengatur 6 karakter sebagai jumlah karakter yang tetap
                                    //mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
                                    $noUrut = (int) substr($nim, 6, 4);
                                    $noUrut++;

                                    //menjadikan 201353 sebagai 6 karakter yang tetap
                                    $char = "SNA0";
                                    //%03s untuk mengatur 3 karakter di belakang 201353
                                    $IDbaru = $char . sprintf("%04s", $noUrut);

                                    ?>
                                <div class="account__form">
                                    <div class="input__box">
                                        <label>Nama</label>
                                        <input type="text" name="nama" value="<?php echo $data['nama_lengkap'] ;?>" disabled>
                                    </div>
                                    <div class="input__box">
                                        <label>NIK</label>
                                        <input type="text" name="nik" value="<?php echo $data['nik'] ;?>" disabled>
                                    </div>
                                    <div class="input__box">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" value="<?php echo $data['alamat'] ;?>" disabled>
                                    </div>
                                </div>                        
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="my__account__wrapper">
                                <div class="account__form">
                                    <div class="input__box">
                                        <label>No Sewa</label>
                                        <input type="text" value="<?php  echo  $IDbaru; ?>" name="no_sewa" disabled></li>
                                        <input type="text" value="<?php  echo  $IDbaru; ?>" name="no_sewa" hidden></li>
                                    </div>
                                    <div class="input__box">
                                        <label>Email</label>
                                        <input type="text" name="email" value="<?php echo $data['email'] ;?>" disabled>
                                    </div>

                                    <div class="input__box">
                                        <label>Upload Bukti Pembayaran<span>*</span></label>
                                        <input type="file" name="gambar">
                                    </div>

                                    <div class="form__btn">
                                        <button type="submit">Upload</button>
                                    </div>
                                    <div class="input__box">
                                        <input type="text" name="id_produk" value="<?php echo $data['id_produk'];?>" hidden>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                    <?php } ?>
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                                     
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Gambar</th>
                                            <th class="product-name">Produk</th>
                                            <th class="product-price">Harga</th>
                                            <th width="10%">Tanggal</th>
                                            <th width="8%">Tanggal Kembali</th>
                                            <th class="product-quantity" width="3%">Sewa</th>
                                            <th class="product-subtotal" width="11%">Total</th>
                                            <th width="15%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
											include "koneksi.php";
											$total = 0;
											$harga = mysqli_query($koneksi, "select * from booking where id_booking='$_GET[id]'");
											
											while ($query = mysqli_fetch_array($harga)){
											
											$id_produk = $query['id_produk'];
                                            $tgl_awal = $query['tgl_awal'];
                                            $tgl_akhir = $query['tgl_akhir'];
											$durasi = $query ['durasi'];
											$status = $query ['status'];
                                            $jumlah = $query ['jumlah'];
											$id_booking = $query ['id_booking'];
											
											$produk=mysqli_query($koneksi, "select * from produk where id_produk='$id_produk'");
											
											while ($harga_b= mysqli_fetch_array($produk)){
											
												$harga1 = array($harga_b['harga']);
												
												$nama_produk = $harga_b['nama_produk'];
												$stok   = $harga_b['jumlah'];
												$gambar 	= $harga_b['gambar'];
												
												$pp_harga = $harga_b['harga'];		
												$totalperbrg = $pp_harga * $durasi;
												
												$values = array_sum($harga1);
												$total += $values * $durasi;
                                                $stok_a = $stok - $jumlah; 
												
										?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="images/barang/<?php echo $gambar ?>" width="80px" height="100px" alt="product img"></a></td>
                                            <td class="product-name"><?php echo $nama_produk; ?></td>
                                            <td class="product-price"><span class="amount">Rp. <?php echo number_format($pp_harga,0,",",".");?></span></td>                            
                                            <td class="product-price"><span class="amount"> <?php echo $tgl_awal; ?></span></td>
                                            <td class="product-price"><span class="amount"> <?php echo $tgl_akhir; ?></span></td>
                                            <td class="product-price"><span class="amount"> <?php echo $durasi; ?></span></td>
                                            <td class="product-subtotal">Rp. <?php echo number_format($totalperbrg,0,",",".");?></td>
                                            <td class="product-name"><?php echo $status; ?></td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
        </div>
<?php include "footer.php";?>
<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

    // membuat variabel untuk menampung data dari form
    $id_booking   = $_GET['id'];
    $id_customer   = $_SESSION['id_customer'];
    $no_sewa   = $_POST['no_sewa'];

    $gambar = $_FILES['gambar']['name'];

    //cek dulu jika ada gambar produk jalankan coding ini
    if($gambar != ""){
      $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
      $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
      $ekstensi = strtolower(end($x));
      $file_tmp = $_FILES['gambar']['tmp_name'];   
      $nama_gambar_baru = 'Bukti_'.time().'.'.strtolower($x[1]); //menggabungkan angka acak dengan nama file sebenarnya
            if(in_array($ekstensi, $ekstensi_diperbolehkan) == TRUE){     
                    move_uploaded_file($file_tmp, 'admin/bukti/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                      $query = "INSERT INTO transaksi (id_booking, id_customer, id_produk, no_sewa,tgl_awal,tgl_akhir, durasi, tgl,jumlah,status,total,bukti) VALUES ('$id_booking', '$id_customer', '$id_produk', '$no_sewa','$tgl_awal','$tgl_akhir','$durasi',NOW(), '$jumlah','Menunggu Konfirmasi', '$totalperbrg', '$nama_gambar_baru')";
                      $result = mysqli_query($koneksi, $query);
                      // periska query apakah ada error
                      if(!$result){
                          die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                               " - ".mysqli_error($koneksi));
                      } else {
                        //tampil alert dan akan redirect ke halaman index.php
                        //silahkan ganti index.php sesuai halaman yang akan dituju
                        echo "<script>alert('Data berhasil diupload.');window.location='riwayatsewa.php';</script>";
                      }

                } else {     
                 //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='uploadbukti.php';</script>";
                }
    }else{
       $query = "INSERT INTO transaksi (id_booking, id_customer, id_produk, no_sewa,tgl_awal,tgl_akhir,durasi, tgl,jumlah,status,total,bukti) VALUES ('$id_booking', '$id_customer', '$id_produk', '$no_sewa','$tgl_awal','$tgl_akhir','$durasi',NOW(), '$jumlah','Menunggu Konfirmasi', '$totalperbrg', NULL)";
                      $result = mysqli_query($koneksi, $query);
                      // periska query apakah ada error
                      if(!$result){
                          die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                               " - ".mysqli_error($koneksi));
                      } else {
                        //tampil alert dan akan redirect ke halaman index.php
                        //silahkan ganti index.php sesuai halaman yang akan dituju
                        echo "<script>alert('Data berhasil diupload.');window.location='riwayatsewa.php';</script>";
                      }
    }

    mysqli_query($koneksi, "UPDATE produk SET jumlah='$stok_a' WHERE id_produk ='$id_produk'");  

    mysqli_query($koneksi, "DELETE FROM booking where id_booking='$_GET[id]'");
?>