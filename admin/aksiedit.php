<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

  $id_produk = $_POST['id_produk'];
  $id_kategori = $_POST['id_kategori'];
  $nama_produk = $_POST['nama_produk'];
  $harga = $_POST['harga'];
  $deskripsi = $_POST['deskripsi'];
  $jumlah = $_POST['jumlah'];
  $gambar = $_FILES['gambar']['name'];
  
  if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); 
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   
    $nama_gambar_baru = 'foto_'.time().'.'.strtolower($x[1]);
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                move_uploaded_file($file_tmp, '../images/barang/'.$nama_gambar_baru); //memindah file gambar ke folder gambar

                   $query  = "UPDATE produk SET id_kategori='$id_kategori', nama_produk='$nama_produk', harga='$harga', deskripsi='$deskripsi', gambar='$nama_gambar_baru', jumlah='$jumlah'";
                    $query .= "WHERE id_produk = '$id_produk'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='dataproduk.php';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg atau png.');window.location='editproduk.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE produk SET id_kategori='$id_kategori', nama_produk='$nama_produk', harga='$harga', deskripsi='$deskripsi', jumlah='$jumlah'";
      $query .= "WHERE id_produk = '$id_produk'";
      $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {
          echo "<script>alert('Data berhasil diubah.');window.location='dataproduk.php';</script>";
      }
    }