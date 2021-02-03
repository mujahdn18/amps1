<style type="text/css">
  @font-face {
    font-family: myFirstFont;
    src: url(fonts/ufonts.com_square721-bt-roman.ttf);
  }

  p, u, td{
    font-family: myFirstFont;
  }
</style>
<title>Surat SPJ</title>
<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
require_once "../config/config.php";?>
<?php
    $id = @$_GET['id'];
    $sql_spj = mysqli_query($con, "SELECT * FROM tb_spj WHERE id_spj = '$id'") or die (mysqi_error($con));
    $data = mysqli_fetch_array($sql_spj); 
?>
<table width="100%">
    <tr>
        <td style="width: 100%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px;"><strong> SURAT PERNYATAAN TANGGUNGJAWAB MUTLAK <br><br></strong></span></div>
        </td>
      </tr>
</table>
<table width="100%">
<tr>
<td>Yang bertandatangan dibawah ini : <br><br></td>
</tr>
</table>
<table width="100%" border="0" >
<tr>
<td width="20%">Nama</td>
<td width="2%">:</td>
<td width="78%"> <?php $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_pegawai ON tb_spj.id_pegawai = tb_pegawai.id_pegawai WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_pegawai = mysqli_fetch_array($sql_pegawai)) {
                        echo $data_pegawai['nama_pegawai'];
                    }?></td>
</tr>
<tr>
<td width="20%">NIP</td>
<td width="2%">:</td>
<td width="78%"> <?php $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_pegawai ON tb_spj.id_pegawai = tb_pegawai.id_pegawai WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_pegawai = mysqli_fetch_array($sql_pegawai)) {
                        echo $data_pegawai['nip'];
                    }?></td>
</tr>
<tr>
<td width="20%">Jabatan</td>
<td width="2%">:</td>
<td width="78%"> <?php $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_pegawai ON tb_spj.id_pegawai = tb_pegawai.id_pegawai WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_pegawai = mysqli_fetch_array($sql_pegawai)) {
                        echo $data_pegawai['jabatan'];
                    }?></td>
</tr>
</table>
<br>
<table>
<tr>
<td>Menyatakan dengan sesungguhnya bahwa : </td>
</tr>
</table>
<table width="100%">
<tr>
<td width="5%">1.</td>
<td width="95%">Perjalanan dinas yang saya laksanakan berdasarkan Surat Perintah Tugas Nomor : <?php $sql_spt = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_spt ON tb_spj.id_spt = tb_spt.id_spt WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_spt = mysqli_fetch_array($sql_spt)) {
                        echo $data_spt['no_surat_spt'];
                    }?> Tanggal <?php $sql_spt = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_spt ON tb_spj.id_spt = tb_spt.id_spt WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_spt = mysqli_fetch_array($sql_spt)) {
                        echo tgl_indo($data_spt['tgl_surat']);
                    }?> adalah benar dan saya lakukan sesuai dengan ketentuan yang berlaku, serta dilampiri bukti :</td>
</tr>
<tr>
<td width="5%"></td>
<td width="95%">- Lama perjalanan dinas berdasarkan Surat Perintah Tugas </td>
</tr>
<tr>
<td width="5%"></td>
<td width="95%">- Rincian biaya perjalanan dinas </td>
</tr>
<tr>
<td width="5%"></td>
<td width="95%">- Laporan perjalanan dinas </td>
</tr>
</table>
<br>
<table width="100%">
<tr>
<td width="5%">2.</td>
<td width="95%">Apabila dikemudian hari diperiksa, terbukti terdapat penyimpangan dalam pelaksanaannya dan merugikan negara, saya bertanggungjawab dan bersedia mengembalikan ke kas negara. </td>
</tr>
</table>
<br>
<table>
<tr>
<td>Demikian pernyataan ini saya buat dengan sebenar-benarnya. </td>
</tr>
</table>
<br><br><br><br>
<table border="0" width="100%" >
<tr>
<td width="66%" align="right"></td>
<td width="34%" align="left">Banjarbaru, <?php echo tgl_indo("$data[tgl_surat_spj]"); ?></td>
</tr>
<tr>
<td></td>
<td align="left">Yang Membayarkan, <br><br><br><br></td>
</tr>
<tr>
<td></td>
<td align="left"><?php $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_pegawai ON tb_spj.id_pegawai = tb_pegawai.id_pegawai WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_pegawai = mysqli_fetch_array($sql_pegawai)) {
                        echo $data_pegawai['nama_pegawai'];
                    }?></td>
</tr>
<tr>
<td></td>
<td align="left">NIP. <?php $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_pegawai ON tb_spj.id_pegawai = tb_pegawai.id_pegawai WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_pegawai = mysqli_fetch_array($sql_pegawai)) {
                        echo $data_pegawai['nip'];
                    }?></td>
</tr>
</table>
</body>