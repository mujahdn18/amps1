<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Riwayat Pendidikan SMP</h1>
            <h4>
                <small>Edit Data Riwayat Pendidikan SMP</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_rpsmp = mysqli_query($con, "SELECT * FROM tb_rpsmp WHERE id_smp = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_rpsmp);
                ?>
                    <form action="proses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="namaorg_smp">Nama</label>
                            <input type="hidden" name="id" value="<?=$data['id_smp']?>">
                            <input type="text" name="namaorg_smp" id="namaorg_smp" value="<?=$data['namaorg_smp']?>" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="dthn_smp">Tahun Masuk</label>
                            <input type="text" name="dthn_smp" id="dthn_smp" value="<?=$data['dthn_smp']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="sthn_smp">Tahun Lulus</label>
                            <input type="text" name="sthn_smp" id="sthn_smp" value="<?=$data['sthn_smp']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="noijazah_smp">No Ijazah</label>
                            <input type="text" name="noijazah_smp" id="noijazah_smp" value="<?=$data['noijazah_smp']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="nama_smp">Nama Sekolah</label>
                            <input type="text" name="nama_smp" id="nama_smp" value="<?=$data['nama_smp']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kota_smp">Kota</label>
                            <input type="text" name="kota_smp" id="kota_smp" value="<?=$data['kota_smp']?>" class="form-control" required>
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