<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Mata Air</h1>
            <h4>
                <small>Edit Data Mata Air</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_mata_air = mysqli_query($con, "SELECT * FROM tb_mata_air WHERE id_mata_air = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_mata_air);
                ?>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="nama_mata_air">Nama Mata Air</label>
                            <input type="hidden" name="id" value="<?=$data['id_mata_air']?>">
                            <input type="text" name="nama_mata_air" id="nama_mata_air" value="<?=$data['nama_mata_air']?>" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="ph_air">PH Air</label>
                            <input type="text" name="ph_air" id="ph_air" value="<?=$data['ph_air']?>" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label for="desa">Desa</label>
                            <input type="text" name="desa" id="desa" value="<?=$data['desa']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" name="kecamatan" id="kecamatan" value="<?=$data['kecamatan']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <input type="text" name="kabupaten" id="kabupaten" value="<?=$data['kabupaten']?>" class="form-control" required>
                        </div>         
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" name="provinsi" id="provinsi" value="<?=$data['provinsi']?>" class="form-control" required>
                        </div>    
                        <div class="form-group">
                            <label for="jarak">Jarak</label>
                            <input type="text" name="jarak" id="jarak" value="<?=$data['jarak']?>" class="form-control" required>
                        </div>            
                                           
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>