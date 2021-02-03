<?php
require_once "../config/config.php";
?>

<table border="1" width="100%">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIP</th>
        <th>Pangkat</th>
        <th>Alamat</th>
    </tr>
    <?php
    $no=1;
    $query="SELECT * FROM tb_pimpinan
            INNER JOIN tb_pangkat ON tb_pimpinan.id_pangkat=tb_pangkat.id_pangkat";
    $sql_pimpinan=mysqli_query($con, $query) or die(mysqli_error($con));
    while($data=mysqli_fetch_array($sql_pimpinan)){?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$data['nama_pimpinan']?></td>
            <td><?=$data['nip_pimpinan']?></td>
            <td><?=$data['pangkat']?></td>
            <td><?=$data['alamat_pimpinan']?></td>
        </tr>
    <?php
    }
    ?>
</table>
<?php
$html = ob_get_clean();
use Dompdf\Dompdf;
require_once '../dompdf/dompdf/autoload.inc.php';
$dompdf = new Dompdf();
$dompdf -> loadHtml($html);
$dompdf -> setPaper('A4', 'potrait');
$dompdf -> render();
$dompdf -> stream();
?>