<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Mata Air</h1>
            <h4>
                <small>Tambah Data Mata Air</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="nama_mata_air">Nama Mata Air</label>
                            <input type="hidden" name="id">
                            <input type="text" name="nama_mata_air" id="nama_mata_air" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="ph_air">PH Air</label>
                            <input type="text" name="ph_air" id="ph_air" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label for="desa">Desa</label>
                            <input type="text" name="desa" id="desa" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" name="kecamatan" id="kecamatan" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <input type="text" name="kabupaten" id="kabupaten" class="form-control" required>
                        </div>         
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" name="provinsi" id="provinsi" class="form-control" required>
                        </div>    
                        <div class="form-group">
                            <label for="jarak">Jarak</label>
                            <input type="text" name="jarak" id="jarak" class="form-control" required>
                        </div>             
                                           
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="add" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>