<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>SPJ UP</h1>
            <h4>
                <small>Edit Data SPJ Uang Persediaan</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_spjup = mysqli_query($con, "SELECT * FROM tb_spjup WHERE id_spjup = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_spjup);
                ?>    
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="no_kuitansi">No Kuitansi</label>
                            <input type="hidden" name="id" value="<?=$data['id_spjup']?>">
                            <input type="text" name="no_kuitansi" id="no_kuitansi" value="<?=$data['no_kuitansi']?>" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="no_drpp">No DRPP</label>
                            <input type="text" name="no_drpp" id="no_drpp" value="<?=$data['no_drpp']?>" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label for="seksi">Seksi</label>
                            <select name="seksi" id="seksi" class="form-control" required>
                                <option value=""><?=$data['seksi']?></option>
                                <option value="Tata Usaha">Tata Usaha</option>
                                <option value="Seksi Program">Seksi Program</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Seksi Evaluasi">Seksi Evaluasi</option>
                                <option value="Seksi RHL">Seksi RHL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keg">Kegiatan</label>
                            <textarea name="keg" id="keg" class="form-control" required ><?=$data['keg']?></textarea>
                        </div>         
                        <div class="form-group">
                            <label for="jumlah_uang">Jumlah Uang</label>
                            <input type="number" name="jumlah_uang" id="jumlah_uang" value="<?=$data['jumlah_uang']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="ket">Kekurangan</label>
                            <textarea name="ket" id="ket" class="form-control" required ><?=$data['ket']?></textarea>
                        </div>             
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>