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
        <h6 align="center" style="color:black; font-family: times new roman;" > <b>REKAPITULASI SURAT PERINTAH TUGAS</b> </h6>
          <table id="example2" class="table table-bordered table-hover">
            <thead style="font-size: 13px">
            <tr>
            <th>No</th>
                        <th>No. Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Pegawai</th>
                        <th>Perihal</th>
                        <th>Jangka Waktu</th>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
            </tr>
            <?php                    
                    $no = 1;
                    $query = "SELECT * FROM tb_spt
                            ";                                 
                    $sql_spt = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_spt)) { ?>
                            <tr>
                            <td><?=$no++?></td>
                                <td><?=$data['no_surat_spt']?></td>
                                <td><?=tgl_indo($data['tgl_surat'])?></td>
                                <td>
                                    <?php
                                    $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_surat_pegawai INNER JOIN tb_pegawai ON tb_surat_pegawai.id_pegawai = tb_pegawai.id_pegawai WHERE id_spt = '$data[id_spt]'") or die (mysqli_error($con));
                                    while ($data_spt = mysqli_fetch_array($sql_pegawai)) {
                                        echo $data_spt['nama_pegawai']."<br>";
                                    }
                                    ?>
                                </td>
                                <td><?=$data['perihal']?></td>
                                <td class="text-center"><?=$data['jangka_waktu']?></td>
                                <td><?=tgl_indo($data['dari_tgl'])?></td>
                                <td><?=tgl_indo($data['sampai_tgl'])?></td>
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