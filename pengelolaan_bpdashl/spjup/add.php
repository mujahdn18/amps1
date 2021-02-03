<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>SPJ UP</h1>
            <h4>
                <small>Tambah Data SPJ Uang Persediaan</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="no_kuitansi">No Kuitansi</label>
                            <input type="text" name="no_kuitansi" id="no_kuitansi" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="no_drpp">No DRPP</label>
                            <input type="text" name="no_drpp" id="no_drpp" value="DRPP./BPDASHL.Brt-1//" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label for="seksi">Seksi</label>
                            <select name="seksi" id="seksi" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="Tata Usaha">Tata Usaha</option>
                                <option value="Seksi Program">Seksi Program</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Seksi Evaluasi">Seksi Evaluasi</option>
                                <option value="Seksi RHL">Seksi RHL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keg">Kegiatan</label>
                            <textarea name="keg" id="keg" class="form-control" required ></textarea>
                        </div>         
                        <div class="form-group">
                            <label for="jumlah_uang">Jumlah Uang</label>
                            <input type="number" name="jumlah_uang" id="jumlah_uang" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="ket">Kekurangan</label>
                            <textarea name="ket" id="ket" class="form-control" required ></textarea>
                        </div>             
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="add" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>