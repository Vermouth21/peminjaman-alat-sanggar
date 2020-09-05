<?php
  include "header.php";
?>
<?php
include"koneksi.php";
$sql = mysqli_query($koneksi, "SELECT COUNT(*) AS booking FROM booking");
$result = mysqli_fetch_array($sql);

echo '<!--body wrapper start-->
  <div class="wrapper">
    <!--Start Page Title-->
      <div class="page-title-box">
        <h4 class="page-title">Dashboard</h4>
        <div class="clearfix"></div>
      </div>
    <!--End Page Title-->                 
    <!--Start row-->
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-4">
            <div class="analytics-box white-box">
              <h3>Menunggu Pembayaran</h3>
              <div class="analytics-info">
                <div class="analytics-stats">
                '.$result['booking'] ;?>
                </div><br/></br></br>
                <a href="datasewabayar.php">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
                </a>
              </div>
            </div>
          </div> 
          <!-- /analytics-box-->
<?php
include"koneksi.php";
$sql = mysqli_query($koneksi, "SELECT status,COUNT(*) AS status FROM transaksi WHERE status='Menunggu Konfirmasi'");
$result = mysqli_fetch_array($sql);

echo '
          <div class="col-md-4">
            <div class="analytics-box white-box">
              <h3>Menunggu Konfirmasi</h3>
              <div class="analytics-info">
                <div class="analytics-stats">
                '.$result['status'];?>
                </div><br/></br></br>
                <a href="datasewakonfirmasi.php">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
                </a>                
              </div>
            </div>
          </div> 
          <!-- /analytics-box-->
          <?php
include"koneksi.php";
$sql = mysqli_query($koneksi, "SELECT status,COUNT(*) AS status FROM transaksi WHERE status='Sudah Dibayar'");
$result = mysqli_fetch_array($sql);

echo '
          <div class="col-md-4">
            <div class="analytics-box white-box">
              <h3>Belum Dikembalikan</h3>
              <div class="analytics-info">
                <div class="analytics-stats">
                '.$result['status'];?>
                </div><br/></br></br>
                <a href="datasewakembali.php">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
                </a>                
              </div>
            </div>
          </div> 
          <!-- /analytics-box-->
<?php
include"koneksi.php";
$sql = mysqli_query($koneksi, "SELECT status,COUNT(*) AS status FROM transaksi WHERE status='Selesai'");
$result = mysqli_fetch_array($sql);

echo '
          <div class="col-md-4">
            <div class="analytics-box white-box">
              <h3>Total Sewa</h3>
              <div class="analytics-info">
                <div class="analytics-stats">
                '.$result['status'];?>
                </div><br/></br></br>
                <a href="datasewaselesai.php">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
                </a>                
              </div>
            </div>
          </div> 
          <!-- /analytics-box-->
<?php
include"koneksi.php";
$sql = mysqli_query($koneksi, "SELECT COUNT(*) AS customer FROM customer");
$result = mysqli_fetch_array($sql);

echo '
          <div class="col-md-4">
            <div class="analytics-box white-box">
              <h3>Total Customer</h3>
              <div class="analytics-info">
                <div class="analytics-stats">
                '.$result['customer'];?>
                </div><br/></br></br>
                <a href="datacustomer.php">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
                </a>                
              </div>
            </div>
          </div> 

<?php
include"koneksi.php";
$sql = mysqli_query($koneksi, "SELECT COUNT(*) AS produk FROM produk");
$result = mysqli_fetch_array($sql);

echo '
          <div class="col-md-4">
            <div class="analytics-box white-box">
              <h3>Jumlah Produk</h3>
              <div class="analytics-info">
                <div class="analytics-stats">
                '.$result['produk'];?>
                </div><br/></br></br>
                <a href="dataproduk.php">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
                </a>                
              </div>
            </div>
          </div> 
<?php
include"koneksi.php";
$sql = mysqli_query($koneksi, "SELECT COUNT(*) AS kategori FROM kategori");
$result = mysqli_fetch_array($sql);

echo '
          <div class="col-md-4">
            <div class="analytics-box white-box">
              <h3>Jumlah Kategori</h3>
              <div class="analytics-info">
                <div class="analytics-stats">
                '.$result['kategori'];?>
                </div><br/></br></br>
                <a href="datakategori.php">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
                </a>                
              </div>
            </div>
          </div> 
<?php
include"koneksi.php";
$sql = mysqli_query($koneksi, "SELECT COUNT(*) AS pertanyaan FROM pertanyaan");
$result = mysqli_fetch_array($sql);

echo '
          <div class="col-md-4">
            <div class="analytics-box white-box">
              <h3>Jumlah Pertanyaan</h3>
              <div class="analytics-info">
                <div class="analytics-stats">
                '.$result['pertanyaan'];?>
                </div><br/></br></br>
                <a href="datapertanyaan.php">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
                </a>                
              </div>
            </div>
          </div> 

        </div>                       
      </div>
    </div>
    <!--End row-->                
  </div>
<!-- End Wrapper-->

<?php include"footer.php" ;?>