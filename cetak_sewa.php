<?php
include"koneksi.php";
session_start();
    if (!isset($_SESSION['id_customer'])) {
        echo"<script>window.location.assign('index.php')</script>";
    }
?>

<html>
<head>
<title>Sanggar Sabai Nan Aluih</title>

</head>
<body style='font-family:tahoma; font-size:8pt;' onload="javascript:window.print()">

<center><br><br>
<br><br>
<table>
<h1 align ='center'>Sanggar Seni Sabai Nan Aluih</h1>
<h6 align ='center'>Jl. Kurao Pagang No.246,RT.01, Kurao Pagang, Kec. Nanggalo, Kota Padang Sumatera Barat</h6><hr width="80%" height="10%" align='center'>
</table>
<?php
  function format_indo($date){
    
      $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

      $tahun = substr($date, 0, 4);               
      $bulan = substr($date, 5, 2);
      $tgl   = substr($date, 8, 2);

      $result = $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun;
      return($result);
    }
include "koneksi.php";

$total=0;
$sql = "SELECT * FROM produk, customer, booking WHERE booking.id_produk=produk.id_produk and booking.id_customer=customer.id_customer and booking.id_booking='".$_GET['print']."'";
$hasil = mysqli_query($koneksi, $sql);
while($data=mysqli_fetch_array($hasil)){

  $tgl_awal = $data['tgl_awal'];
  $tgl_akhir = $data['tgl_akhir'];
  $tgl = $data['tgl'];

  $harga = array($data['harga']);
  $values = array_sum($harga);
  $total += $values * $data['durasi'];

?>
<table style='width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td style='vertical-align:top' width='30%' align='left'>
<center><b><span style='font-size:12pt'>DETAIL SEWA</span></b></center></br></br>
</td>
</table>
<table style='width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border = '0'>
  <?php
                                    include "koneksi.php";
                                    $query = "SELECT max(no_sewa) as idMaks FROM transaksi";
                                    $hasil = mysqli_query($koneksi, $query);
                                    $data1  = mysqli_fetch_array($hasil);
                                    $nim = $data1['idMaks'];

                                    //mengatur 6 karakter sebagai jumlah karakter yang tetap
                                    //mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
                                    $noUrut = (int) substr($nim, 6, 4);
                                    $noUrut++;

                                    //menjadikan 201353 sebagai 6 karakter yang tetap
                                    $char = "SNA0";
                                    //%03s untuk mengatur 3 karakter di belakang 201353
                                    $IDbaru = $char . sprintf("%04s", $noUrut);

                                    ?>
<td style='vertical-align:top' width='30%' align='left'>No Sewa</td><td>: <?php  echo  $IDbaru; ?></td>
</table>
<table style='width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td style='vertical-align:top' width='30%' align='left'>Nama Customer</td><td>: <?php echo $data['nama_lengkap']; ?></td>
</table>
<table style='width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td style='vertical-align:top' width='30%' align='left'>Produk</td><td>: <?php echo $data['nama_produk']; ?></td>
</table>
<table style='width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td style='vertical-align:top' width='30%' align='left'>Tanggal Mulai</td><td> : <?php echo format_indo($tgl_awal) ;?></td> 
</table>
<table style='width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td style='vertical-align:top' width='30%' align='left'>Tanggal Akhir</td><td> : <?php echo format_indo($tgl_akhir) ;?></td>
</table>
<table style='width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td style='vertical-align:top' width='30%' align='left'>Durasi</td><td> : <?php echo $data['durasi'] ;?> Hari</td> 
</table>
<table style='width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td style='vertical-align:top' width='30%' align='left'>Harga Produk (1 Hari)</td><td> : <?php echo "Rp ".number_format($data['harga'],0,",",".") ;?></td>
</table>
<table style='width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td style='vertical-align:top' width='30%' align='left'>Total Sewa</td><td> : <?php echo "Rp ".number_format($total,0,",",".") ;?></td>
</table>
<table style='width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td style='vertical-align:top' width='30%' align='left'>Status</td><td> : <?php echo $data['status'] ;?></td>
</table>
<table style='width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td style='vertical-align:top' width='30%' align='left'><b>*Silahkan Transfer <?php echo "Rp ".number_format($total,0,",",".") ;?> ke 3388-01-028216-53-5 a/n Juwita Maksimal Tanggal <?php echo format_indo($tgl) ;?></b></td></br>
</table>
</br>
<?php } ;?>
</center>
</body>
</html>