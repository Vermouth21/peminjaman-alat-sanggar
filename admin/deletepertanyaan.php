<?php
include "koneksi.php";
mysqli_query($koneksi, "DELETE FROM pertanyaan where id_pertanyaan='$_GET[id]'");

echo "<script type='text/javascript'>
      alert('Data Berhasil DiHapus...!!!');
      </script>";
      echo "<meta http-equiv='refresh' content='0; datapertanyaan.php'>";
?>