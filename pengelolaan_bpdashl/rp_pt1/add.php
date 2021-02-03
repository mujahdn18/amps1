<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Riwayat Pendidikan Perguruan Tinggi I</h1>
            <h4>
                <small>Tambah Data Riwayat Pendidikan Perguruan Tinggi I</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="namaorg_pt1">Nama</label>
                            <input type="text" name="namaorg_pt1" id="namaorg_pt1" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="dthn_pt1">Tahun Masuk</label>
                            <input type="text" name="dthn_pt1" id="dthn_pt1" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="sthn_pt1">Tahun Lulus</label>
                            <input type="text" name="sthn_pt1" id="sthn_pt1" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="noijazah_pt1">No Ijazah</label>
                            <input type="text" name="noijazah_pt1" id="noijazah_pt1" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="nama_pt1">Nama Sekolah</label>
                            <input type="text" name="nama_pt1" id="nama_pt1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kota_pt1">Kota</label>
                            <input type="text" name="kota_pt1" id="kota_pt1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Scan Ijazah(.pdf)</label>
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