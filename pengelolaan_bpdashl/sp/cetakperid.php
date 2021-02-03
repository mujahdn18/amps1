<style type="text/css">
  @font-face {
    font-family: myFirstFont;
    src: url(fonts/ufonts.com_square721-bt-roman.ttf);
  }

  p, u, td{
    font-family: myFirstFont;
  }
</style>
<title>Surat Masuk</title>
<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
require_once "../config/config.php";?>
<?php
  $id = @$_GET['id'];
  $query = "SELECT * FROM tb_sp
            INNER JOIN tb_pegawai ON tb_sp.id_pegawai = tb_pegawai.id_pegawai
            WHERE id_sp = '$id'
            ";
  $sql_sp = mysqli_query($con, $query) or die (mysqi_error($con));
  $data = mysqli_fetch_array($sql_sp);
?>
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
  <br>
<table width="100%" border="0" >
<tr>
<td width="100%">Surat Peringatan</td>
</tr>
<tr>
<td>No : <?=$data['no_sp']?> <br><br><br></td>
</tr>
<tr>
<td>Surat peringatan ini dibuat oleh kantor BPDASHL Barito dan ditujukan kepada : <br><br></td>
</tr>
</table>
<table border="0" width="100%">
<tr>
<td width="10%">Nama</td>
<td width="3%">:</td>
<td width="87%"><?=$data['nama_pegawai']?> </td>
</tr>
<tr>
<td width="10%">NIP</td>
<td width="3%">:</td>
<td width="87%"><?=$data['nip']?> </td>
</tr>
<tr>
<td width="10%">Jabatan <br><br><br></td>
<td width="3%">: <br><br><br></td>
<td width="87%"><?=$data['jabatan']?> <br><br><br></td>
</tr>
</table>
<table width="100%" border="0" >
<tr>
<td width="100%">Surat peringatan ini di terbitkan berdasarkan kesalahan yang telah saudara <?=$data['nama_pegawai']?> 
lakukan. saudara <?=$data['keterangan']?>. <br><br></td>
</tr>
<tr>
<td width="100%">Oleh karena itu, kantor BPDASHL Barito akan memberikan surat peringatan pertama. Hal ini bertujuan untuk 
dapat memberikan arahan serta peringatan kepada saudara <?=$data['nama_pegawai']?>  agar mematuhi tata tertib kantor BPDASHL Barito dan tidak melakukan 
kesalahan lagi yang dapat merugikan kantor BPDASHL Barito. <br><br></td>
</tr>
<td width="100%">Demikian surat peringatan ini dibuat agar dapat diperhatikan dan ditaati oleh yang bersangkutan. <br><br><br><br><br></td>
</tr>
</tr>
<td width="100%" align="right">Banjarbaru, <?=tgl_indo($data['tgl_sp'])?><br><br><br></td>
</tr>
</table>
<table border="0" width="40%" align="left">
<tr>
<td align="center">Penerima SP, <br><br><br><br><br></td>
</tr>
<tr>
<td align="center"><?=$data['nama_pegawai']?></td>
</tr>
<tr>
<td align="center"><?=$data['jabatan']?></td>
</tr>
</table>
</table>
<table border="0" width="40%" align="right">
<tr>
<td align="center">Pembuat SP, <br><br><br><br><br></td>
</tr>
<tr>
<td align="center">Sri Sustin, S.Hut. M.Hut </td>
</tr>
<tr>
<td align="center">HRD</td>
</tr>
</table>
</body>