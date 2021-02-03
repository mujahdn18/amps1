<style type="text/css">
  @font-face {
    font-family: myFirstFont;
    src: url(fonts/ufonts.com_square721-bt-roman.ttf);
  }

  p, u, td{
    font-family: myFirstFont;
  }
</style>
<title>Surat SPD</title>
<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
require_once "../config/config.php";?>
<?php
  $id = @$_GET['id'];
  $sql_spd = mysqli_query($con, "SELECT * FROM tb_spd WHERE id_spd = '$id'") or die (mysqi_error($con));
  $data = mysqli_fetch_array($sql_spd); 
?>
<table border="0" width="100%" align="leftt">
<tr>
<td width="63%">KEMENTRIAN LINGKUNGAN HIDUP DAN KEHUTANAN</td>
<td width="2%"></td>
<td width="13%">Lembar ke</td>
<td width="2%">:</td>
<td width="20%"> I,II,III,IV,V,VI,VII</td>
</tr>
<tr>
<td>DIREKTORAT JENDRAL PENGADILAN DAS DAN</td>
<td ></td>
<td >Kode No</td>
<td >:</td>
<td > </td>
</tr>
<tr>
<td>HUTAN LINDUNG</td>
<td ></td>
<td >Nomor</td>
<td >:</td>
<td > <?php echo "$data[no_surat_spd]"; ?> </td>
</tr>
</table>

<table width="100%">
    <tr>
        <td style="width: 100%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px;"><strong>SURAT PERJALANAN DINAS ( SPD ) <br><br></strong></span></div>
        </td>
      </tr>
</table>
<table width="100%" border="1" align="left">
<tr>
<td width="2%">1.</td>
<td width="48%">Pejabat Pembuat Komitmen</td>
<td width="50%">Seksi <?php $sql_ppk = mysqli_query($con, "SELECT * FROM tb_spd INNER JOIN tb_ppk ON tb_spd.id_ppk = tb_ppk.id_ppk WHERE id_spd = '$data[id_spd]'") or die (mysqli_error($con));
                    while ($data_ppk = mysqli_fetch_array($sql_ppk)) {
                        echo $data_ppk['seksi_ppk'];
                    }?> DAS</td>
</tr>
<tr>
<td width="2%">2.</td>
<td width="48%">Nama/NIP. Pegawai yang melaksanakan Perjalanan dinas</td>
<td width="50%"><?php $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_spd INNER JOIN tb_pegawai ON tb_spd.id_pegawai = tb_pegawai.id_pegawai WHERE id_spd = '$data[id_spd]'") or die (mysqli_error($con));
                    while ($data_pegawai = mysqli_fetch_array($sql_pegawai)) {
                        echo $data_pegawai['nama_pegawai'];
                    }?>/NIP. <?php $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_spd INNER JOIN tb_pegawai ON tb_spd.id_pegawai = tb_pegawai.id_pegawai WHERE id_spd = '$data[id_spd]'") or die (mysqli_error($con));
                    while ($data_pegawai = mysqli_fetch_array($sql_pegawai)) {
                        echo $data_pegawai['nip'];
                    }?></td>
</tr>
<tr>
<td width="2%">3.</td>
<td width="48%">a. Jabatan/Instansi</td>
<td width="50%" >a. / Balai Pengelolaan DAS dan Hutan Lindung Barito</td>
</tr>
<tr>
<td width="2%"></td>
<td width="48%">b. Tingkat biaya perjalanan dinas</td>
<td width="50%" >b. <?php echo "$data[tingkat_biaya]"; ?></td>
</tr>
<tr>
<td width="2%">4.</td>
<td width="48%">Maksud Perjalanan Dinas</td>
<td width="50%"> <?php $sql_spt = mysqli_query($con, "SELECT * FROM tb_spd INNER JOIN tb_spt ON tb_spd.id_spt = tb_spt.id_spt WHERE id_spd = '$data[id_spd]'") or die (mysqli_error($con));
                    while ($data_spt = mysqli_fetch_array($sql_spt)) {
                        echo $data_spt['perihal'];
                    }?></td>
