<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Riwayat Pendidikan Perguruan Tinggi II</h1>
            <h4>
                <small>Edit Data Riwayat Pendidikan Perguruan Tinggi II</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_rppt2 = mysqli_query($con, "SELECT * FROM tb_rppt2 WHERE id_pt2 = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_rppt2);
                ?>
                    <form action="proses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="namaorg_pt2">Nama</label>
                            <input type="hidden" name="id" value="<?=$data['id_pt2']?>">
                            <input type="text" name="namaorg_pt2" id="namaorg_pt2" value="<?=$data['namaorg_pt2']?>" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="dthn_pt2">Tahun Masuk</label>
                            <input type="text" name="dthn_pt2" id="dthn_pt2" value="<?=$data['dthn_pt2']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="sthn_pt2">Tahun Lulus</label>
                            <input type="text" name="sthn_pt2" id="sthn_pt2" value="<?=$data['sthn_pt2']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="noijazah_pt2">No Ijazah</label>
                            <input type="text" name="noijazah_pt2" id="noijazah_pt2" value="<?=$data['noijazah_pt2']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="nama_pt2">Nama Sekolah</label>
                            <input type="text" name="nama_pt2" id="nama_pt2" value="<?=$data['nama_pt2']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kota_pt2">Kota</label>
                            <input type="text" name="kota_pt2" id="kota_pt2" value="<?=$data['kota_pt2']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Scan Ijazah (.pdf)</label>
                            <input type="file" class="form-control" name="file" id="file" required>
                        </div>        
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>