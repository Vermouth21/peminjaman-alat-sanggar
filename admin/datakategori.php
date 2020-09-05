<?php include"header.php";?>

<!--body wrapper start-->
	<div class="wrapper">
		<!--Start Page Title-->
		<div class="page-title-box">
			<h4 class="page-title">Kategori</h4>
			<div class="clearfix"></div>
		</div>

		<div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h2 class="header-title"><a href="tambahkategori.php" class="btn btn-primary">Tambah Kategori</a></h2>
                    <div class="table-responsive">
                        <table id="example" class="display table">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="50%">Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		include "koneksi.php";
                            		$sql = mysqli_query($koneksi, "SELECT * FROM kategori");
                            		$no = 1;
                            		while($data = mysqli_fetch_array($sql)){
                            	?>
                                <tr>
                                    <td width="5%"><?php echo $no ;?></td>
                                    <td width="50%"><?php echo $data['nama_kategori'];?></td>
                                    <td>
                                    	<a href="editkategori.php?id=<?php echo $data['id_kategori']; ?>" class="btn btn-info"> Edit</a>
                                        <a href="deletekategori.php?id=<?php echo $data['id_kategori']; ?>" class="btn btn-danger" id="alertHapus"> Hapus</a>
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