</tr>
<tr>
<td width="2%">5.</td>
<td width="48%">Alat angkutan yang dipergunakan</td>
<td width="50%" ><?php echo "$data[transportasi]"; ?></td>
</tr>
<tr>
<td width="2%">6.</td>
<td width="48%">a. Tempat berangkat</td>
<td width="50%">a. Banjarbaru</td>
</tr>
<tr>
<td width="2%"></td>
<td width="48%">b. Tempat tujuan</td>
<td width="50%" >b. <?php echo "$data[tujuan]"; ?></td>
</tr>
<tr>
<td width="2%">7.</td>
<td width="48%">a. Lamanya perjalanan dinas</td>
<td width="50%">a. <?php $sql_spt = mysqli_query($con, "SELECT * FROM tb_spd INNER JOIN tb_spt ON tb_spd.id_spt = tb_spt.id_spt WHERE id_spd = '$data[id_spd]'") or die (mysqli_error($con));
                    while ($data_spt = mysqli_fetch_array($sql_spt)) {
                        echo $data_spt['jangka_waktu'];
                    }?> Hari</td>
</tr>
<tr>
<td width="2%"></td>
<td width="48%">b. Tanggal berangkat</td>
<td width="50%" >b. <?php $sql_spt = mysqli_query($con, "SELECT * FROM tb_spd INNER JOIN tb_spt ON tb_spd.id_spt = tb_spt.id_spt WHERE id_spd = '$data[id_spd]'") or die (mysqli_error($con));
                    while ($data_spt = mysqli_fetch_array($sql_spt)) {
                        echo tgl_indo($data_spt['dari_tgl']);
                    }?></td>
</tr>
<tr>
<td width="2%"></td>
<td width="48%">c. Tanggal harus kembali</td>
<td width="50%" >c. <?php $sql_spt = mysqli_query($con, "SELECT * FROM tb_spd INNER JOIN tb_spt ON tb_spd.id_spt = tb_spt.id_spt WHERE id_spd = '$data[id_spd]'") or die (mysqli_error($con));
                    while ($data_spt = mysqli_fetch_array($sql_spt)) {
                        echo tgl_indo($data_spt['sampai_tgl']);
                    }?></td>
</tr>
<tr>
<td width="2%">8.</td>
<td width="48%">Pembebanan Anggaran</td>
<td width="50%">Program peningkatan fungsi dan daya dukung DAS berbasis pemberdayaan masyarakat</td>
</tr>
<tr>
<td width="2%"></td>
<td width="48%">a. Instansi</td>
<td width="50%" >a. Balai Pengelolaan DAS dan Hutan Lindung Barito</td>
</tr>
<tr>
<td width="2%"></td>
<td width="48%">b. Akun</td>
<td width="50%" >b. <?=$data['akun']?></td>
</tr>
<tr>
<td width="2%">9.</td>
<td width="48%">Keterangan Lain-lain</td>
<td width="50%" ><?=$data['keterangan']?></td>
</tr>
<table border="0" width="45%" align="right">
<tr>
<td ><br><br>Dikeluarkan di : Banjarbaru</td>
</tr>
<tr>
<td >Tanggal : <?=tgl_indo($data['tgl_surat_spd'])?><br></td>
</tr>
<tr>
<td >Pejabat Pembuat Komitmen </td>
</tr>
<tr>
<td >Seksi <?php $sql_ppk = mysqli_query($con, "SELECT * FROM tb_spd INNER JOIN tb_ppk ON tb_spd.id_ppk = tb_ppk.id_ppk WHERE id_spd = '$data[id_spd]'") or die (mysqli_error($con));
                    while ($data_ppk = mysqli_fetch_array($sql_ppk)) {
                        echo $data_ppk['seksi_ppk'];
                    }?> DASHL,<br><br><br><br></td>
</tr>
<tr>
<td ><?php $sql_ppk = mysqli_query($con, "SELECT * FROM tb_spd INNER JOIN tb_ppk ON tb_spd.id_ppk = tb_ppk.id_ppk WHERE id_spd = '$data[id_spd]'") or die (mysqli_error($con));
                    while ($data_ppk = mysqli_fetch_array($sql_ppk)) {
                        echo $data_ppk['nama_ppk'];
                    }?></td>
</tr>
<tr>
<td >NIP. <?php $sql_ppk = mysqli_query($con, "SELECT * FROM tb_spd INNER JOIN tb_ppk ON tb_spd.id_ppk = tb_ppk.id_ppk WHERE id_spd = '$data[id_spd]'") or die (mysqli_error($con));
                    while ($data_ppk = mysqli_fetch_array($sql_ppk)) {
                        echo $data_ppk['nip'];
                    }?></td>
</tr>
</table>
</body>