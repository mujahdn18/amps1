<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Riwayat Pendidikan SD</h1>
            <h4>
                <small>Edit Data Riwayat Pendidikan SD</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_rpsd = mysqli_query($con, "SELECT * FROM tb_rpsd WHERE id_sd = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_rpsd);
                ?>
                    <form action="proses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="namaorg_sd">Nama</label>
                            <input type="hidden" name="id" value="<?=$data['id_sd']?>">
                            <input type="text" name="namaorg_sd" id="namaorg_sd" value="<?=$data['namaorg_sd']?>" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="dthn_sd">Tahun Masuk</label>
                            <input type="text" name="dthn_sd" id="dthn_sd" value="<?=$data['dthn_sd']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="sthn_sd">Tahun Lulus</label>
                            <input type="text" name="sthn_sd" id="sthn_sd" value="<?=$data['sthn_sd']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="noijazah_sd">No Ijazah</label>
                            <input type="text" name="noijazah_sd" id="noijazah_sd" value="<?=$data['noijazah_sd']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="nama_sd">Nama Sekolah</label>
                            <input type="text" name="nama_sd" id="nama_sd" value="<?=$data['nama_sd']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kota_sd">Kota</label>
                            <input type="text" name="kota_sd" id="kota_sd" value="<?=$data['kota_sd']?>" class="form-control" required>
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