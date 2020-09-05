<?php
	error_reporting(E_ALL^ (E_NOTICE|E_WARNING));
	include"koneksi.php";
	include"format.php";
	session_start();
	    if (!isset($_SESSION['id_admin'])) {
	        echo"<script>window.location.assign('index.php')</script>";
	    }
	$bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $pimpinan = $_POST['pimpinan'];
	echo"<body onLoad='javascript:window:print()'>";
?>
<?php if($bulan=="01"){ $bulan1="Januari";} ?>                      
<?php if($bulan=="02"){ $bulan1="Februari";} ?>                     
<?php if($bulan=="03"){ $bulan1="Maret";} ?>                        
<?php if($bulan=="04"){ $bulan1="April";} ?>                        
<?php if($bulan=="05"){ $bulan1="Mei";} ?>                      
<?php if($bulan=="06"){ $bulan1="Juni";} ?>                     
<?php if($bulan=="07"){ $bulan1="Juli";} ?>                     
<?php if($bulan=="08"){ $bulan1="Agustus";} ?>                      
<?php if($bulan=="09"){ $bulan1="September";} ?>                        
<?php if($bulan=="10"){ $bulan1="Oktober";} ?>                      
<?php if($bulan=="11"){ $bulan1="November";} ?>                     
<?php if($bulan=="12"){ $bulan1="Desember";} ?> 

<table  style='width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<h3 style="margin:10px auto; width:100%; text-align:center;">Sanggar Seni Sabai Nan Aluih</h3>
<h5 style="margin:10px auto; width:100%; text-align:center;">Jl. Kurao Pagang No.246,RT.01, Kurao Pagang, Kec. Nanggalo, Kota Padang Sumatera Barat</h5>
<hr width="37%" align='center'>
<h3 style="margin:10px auto; width:100%; text-align:center;">Laporan Perbulan</h3>
<h3 style="margin:10px auto; width:100%; text-align:center;">Bulan : <?php echo $bulan1 ;?> <?php echo $tahun;?></h3>

</table>

<table align="center" border="1" cellspacing='0'style='width:900px; font-size:11pt; font-family:calibri;  border-collapse: collapse;' >
	<tr align="center">
		<th>No</th>
        <th>No Sewa</th>
        <th>Nama Customer</th>
        <th>Nama Barang</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Durasi</th>
        <th>Status</th>
        <th>Total</th>        
	</tr>
	<?php
        include"koneksi.php";
        $no=1;
        $total=0;

        $sql = mysqli_query($koneksi, "SELECT DISTINCT customer.id_customer, nama_lengkap, produk.id_produk, nama_produk, harga, transaksi.id_trans, tgl_awal, tgl_akhir, durasi, status, total, no_sewa FROM transaksi, customer, produk WHERE transaksi.id_customer=customer.id_customer AND transaksi.id_produk=produk.id_produk AND transaksi.status='Selesai' AND month(transaksi.tgl)='$bulan' and year(transaksi.tgl)='$tahun'");
                                            
        while($query = mysqli_fetch_array($sql)){
        	$total = array($query['total']);
			$values = array_sum($total);
			$total1 += $values;
    ?>
    <tr align="center">
    	<td><?php echo $no ;?></td>
        <td><?php echo $query['no_sewa'] ;?></td>          
        <td><?php echo $query['nama_lengkap'] ;?></td>          
        <td><?php echo $query['nama_produk'] ;?></td>          
        <td><?php echo format_indo($query['tgl_awal']) ;?></td>          
        <td><?php echo format_indo($query['tgl_akhir']) ;?></td>          
        <td><?php echo $query['durasi'] ;?></td>          
        <td><?php echo $query['status'] ;?></td>          
        <td><?php echo "Rp ".number_format($query['total'],0,",",".") ;?></td>          
    </tr>
    <?php
    $no++;
    }
    ?>
    <tr align="right">
		<td colspan="8">TOTAL </td><td align="right"><?php echo "Rp ".number_format($total1,0,",",".") ?> </td>
	</tr>
	</table>
 <br/><br/>
	<table align="right" style='50px; font-size:10pt; text-align: left; width: 60%'>
        <td style='border: 0px solid black; padding: 20px; text-align: left; width: 60%'></td>
        <td align="center">Padang, <?php echo date('d-m-Y');?><br/>Pemimpin Sanggar,
        <br/><br/><br/><br/>( <?php echo $pimpinan ;?> )</td>
        <td style='border: 0px solid black; padding: 20px; text-align: left; width: 1%'></td>
    </table>


<h3 style="margin:10px auto; width:100%; text-align:center; color:#09c;">
<tr>
<td></td>
<td></td>
<td>
<br><br>

</td>
</tr>
</h3>