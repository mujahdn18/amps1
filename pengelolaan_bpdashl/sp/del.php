<?php
    require_once "../config/config.php";

    mysqli_query($con, "DELETE FROM tb_sp WHERE id_sp = '$_GET[id]'") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
?>