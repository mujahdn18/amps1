<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>PPK</h1>
            <h4>
                <small>Tambah Data Pejabat Pembuat Komitmen</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="nama_ppk">Nama</label>
                            <input type="text" name="nama_ppk" id="nama_ppk" class="form-control" required autofocus>
                        </div>                               
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" id="nip" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="seksi_ppk">Seksi</label>
                            <select name="seksi_ppk" id="seksi_ppk" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="Seksi Tata Usaha">Seksi Tata Usaha</option>
                                <option value="Seksi Program">Seksi Program</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Seksi Evaluasi">Seksi Evaluasi</option>
                                <option value="Seksi RHL">Seksi RHL</option>
                            </select>
                        </div>       
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="add" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>