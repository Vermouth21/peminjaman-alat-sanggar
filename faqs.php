<?php include "header.php";?>
<section class="wn__faq__area bg--white pt--80 pb--60">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="wn__accordeion__content">
							<h2>FAQS</h2>
							<p>Website kami memiliki fasilitas FAQs, sehingga sebelum anda menghubungi tim kami, anda bisa membaca dulu FAQs berikut ini. Semoga informasi yang kami berikan pada halaman ini bermanfaat bagi anda. </p>
						</div>
						<div id="accordion" class="wn_accordion" role="tablist">
							<?php
								$sql = mysqli_query($koneksi, "SELECT * FROM pertanyaan WHERE status='Posting'");
								while($data=mysqli_fetch_array($sql)){
								
							?>
						    <div class="card">
						        <div class="acc-header" role="tab" id="headingOne">
						          	<h5>
						                <a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">Q : <?php echo $data['pesan'];?> ?</a>
						          	</h5>
						        </div>
						        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
					            	<div class="card-body">A : <?php echo $data['jawaban'] ;?></div>
						        </div>
						    </div>
						    <?php  } ?>
						</div>
					</div> 
				</div> 
			</div> 
		</section>
		<!-- End Faq Area -->
<?php include "footer.php";?>