<?php
require_once "../config/config.php";

mysqli_query($con, "DELETE FROM tb_pimpinan WHERE id_pimpinan = '$_GET[id]'") or die(mysqli_error($con));
echo "<script>window.location='data.php'</script>";
?>