

<?php ob_start();


require_once "../config/config.php";

?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<style>body{font-size: 16px;color: black;}</style>
<title>Title</title>
</head>
<body>
<table border="1" width="50%">
            <tr>
                <th>No</th>
                <th>No. Surat</th>
                <th>Pegawai</th>
                <th>Perihal</th>
                <th>Jangka Waktu</th>
                <th>Dari Tanggal</th>
                <th>Sampai Tanggal</th>
                <th>Tanggal Surat</th>
            </tr>
        
      
                            <tr>
  
                            <?php 
                            
                            $no = 1;
                            
                    $query = mysqli_query($con,"select * from tb_spt");
                            while($data = mysqli_fetch_array($query)){  ?>
<tr>
                           
                                <td><?=$no++?></td>
                                <td><?=$data['no_surat_spt']?></td>
                                <td>
                                    <?php
                                    $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_surat_pegawai INNER JOIN tb_pegawai ON tb_surat_pegawai.id_pegawai = tb_pegawai.id_pegawai WHERE id_spt = '$data[id_spt]'") or die (mysqli_error($con));
                                    while ($data_spt = mysqli_fetch_array($sql_pegawai)) {
                                        echo $data_spt['nama_pegawai']."<br>";
                                    }
                                    ?>
                                </td>
                                <td><?=$data['perihal']?></td>
                                <td><?=$data['jangka_waktu']?></td>
                                <td><?=tgl_indo($data['dari_tgl'])?></td>
                                <td><?=tgl_indo($data['sampai_tgl'])?></td>
                                <td><?=tgl_indo($data['tgl_surat'])?></td>
                              
                     
                            </tr>
                     <?php   } ?>
                        
</body>
</html>
<?php 

$html = ob_get_clean(); 
use Dompdf\Dompdf; 
require_once '../dompdf/dompdf/autoload.inc.php'; 
$dompdf = new Dompdf(); 
$dompdf->loadHtml($html); 
$dompdf->setPaper('A4', 'landscape'); 
$dompdf->render(); 
$dompdf->stream(); 
?>