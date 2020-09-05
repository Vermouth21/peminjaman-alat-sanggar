<?php include"header.php";?>

<!--body wrapper start-->
	<div class="wrapper">
		<!--Start Page Title-->
		<div class="page-title-box">
			<h4 class="page-title">Customer</h4>
			<div class="clearfix"></div>
		</div>

		<div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h2 class="header-title"><a href="tambahcustomer.php" class="btn btn-primary">Tambah Customer</a></h2>
                    <div class="table-responsive">
                        <table id="example" class="display table">
                            <thead>
                                <tr>
                                    <th width="5px">No</th>
                                    <th>Nama Customer</th>
                                    <th>NIK</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th width="14%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include"koneksi.php";
                                    $sql = mysqli_query($koneksi, "SELECT * FROM customer");
                                    $no=1;
                                    while($data = mysqli_fetch_array($sql)){
                                ?>
                                <tr>
                                    <td width="5px"><?php echo $no ;?></td>
                                    <td><?php echo $data['nama_lengkap'];?></td>
                                    <td><?php echo $data['nik'];?></td>
                                    <td><?php echo $data['email'];?></td>
                                    <td><?php echo $data['alamat'];?></td>
                                    <td width="14%">
                                        <a href="editcustomer.php?id=<?php echo $data['id_customer']; ?>" class="btn btn-info"> Edit</a>
                                        <a href="deletecustomer.php?id=<?php echo $data['id_customer']; ?>" class="btn btn-danger" id="alertHapus"> Hapus</a>
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