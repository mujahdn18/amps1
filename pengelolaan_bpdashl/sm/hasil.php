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
  <h3>__________________________________________________________________________________________________________________________________________________________________</h3> 
  <div style="text-align: center; line-height: 1;">
    <br>
  </div>
      
        <?php
          $fdate=$_POST['fromdate'];
          $tdate=$_POST['todate'];
        ?>
        <h6 align="center" style="color:black; font-family: times new roman;" > <b>LAPORAN DATA SURAT MASUK DARI TANGGAL <?php echo tgl_indo($fdate)?> S/D <?php echo tgl_indo($tdate)?></b> </h6>
          <table id="example2" class="table table-bordered table-hover">
            <thead style="font-size: 13px">
            <tr>
                <th>No</th>
                <th>No Agenda</th>                        
                <th>Tanggal Agenda</th> 
                <th>Menerima Surat</th> 
                <th>Kode Surat</th>
                <th>Asal Surat</th>
                <th>Kelompok Asal</th>
                <th>Tujuan</th> 
                <th>No Surat</th>  
                <th>Tanggal Surat</th>
                <th>Perihal</th> 
                <th>Lampiran</th> 
                <th>Sifat</th>  
            </tr>
            <?php                    
                    $no = 1;
                    $query = "SELECT * FROM tb_sm
                            INNER JOIN tb_pegawai ON tb_sm.id_pegawai = tb_pegawai.id_pegawai
                            where date(tgl_agenda) between '$fdate' and '$tdate'
                            ";                                 
                    $sql_sm = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_sm)) { ?>
                            <tr>
                            <td><?=$no++?></td>
                                <td><?=$data['no_agenda']?></td>
                                <td><?=tgl_indo($data['tgl_agenda'])?></td> 
                                <td><?=$data['nama_pegawai']?></td> 
                                <td><?=$data['kode_surat']?></td>
                                <td><?=$data['asal_surat']?></td>
                                <td><?=$data['kelompok_asal']?></td>
                                <td><?=$data['tujuan']?></td>  
                                <td><?=$data['no_surat']?></td>      
                                <td><?=tgl_indo($data['tgl_surat'])?></td> 
                                <td><?=$data['perihal']?></td> 
                                <td><?=$data['lampiran']?></td>
                                <td><?=$data['sifat_surat']?></td>
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