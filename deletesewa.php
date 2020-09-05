<?php
include "koneksi.php";
mysqli_query($koneksi, "DELETE FROM booking where id_booking='$_GET[id]'");

echo "<script type='text/javascript'>
      alert('Data Berhasil DiHapus...!!!');
      </script>";
      echo "<meta http-equiv='refresh' content='0; detailsewa.php'>";
?>