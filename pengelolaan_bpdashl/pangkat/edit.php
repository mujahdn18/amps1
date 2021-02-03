<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Pangkat/Golongan</h1>
            <h4>
                <small>Edit Data Pangkat/Golongan</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_pangkat = mysqli_query($con, "SELECT * FROM tb_pangkat WHERE id_pangkat = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_pangkat);
                ?>
                    <form action="proses.php" method="post"> 
                        <div class="form-group">
                            <label for="pangkat">Pangkat/Gol.</label>
                            <input type="hidden" name="id_pangkat" value="<?=$data['id_pangkat']?>">
                            <input name="pangkat" id="pangkat" value="<?=$data['pangkat']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gapok">Gaji Pokok</label>
                            <input type="number" name="gapok" id="gapok" value="<?=$data['gapok']?>" class="form-control" required >
                        </div>                        
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>