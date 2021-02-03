<?php include_once('../_header2.php'); ?>

    <div class="box">
        <h1>SPD</h1>
        <h4>
            <small>Data Surat Perjalanan Dinas</small>
        </h4>
        <div style="margin-bottom: 20px;">
            <form class="form-inline" action="" method="post">
                <div class="form-group">
                    <input type="text" name="pencarian" class="form-control" placeholder="Pencarian">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Surat</th>
                        <th>Tgl Surat</th>
                        <th>Pegawai</th>
                        <th>Perihal</th>      
                        <th>Tujuan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $batas = 5;
                    $hal = @$_GET['hal'];
                    if(empty($hal)) {
                        $posisi = 0;
                        $hal = 1;
                    }else {
                        $posisi = ($hal - 1) * $batas;
                    } 
                    $no = 1;
                    if($_SERVER['REQUEST_METHOD'] == "POST") {
                        $pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
                        if($pencarian != '') {
                            $sql = "SELECT * FROM tb_spd WHERE no_surat_spd LIKE '%$pencarian%'";
                            $query = $sql;
                            $queryJml = $sql;
                        }else {
                            $query = "SELECT * FROM tb_spd LIMIT $posisi, $batas";
                            $queryJml = "SELECT * FROM tb_spd";
                            $no = $posisi + 1;
                        }
                    } else {
                        $query = "SELECT * FROM tb_spd LIMIT $posisi, $batas";
                        $queryJml = "SELECT * FROM tb_spd";
                        $no = $posisi + 1;
                    }               
                    $queryij= "SELECT * FROM tb_spd 
                    INNER JOIN tb_pegawai ON tb_spd.id_pegawai = tb_pegawai.id_pegawai
                    INNER JOIN tb_spt ON tb_spd.id_spt = tb_spt.id_spt
                    INNER JOIN tb_ppk ON tb_spd.id_ppk = tb_ppk.id_ppk
                    ";  
                    $sql_spd = mysqli_query($con, $queryij) or die (mysqli_error($con));
                    if(mysqli_num_rows($sql_spd) > 0) {
                        while($data = mysqli_fetch_array($sql_spd)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['no_surat_spd']?></td>
                                <td><?=tgl_indo($data['tgl_surat_spd'])?></td>
                                <td><?=$data['nama_pegawai']?></td>
                                <td><?=$data['perihal']?></td>
                                <td><?=$data['tujuan']?></td>
                                <td><?=$data['keterangan']?></td>
                            </tr>
                        <?php
                        }
                    } else {
                        echo "<tr><td colspan=\"5\" align=\"center\">Data tidak ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php 
        if (@$_POST['pencarian'] == '') { ?>
            <div style="float:left;">
                <?php 
                $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
                echo "Jumlah Data : <b>$jml</b>";
                ?>            
            </div>
            <div style="float:right;">
                <ul class="pagination pagination-sm" style="margin:0">
                    <?php 
                    $jml_hal = ceil($jml / $batas);
                    for ($i=1; $i <= $jml_hal; $i++) {
                        if($i != $hal) {  
                            echo "<li><a href=\"?hal=$i\">$i</a></li>";                          
                        }else {
                            echo "<li class=\"active\"><a>$i</a></li>";
                        }
                    }
                    ?>
                </ul>
            </div>
            <?php    
        } else {
            echo "<div style=\"float:left;\">";
            $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
            echo "Data Hasil Pencarian : <b>$jml</b>";
            echo "</div>";
        } 
        ?>

    </div> 