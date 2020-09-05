<?php include "header.php";?>
		<div class="page-about about_area bg--white section-padding--lg">
			<div class="container">
        		<div class="row">
        			<div class="col-lg-8 col-12">
        				<div class="contact-form-wrap">
        					<h2 class="contact__title">Ada Pertanyaan ? Silahkan Isi Form Ini</h2>
                            <?php if(ISSET($_SESSION['id_customer'])) { ?>
                            <?php
                                include "koneksi.php";
                                $p = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM customer WHERE id_customer='$_SESSION[id_customer]'"));
                            ?>
                            <form action="" method="POST">
                                <div class="single-contact-form space-between">
                                    <input type="text" name="nama_lengkap" value="<?php echo $p['nama_lengkap'] ;?>" placeholder="Nama Lengkap*">
                                </div>
                                <div class="single-contact-form space-between">
                                    <input type="email" name="email" value="<?php echo $p['email'] ;?>" placeholder="Email*">
                                </div>
                                <div class="single-contact-form">
                                    <input type="text" name="alamat" value="<?php echo $p['alamat'] ;?>" placeholder="Alamat *">
                                </div>
                                <div class="single-contact-form message">
                                    <textarea name="pesan" placeholder="Type your message here.."></textarea>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" value="submit" name="submit">Send Message</button>
                                </div>
                            </form>
                            <?php } else { ?>
                            <form action="#" method="post">
                                <div class="single-contact-form space-between">
                                    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap*">
                                </div>
                                <div class="single-contact-form space-between">
                                    <input type="email" name="email" placeholder="Email*">
                                </div>
                                <div class="single-contact-form">
                                    <input type="text" name="alamat" placeholder="Alamat *">
                                </div>
                                <div class="single-contact-form message">
                                    <textarea name="pesan" placeholder="Type your message here.."></textarea>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" value="submit" name="submit">Send Message</button>
                                </div>
                            </form>
                            <?php } ?>
                        </div> 
                        <div class="form-output">
                            <p class="form-messege">
                        </div>
        			</div>
        			<div class="col-lg-4 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__address">
        					<h2 class="contact__title">Tentang Kami</h2>
        					<p>Sanggar Seni Sabai Nan Aluih</p>
        					<div class="wn__addres__wreapper">

        						<div class="single__address">
        							<i class="icon-location-pin icons"></i>
        							<div class="content">
        								<span>Alamat:</span>
        								<p>Jl. Kurao Pagang No.246,RT.01, Kurao Pagang, Kec. Nanggalo, Kota Padang Sumatera Barat</p>
        							</div>
        						</div>

        						<div class="single__address">
        							<i class="icon-phone icons"></i>
        							<div class="content">
        								<span>No Telp:</span>
        								<p>082388400115</p>
        							</div>
        						</div>

        						<div class="single__address">
        							<i class="icon-envelope icons"></i>
        							<div class="content">
        								<span>Instagram:</span>
        								<p>sabainanaluih</p>
        							</div>
        						</div>

        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End About Area -->
<?php include "footer.php";?>
<?php
error_reporting(0);
include"koneksi.php";
$id_customer = $_SESSION['id_customer'];
$pesan = $_POST['pesan'];

if(isset($_POST['submit'])){
    mysqli_query($koneksi, "INSERT INTO pertanyaan (id_pertanyaan, id_customer, pesan, jawaban, tgl_post, status) VALUES (
        '',
        '$id_customer',
        '$pesan',
        '',
        NOW(),
        'Belum Dipost')");
    echo"<script>alert('Data Berhasil Disimpan!');window.location.href='tentang kami.php.'</script>";
}
?>
