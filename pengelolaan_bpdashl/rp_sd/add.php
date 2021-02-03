<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Riwayat Pendidikan SD</h1>
            <h4>
                <small>Tambah Data Riwayat Pendidikan SD</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="namaorg_sd">Nama</label>
                            <input type="text" name="namaorg_sd" id="namaorg_sd" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="dthn_sd">Tahun Masuk</label>
                            <input type="text" name="dthn_sd" id="dthn_sd" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="sthn_sd">Tahun Lulus</label>
                            <input type="text" name="sthn_sd" id="sthn_sd" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="noijazah_sd">No Ijazah</label>
                            <input type="text" name="noijazah_sd" id="noijazah_sd" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="nama_sd">Nama Sekolah</label>
                            <input type="text" name="nama_sd" id="nama_sd" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kota_sd">Kota</label>
                            <input type="text" name="kota_sd" id="kota_sd" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Scan Ijazah (.pdf)</label>
                            <input type="file" class="form-control" name="file" id="file" required>
                        </div>      
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="add" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>