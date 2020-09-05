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
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <h3>Detail Sewa</h3><br/>
                        <form action="cetak_sewa.php">               
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Produk</th>
                                            <th class="product-price">Harga</th>
                                            <th class="product-quantity" width="3%">Durasi</th>
                                            <th class="product-subtotal">Total</th>
                                            <th width="15%">Status</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
											include "koneksi.php";
											$total = 0;
											$id_customer=$_SESSION['id_customer'];
											 
											$harga = mysqli_query($koneksi, "select * from booking where id_customer='$id_customer'");
											
											while ($query = mysqli_fetch_array($harga)){
											
											$id_produk = $query['id_produk'];
											$durasi = $query ['durasi'];
											$status = $query ['status'];
											$id_booking = $query ['id_booking'];
											
											$produk=mysqli_query($koneksi, "select * from produk where id_produk='$id_produk'");
											
											while ($harga_b= mysqli_fetch_array($produk)){
											
												$harga1 = array($harga_b['harga']);
												
												$nama_produk = $harga_b['nama_produk'];
												
												$gambar 	= $harga_b['gambar'];
												
												$pp_harga = $harga_b['harga'];		
												$totalperbrg = $pp_harga * $durasi;
												
												$values = array_sum($harga1);
												$total += $values * $durasi; 
												
										?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="images/barang/<?php echo $gambar ?>" width="80px" height="100px" alt="product img"></a></td>
                                            <td class="product-name"><?php echo $nama_produk; ?></td>
                                            <td class="product-price"><span class="amount">Rp. <?php echo number_format($pp_harga,0,",",".");?></span></td>
                                            <td class="product-price"><span class="amount"> <?php echo $durasi; ?></span></td>
                                            <td class="product-subtotal">Rp. <?php echo number_format($totalperbrg,0,",",".");?></td>
                                            <td class="product-name"><?php echo $status; ?></td>
                                            <td>
                                            	<a href="cetak_sewa.php?print=<?php echo $id_booking; ?>" style="border: 2px solid gray;background-color: #0000ff;padding: 5px 10px; font-size: 15px;color: white;border-radius: 8px;">Cetak</a>
                                            	<a href="deletesewa.php?id=<?php echo $id_booking; ?>" style="border: 2px solid gray;background-color: #f44336;padding: 5px 10px; font-size: 15px;color: white;border-radius: 8px;">Batal</a>
                                            </td>
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