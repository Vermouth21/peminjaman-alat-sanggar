<?php
include "koneksi.php";
mysqli_query($koneksi, "DELETE FROM customer where id_customer='$_GET[id]'");

echo "<script type='text/javascript'>
      alert('Data Berhasil DiHapus...!!!');
      </script>";
      echo "<meta http-equiv='refresh' content='0; datacustomer.php'>";
?>