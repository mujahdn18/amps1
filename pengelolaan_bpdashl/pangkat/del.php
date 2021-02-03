<?php
    require_once "../config/config.php";

    mysqli_query($con, "DELETE FROM tb_pangkat WHERE id_pangkat = '$_GET[id]'") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
?>