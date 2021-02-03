<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>SPD</h1>
            <h4>
                <small>Edit Data Surat Perjalanan Dinas</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_spd = mysqli_query($con, "SELECT * FROM tb_spd WHERE id_spd = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_spd); 
                ?>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="no_surat_spd">No Surat</label>
                            <input type="hidden" name="id" value="<?=$data['id_spd']?>">
                            <input type="text" name="no_surat_spd" id="no_surat_spd" value="<?=$data['no_surat_spd']?>" class="form-control" required autofocus>
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
                            <label for="tingkat_biaya">Tingkat Biaya</label>
                            <select name="tingkat_biaya" id="tingkat_biaya" class="form-control" required>
                                <option value=""><?=$data['tingkat_biaya']?></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_spt">Nomor SPT</label>
                            <select name="id_spt" id="id_spt" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_spt = mysqli_query($con, "SELECT * FROM tb_spt ORDER BY no_surat_spt ASC") or die (mysqli_error($con)); 
                                while($data_spt = mysqli_fetch_array($sql_spt)) {
                                    echo '<option value="'.$data_spt['id_spt'].'">'.$data_spt['no_surat_spt'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="transportasi">Transportasi</label>
                            <select name="transportasi" id="transportasi" class="form-control" required>
                                <option value=""><?=$data['transportasi']?></option>
                                <option value="Pesawat">Pesawat</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Motor">Motor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" name="tujuan" id="tujuan" value="<?=$data['tujuan']?>" class="form-control" required>
                        </div>   
                        <div class="form-group">
                            <label for="akun">Akun</label>
                            <input type="text" name="akun" id="akun" value="<?=$data['akun']?>" class="form-control" required>
                        </div>                      
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" required ><?=$data['keterangan']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tgl_surat">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" id="tgl_surat" value="<?=$data['tgl_surat_spd']?>" class="form-control" required>
                        </div>         
                        <div class="form-group">
                            <label for="id_ppk">ppk</label>
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