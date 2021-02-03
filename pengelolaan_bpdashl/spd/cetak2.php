<?php 
include_once('../_header.php');
?>
<?php ob_start();

require_once "../config/config.php";

?>
<body onLoad="window.print()">
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
  <h3>_________________________________________________________________________________</h3>
  <div style="text-align: center; line-height: 1;">
    <br>
  </div>
        <h6 align="center" style="color:black; font-family: times new roman;" > <b>REKAPITULASI SURAT PERJALANAN DINAS ( SPD )</b> </h6>
          <table id="example2" class="table table-bordered table-hover">
            <thead style="font-size: 13px">
            <tr>
                        <th>No</th>
                        <th>No. Surat</th>
                        <th>Tgl Surat</th>
                        <th>Pegawai</th>
                        <th>Tingkat Biaya</th>
                        <th>Perihal</th>
                        <th>Jangka Waktu</th>
                        <th>Dari Tgl</th>
                        <th>Sampai Tgl</th>                        
                        <th>Transportasi</th>
                        <th>Tujuan</th>
                        <th>Akun</th>
                        <th>Keterangan</th>
                        <th>PPK</th> 
            </tr>
            <?php                    
                    $no = 1;
                    $query = "SELECT * FROM tb_spd 
                    INNER JOIN tb_pegawai ON tb_spd.id_pegawai = tb_pegawai.id_pegawai
                    INNER JOIN tb_spt ON tb_spd.id_spt = tb_spt.id_spt
                    INNER JOIN tb_ppk ON tb_spd.id_ppk = tb_ppk.id_ppk
                            ";                                 
                    $sql_spd = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_spd)) { ?>
                            <tr>
                            <td><?=$no++?></td>
                                <td><?=$data['no_surat_spd']?></td>
                                <td><?=tgl_indo($data['tgl_surat_spd'])?></td>
                                <td><?=$data['nama_pegawai']?></td>
                                <td><?=$data['tingkat_biaya']?></td>
                                <td><?=$data['perihal']?></td>
                                <td><?=$data['jangka_waktu']?></td>
                                <td><?=tgl_indo($data['dari_tgl'])?></td>
                                <td><?=tgl_indo($data['sampai_tgl'])?></td>                                
                                <td><?=$data['transportasi']?></td>
                                <td><?=$data['tujuan']?></td>
                                <td><?=$data['akun']?></td>
                                <td><?=$data['keterangan']?></td>
                                <td><?=$data['nama_ppk']?></td>
                            </tr>
              
              <?php 
               }?>
          </table>
          <div style="width: 400px; float: right;">
                    <center>
                    <br>
                    <br>
                    <br>
                    <p>Yang mengetahui, Kepala Balai
                    <br>
                    <br>
                    <br>
                    <br>Dr. M. Zainal Arifin, S.Hut. M.Si
                    <br>NIP. 19710927 199803 1 005
                  </p>
                  </center>
                </div>
              </div>

        </div>
      </div>
    </div>   
          






          </div>
        </div>
      </div>