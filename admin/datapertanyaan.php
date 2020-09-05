<?php include"header.php";?>
<?php include"format.php";?>
<!--body wrapper start-->
	<div class="wrapper">
		<!--Start Page Title-->
		<div class="page-title-box">
			<h4 class="page-title">Pertanyaan</h4>
			<div class="clearfix"></div>
		</div>

		<div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table id="example" class="display table">
                            <thead>
                                <tr>
                                    <th width="5px">No</th>
                                    <th>Pesan</th>
                                    <th>Tanggal Dikirim</th>
                                    <th>Status</th>
                                    <th width="14%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include"koneksi.php";
                                    $sql = mysqli_query($koneksi, "SELECT * FROM pertanyaan");
                                    $no=1;
                                    while($data = mysqli_fetch_array($sql)){
                                ?>
                                <tr>
                                    <td width="5px"><?php echo $no ;?></td>
                                    <td><?php echo $data['pesan'];?></td>
                                    <td><?php echo format_indo($data['tgl_post']);?></td>
                                    <td><?php echo $data['status'];?></td>
                                    <td width="14%">
                                        <a href="editpertanyaan.php?id=<?php echo $data['id_pertanyaan']; ?>" class="btn btn-info"> Edit</a>
                                        <a href="deletepertanyaan.php?id=<?php echo $data['id_pertanyaan']; ?>" class="btn btn-danger" id="alertHapus"> Hapus</a>
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