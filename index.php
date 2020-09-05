<?php 
	include"header.php";
?>
        <!-- Start Slider area -->
        <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        </div>
        <!-- End Slider area -->
		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--30  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Selamat Datang Di Website <span class="color--theme">Sanggar Sabai Nan Aluih</span></h2>
							<p>Cari Kebutuhan Busana Tarian dan Tarian Tradisional ? </p>
							<p>Kami Punya Beberapa Pilihan Untuk Anda</p>
						</div>
					</div>
				</div>			        	

				<!-- Start Single Tab Content -->
				<div class="tab__container">
	        		<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        			<div class="row">
	        				<!-- Start Single Product -->
	        				<?php
								$sql = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_produk");
								while($data=mysqli_fetch_array($sql)){
								
							?>
		        			<div class="product product__style--3 col-lg-3 col-md-4 col-sm-6 col-12">
			        			<div class="product__thumb">
									<a class="first__img" href="booking.php?id=<?php echo $data['id_produk']; ?>"><img src="images/barang/<?php echo $data['gambar']; ?>"></a>
									<a class="second__img animation1" href="booking.php?id=<?php echo $data['id_produk']; ?>"><img src="images/barang/<?php echo $data['gambar']; ?>" alt="product image"></a>
								</div>
								<div class="product__content content--center">
									<h4><a href="booking.php?id=<?php echo $data['id_produk']; ?>"><?php echo $data['nama_produk'];?></a></h4>
									<ul class="prize d-flex">
										<li>Rp. <?php echo number_format($data['harga'],0,",",".");?></li>
									</ul>
									<div class="action">
										<div class="actions_inner">
											<ul class="add_to_links">
												<li><a class="cart" href="booking.php?id=<?php echo $data['id_produk']; ?>"><i class="bi bi-shopping-bag4"></i></a></li>
											</ul>
										</div>
									</div>
								</div>								
		        			</div>
		        			<?php  } ?>
		        		</div>
		        	</div>
		        </div>
		        
		       	<!-- End Single Product -->
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		
<?php include"footer.php";?>