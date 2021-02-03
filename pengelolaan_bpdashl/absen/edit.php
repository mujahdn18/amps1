<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Tunjangan Kinerja</h1>
            <h4>
                <small>Edit Data Tunjangan Kinerja</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_absen = mysqli_query($con, "SELECT * FROM tb_absen WHERE id_absen = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_absen);
                ?>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="kode_absen">Kode</label>
                            <input type="hidden" name="id" value="<?=$data['id_absen']?>">
                            <input type="text" name="kode_absen" id="kode_absen" value="<?=$data['kode_absen']?>" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="tgl_absen">Tanggal</label>
                            <input type="date" name="tgl_absen" id="tgl_absen" value="<?=$data['tgl_absen']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="id_pegawai">Pegawai</label>
                            <select name="id_pegawai" id="id_pegawai" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_pegawai ORDER BY nama_pegawai ASC") or die (mysqli_error($con)); 
                                while($data_pegawai = mysqli_fetch_array($sql_pegawai)) {
                                    echo '<option value="'.$data_pegawai['id_pegawai'].'">'.$data_pegawai['nama_pegawai'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="masuk">Masuk</label>
                            <input type="number" name="masuk" id="masuk" value="<?=$data['masuk']?>" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="telat">Telat</label>
                            <input type="number" name="telat" id="telat" value="<?=$data['telat']?>" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="izin">Izin</label>
                            <input type="number" name="izin" id="izin" value="<?=$data['izin']?>" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="sakit">Sakit</label>
                            <input type="number" name="sakit" id="sakit" value="<?=$data['sakit']?>" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="lembur">Lembur</label>
                            <input type="number" name="lembur" id="lembur" value="<?=$data['lembur']?>" class="form-control" required >
                        </div>                       
                        <div class="form-group" for="total" name="total" id="total"></div>  
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>