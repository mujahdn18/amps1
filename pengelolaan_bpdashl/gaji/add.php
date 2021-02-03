<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Gaji</h1>
            <h4>
                <small>Tambah Gaji</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="tgl_gaji">Tanggal Gaji</label>
                            <input type="hidden" name="id">
                            <input type="date" name="tgl_gaji" id="tgl_gaji" value="<?=date('Y-m-d')?>" class="form-control" required autofocus>
                        </div> 
                        <div class="form-group">
                            <label for="id_pegawai">Pegawai</label>
                            <select name="id_pegawai" id="id_pegawai" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_pegawai ORDER BY nama_pegawai ASC") or die (mysqli_error($con)); 
                                while($data_pegawai = mysqli_fetch_array($sql_pegawai)) {
                                    echo '<option value="'.$data_pegawai['id_pegawai'].'">'.$data_pegawai['nama_pegawai'].' / '.$data_pegawai['nip'].'</option>';
                                } 
                                ?>
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