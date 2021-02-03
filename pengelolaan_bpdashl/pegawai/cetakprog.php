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
<table style="width: 100%;">
    <tbody>
      <tr>
        <td rowspan="3" style="width: 10%;">
          <div style="text-align: center;">
            <img style="width:80px" src="../assets/bpdas.png">
          </div>
        </td>
        <td style="width: 82.4441%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 16px;"><strong>KEMENTERIAN LINGKUNGAN HIDUP DAN KEHUTANAN</strong></span></div>
        </td>
      </tr>
      <tr>
        <td style="width: 82.4441%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">DIREKTORAT JENDERAL PENGENDALIAN DAERAH ALIRAN SUNGAI DAN HUTAN LINDUNG</span></div>
        </td>
      </tr>
      <tr>
        <td style="width: 82.4441%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 16px;"><strong>BALAI PENGELOLAAN DAERAH ALIRAN SUNGAI DAN HUTAN LINDUNG BARITO</strong></span></div>
        </td>
      </tr>
    </tbody>
  </table>
  <hr>
  <div style="text-align: center; line-height: 1;">
    <br>
  </div>
  <table style="width: 100%;">
    <tbody>
      <tr>
        <td style="width: 100.0000%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px;"><strong>PEGAWAI SEKSI PROGRAM</strong></span></div>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
<table border="1" width="100%">
<tr>
                    <th>No</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Pangkat</th>
                        <th>Seksi</th>
                        <th>No Telepon</th>
                        <th>Suami/Istri</th> 
                        <th>Anak</th> 
                        <th>Alamat</th> 
                        <th>Eselon</th>
                        <th>Foto</th>                       
                    </tr>
                    <?php    
                    $id = @$_GET['id'];                            
                    $no = 1; 
                    $query = "SELECT * FROM tb_pegawai
                            INNER JOIN tb_pangkat ON tb_pegawai.id_pangkat = tb_pangkat.id_pangkat
                            INNER JOIN tb_eselon ON tb_pegawai.id_eselon = tb_eselon.id_eselon
                            where seksi = 'Program'";                                   
                    $sql_pegawai = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_pegawai)) { ?>
                            <tr>
                            <td><?=$no++?></td>
                                <td><?=$data['nip']?></td>
                                <td><?=$data['nama_pegawai']?></td>
                                <td><?=$data['jenis_kelamin']?></td>
                                <td><?=$data['jabatan']?></td>
                                <td><?=$data['pangkat']?></td>
                                <td><?=$data['seksi']?></td>
                                <td><?=$data['no_hp']?></td>
                                <td><?=$data['istri']?></td>
                                <td><?=$data['anak']?></td>
                                <td><?=$data['alamat']?></td>
                                <td><?=$data['eselon']?></td>  
                                <td><img src="../assets/img/<?=$data['foto']?>" width="120px"></td>
                            </tr>
                            
                    <?php
                    }                    
                    ?>
    </table>
              <br><br>
<table style="width: 100%;">
    <tbody>
      <tr>
        <td style="width: 60.7573%;">
          <br>
        </td>
        <td style="width: 13%;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">Yang mengetahui, Kepala Balai</span>
          <br>
        </td>
      </tr>
      
      <tr>
        <td style="width: 60.7573%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
        <td style="width: 19.4492%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
        <td style="width: 19.6213%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
      </tr>
      <tr>
        <td style="width: 60.7573%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
        <td style="width: 19.4492%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
        <td style="width: 19.6213%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
      </tr>
      <tr>
        <td style="width: 60.7573%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
        <td style="width: 19.4492%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
        <td style="width: 19.6213%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
      </tr>
      <tr>
        <td style="width: 60.7573%;">
          <br>
        </td>
        <td colspan="2" style="width: 39.0706%;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">Dr. M. Zainal Arifin, S.Hut. M.Si</span></td>
      </tr>
      <tr>
        <td style="width: 60.7573%;">
          <br>
        </td>
        <td colspan="2" style="width: 39.0706%;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">NIP. 19710927 199803 1 005</span></td>
      </tr>
    </tbody>
  </table>          
</body>
</html>
<?php 

$html = ob_get_clean(); 
use Dompdf\Dompdf; 
require_once '../dompdf/dompdf/autoload.inc.php'; 
$dompdf = new Dompdf(); 
$dompdf->loadHtml($html); 
$dompdf->setPaper('legal', 'landscape'); 
$dompdf->render(); 
$dompdf->stream(); 
?>