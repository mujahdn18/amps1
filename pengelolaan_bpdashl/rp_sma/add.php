<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Riwayat Pendidikan SMA</h1>
            <h4>
                <small>Tambah Data Riwayat Pendidikan SMA</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="namaorg_sma">Nama</label>
                            <input type="text" name="namaorg_sma" id="namaorg_sma" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="dthn_sma">Tahun Masuk</label>
                            <input type="text" name="dthn_sma" id="dthn_sma" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="sthn_sma">Tahun Lulus</label>
                            <input type="text" name="sthn_sma" id="sthn_sma" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="noijazah_sma">No Ijazah</label>
                            <input type="text" name="noijazah_sma" id="noijazah_sma" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="nama_sma">Nama Sekolah</label>
                            <input type="text" name="nama_sma" id="nama_sma" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kota_sma">Kota</label>
                            <input type="text" name="kota_sma" id="kota_sma" class="form-control" required>
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