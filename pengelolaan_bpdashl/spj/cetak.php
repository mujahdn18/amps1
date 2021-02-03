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
<table border="1" width="100%">

<table border="0" width="40%" align="right">
<tr>
<td width="15%">T.A</td>
<td width="2%">:</td>
<td width="23%"> 2020</td>
</tr>
<tr>
<td width="15%">Nomor</td>
<td width="2%">:</td>
<td width="23%"> <?php echo "$data[no_surat_spj]"; ?></td>
</tr>
<tr>
<td width="15%">Bukti Kas</td>
<td width="2%"></td>
<td width="23%"></td>
</tr>
<tr>
<td width="15%">M A K</td>
<td width="2%">:</td>
<td width="23%"> <?php echo "$data[mak]"; ?> </td>
</tr>
</table>
<br><br><br><br><br><br>
<table width="100%">
    <tr>
        <td style="width: 100%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px;"><strong>KUITANSI/BUKTI PEMBAYARAN <br><br></strong></span></div>
        </td>
      </tr>
</table>
<table width="100%" border="0" align="left">
<tr>
<td width="20%">Sudah terima dari</td>
<td width="2%">:</td>
<td width="78%"> Kuasa Pengguna Anggaran / Pejabat Pembuat Komitmen Balai</td>
</tr>
<tr>
<td width="20%"></td>
<td width="2%"></td>
<td width="78%">Pengelolaan Daerah Aliran Sungai dan Hutan Lindung Barito Tahun 2020</td>
</tr>
<tr>
<td width="20%">Uang sejumlah</td>
<td width="2%">:</td>
<td width="78%"> <?php echo rupiah("$data[jumlah_uang]"); ?></td>
</tr>
<tr>
<td width="20%">Terbilang</td>
<td width="2%">:</td>
<td width="78%" align="center" >### <?php echo terbilang("$data[jumlah_uang]").' Rupiah'; ?> ###</td>
</tr>
<tr>
<td width="20%">Untuk pembayaran</td>
<td width="2%">:</td>
<td width="78%"> <?php $sql_spt = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_spt ON tb_spj.id_spt = tb_spt.id_spt WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_spt = mysqli_fetch_array($sql_spt)) {
                        echo $data_spt['perihal'];
                    }?></td>
</tr>
<tr>
<td width="20%"></td>
<td width="2%"></td>
<td width="78%" >Sesuai SPD No. <?php $sql_spd = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_spd ON tb_spj.id_spd = tb_spd.id_spd WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_spd = mysqli_fetch_array($sql_spd)) {
                        echo $data_spd['no_surat_spd'];
                    }?> tanggal <?php $sql_spd = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_spd ON tb_spj.id_spd = tb_spd.id_spd WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_spd = mysqli_fetch_array($sql_spd)) {
                        echo tgl_indo($data_spd['tgl_surat_spd']);
                    }?></td>
</tr>
</table>
<br><br><br><br><br><br><br><br><br><br><br>
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
________________________________________________________________________________________
<table border="0" width="50%" align="left">
<tr>
<td >Setuju dibebankan pada mata anggaran berkenaan, An. Kuasa Pengguna Anggaran</td>
</tr>
<tr>
<td >Pejabat Pembuat Komitmen </td>
</tr>
<tr>
<td >Seksi <?php $sql_ppk = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_ppk ON tb_spj.id_ppk = tb_ppk.id_ppk WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_ppk = mysqli_fetch_array($sql_ppk)) {
                        echo $data_ppk['seksi_ppk'];
                    }?> DASHL,<br><br><br><br></td>
</tr>
<tr>
<td ><?php $sql_ppk = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_ppk ON tb_spj.id_ppk = tb_ppk.id_ppk WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_ppk = mysqli_fetch_array($sql_ppk)) {
                        echo $data_ppk['nama_ppk'];
                    }?></td>
</tr>
<tr>
<td >NIP. <?php $sql_ppk = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_ppk ON tb_spj.id_ppk = tb_ppk.id_ppk WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_ppk = mysqli_fetch_array($sql_ppk)) {
                        echo $data_ppk['nip'];
                    }?></td>
</tr>
</table>
<table border="0" width="35%" align="right">
<td >Lunas dibayar, </td>
<tr>
<td width="35%">Tanggal  ..................... <br><br></td>
</tr>
<tr>
<td >Bendahara Pengeluaran, <br><br><br><br></td>
</tr>
<tr>
<td >Nuning Elmayani, S.Hut </td>
</tr>
<tr>
<td >NIP . 19860316 201012 2 010</td>
</tr>
</table>
<table border="1" width="100%">
</body>