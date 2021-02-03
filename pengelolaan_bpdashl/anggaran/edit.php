<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Anggaran</h1>
            <h4>
                <small>Edit Data Anggaran</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_anggaran = mysqli_query($con, "SELECT * FROM tb_anggaran WHERE id_anggaran = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_anggaran);
                ?>   
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$data['id_anggaran']?>">
                            <label for="no_anggaran">No Anggaran</label>
                            <input type="text" name="no_anggaran" id="no_anggaran" value="<?=$data['no_anggaran']?>" class="form-control" required autofocus>
                        </div>                               
                        <div class="form-group">
                            <label for="jumlah_uangpl">Jumlah Uang PL</label>
                            <input type="number" name="jumlah_uangpl" id="jumlah_uangpl" value="<?=$data['jumlah_uangpl']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="jumlah_uangnonpl">Jumlah Uang Non PL</label>
                            <input type="number" name="jumlah_uangnonpl" id="jumlah_uangnonpl" value="<?=$data['jumlah_uangnonpl']?>" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label for="id_ppk">PPK</label>
                            <select name="id_ppk" id="id_ppk" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_ppk = mysqli_query($con, "SELECT * FROM tb_ppk ORDER BY nama_ppk ASC") or die (mysqli_error($con)); 
                                while($data_ppk = mysqli_fetch_array($sql_ppk)) {
                                    echo '<option value="'.$data_ppk['id_ppk'].'">'.$data_ppk['nama_ppk'].' / '.$data_ppk['seksi_ppk'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>             
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>