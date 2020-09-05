<?php include"header.php";?>
<?php include"format.php";?>
<!--body wrapper start-->
	<div class="wrapper">
		<!--Start Page Title-->
		<div class="page-title-box">
			<h4 class="page-title">Sewa Menunggu Konfirmasi</h4>
			<div class="clearfix"></div>
		</div>

		<div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table id="example" class="display table">
                            <thead>
                                <tr>
                                    <th width="3px">No</th>
                                    <th>No Sewa</th>
                                    <th>Nama Customer</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include"koneksi.php";
                                    $no=1;
                                    $sql = mysqli_query($koneksi, "SELECT DISTINCT customer.id_customer, nama_lengkap, produk.id_produk, nama_produk, harga, transaksi.id_trans, tgl_awal, tgl_akhir, durasi, status, total, no_sewa FROM transaksi, customer, produk WHERE transaksi.id_customer=customer.id_customer AND transaksi.id_produk=produk.id_produk AND transaksi.status='Menunggu Konfirmasi'");
                                            
                                        while ($query = mysqli_fetch_array($sql)){
                                            $durasi = $query ['durasi'];
                                            $status = $query ['status'];
                                            $nama_lengkap = $query ['nama_lengkap'];
                                            $harga = $query['harga'];
                                            $total = $query['total'];
                                ?>
                                <tr>
                                    <td width="5px"><?php echo $no ;?></td>
                                    <td><?php echo $query['no_sewa'] ;?></td>
                                    <td><?php echo $nama_lengkap ;?></td>
                                    <td><?php echo $query['nama_produk'] ;?></td>
                                    <td><?php echo format_indo($query['tgl_awal']) ;?></td>
                                    <td><?php echo format_indo($query['tgl_akhir']) ;?></td>
                                    <td>Rp. <?php echo number_format($total,0,",",".") ;?></td>
                                    <td><?php echo $status ;?></td>
                                    <td width="5%">
                                        <center><a href="edittrans.php?id=<?php echo $query['id_trans']; ?>"><i class="icon-note"></i></a>
                                        <a href="deletebooking.php?id=<?php echo $query['id_trans']; ?>" id="alertHapus"><i class="icon-trash" style="color: red;"></i></a></center>
                                    </td>
                                </tr>
                                <?php
                                    $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>                
	</div>
<!-- End Wrapper-->

<?php include"footer.php";?>