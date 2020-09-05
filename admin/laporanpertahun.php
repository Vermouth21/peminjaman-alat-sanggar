<?php include"header.php";?>
<?php include"format.php";?>
<!--body wrapper start-->
	<div class="wrapper">
		<!--Start Page Title-->
		<div class="page-title-box">
			<h4 class="page-title">Laporan Perhari</h4>
			<div class="clearfix"></div>
		</div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <form class="form-horizontal" action="cetak_pertahun.php" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tahun</label>
                            <div class="col-sm-5">
                                <select class="form-control input-sm m-b-15" name="tahun">
                                    <option value="0" selected>-- Pilih Tahun --</option>
                                    <?php
                                        $mulai= date('Y') - 0;
                                        for($i = $mulai;$i<$mulai + 100;$i++){
                                            $sel = $i == date('Y');
                                            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pimpinan / Pemilik</label>
                            <div class="col-sm-5">
                                <input type="text" name="pimpinan" class="form-control input-sm m-b-15">
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" value="cetak" class="btn btn-primary">Print</button>                     
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include"koneksi.php";
                                    $no=1;
                                    $sql = mysqli_query($koneksi, "SELECT DISTINCT customer.id_customer, nama_lengkap, produk.id_produk, nama_produk, harga, transaksi.id_trans, tgl_awal, tgl_akhir, durasi, status, total, no_sewa FROM transaksi, customer, produk WHERE transaksi.id_customer=customer.id_customer AND transaksi.id_produk=produk.id_produk AND transaksi.status='Selesai'");
                                            
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