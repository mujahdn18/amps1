<?php ob_start();

require_once "../config/config.php";

?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<style>body{font-size: 16px;color: black;}</style>
<title>SLIP GAJI</title>
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
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px;"><strong>REKAPITULASI GAJI PEGAWAI</strong></span></div>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
<table border="1" width="100%">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Gaji</th> 
                        <th>Nama Pegawai <br> NIP <br> Jabatan <br> Pangkat/Gol.</th>
                        <th>Gaji Pokok <br> TJ. Suami/Istri <br> TJ. Anak <br> Jumlah </th>
                        <th>TJ. Eselon <br>  TJ. Beras <br>  TJ. Pajak <br>  Gaji Kotor</th>  
                        <th>Pot. Pajak <br>  Pot. IWP 10% <br>  Pot. Taperum <br>  Jumlah Potongan</th>  
                        <th>Gaji Berish</th>                  
                    </tr>
                    <?php                    
                    $no = 1; 
                    $query = "SELECT * FROM tb_gaji
                            INNER JOIN tb_pegawai ON tb_gaji.id_pegawai = tb_pegawai.id_pegawai
                            INNER JOIN tb_eselon ON tb_pegawai.id_eselon = tb_eselon.id_eselon
                            INNER JOIN tb_pangkat ON tb_pegawai.id_pangkat = tb_pangkat.id_pangkat
                            ";                                 
                    $sql_gaji = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_gaji)) { ?>
                            <tr>
                                <td><?=$no++?></td>                                
                                <td><?=tgl_indo($data['tgl_gaji'])?></td> 
                                <td><?=$data['nama_pegawai']?> <br> <?=$data['nip']?> <br> <?=$data['jabatan']?> <br> <?=$data['pangkat']?></td>
                                <td align=right;><?=rupiah($data['gapok'])?><br><?=rupiah($data['tj_istri'])?><br><?=rupiah($data['tj_anak'])?><br><?=rupiah($data['jml_1'])?></td>
                                <td align=right;><?=rupiah($data['tunjangan'])?> <br> <?=rupiah($data['tj_beras'])?> <br> <?=rupiah($data['tj_pajak'])?> <br> <?=rupiah($data['jml_kotor'])?></td>
                                <td align=right;><?=rupiah($data['pot_pajak'])?> <br>   <?=rupiah($data['pot_iwp'])?> <br> <?=rupiah($data['pot_taperum'])?> <br> <?=rupiah($data['jml_pot'])?></td>
                                <td align=right;><?=rupiah($data['total_gaji'])?></td>   
                            </tr>
                    <?php
                    }                    
                    ?>
                    <?php 
                            $a = 0;
                            $sql = mysqli_query($con, "SELECT * FROM tb_gaji ORDER BY id_gaji
                            ") or die (mysqli_error($con));                    
                            while($data = mysqli_fetch_array($sql)) { 
                              $a++;
                              $total[$a] = $data['total_gaji']; 
                            }
                              $test = array_sum($total); {?>
                              
                              <tr>
                                <td colspan=6 align="center"> TOTAL GAJI BERSIH </td>      
                                <td align=right;><?=rupiah($test)?></td> 
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