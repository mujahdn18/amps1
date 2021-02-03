<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>SPJ</h1>
            <h4>
                <small>Tambah Data Surat Pertanggung Jawaban</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="no_surat_spj">No Surat</label>
                            <input type="text" name="no_surat_spj" id="no_surat_spj" class="form-control" value="/UP//" required autofocus>
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
                            <label for="id_spt">Nomor SPT</label>
                            <select name="id_spt" id="id_spt" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_spt = mysqli_query($con, "SELECT * FROM tb_spt ORDER BY no_surat_spt ASC") or die (mysqli_error($con)); 
                                while($data_spt = mysqli_fetch_array($sql_spt)) {
                                    echo '<option value="'.$data_spt['id_spt'].'">'.$data_spt['no_surat_spt']."&nbsp;&nbsp;&nbsp;-> ".$data_spt['jangka_waktu']." Hari SPT".'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_spd">Nomor SPD</label>
                            <select name="id_spd" id="id_spd" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_spd = mysqli_query($con, "SELECT * FROM tb_spd ORDER BY no_surat_spd ASC") or die (mysqli_error($con)); 
                                while($data_spd = mysqli_fetch_array($sql_spd)) {
                                    echo '<option value="'.$data_spd['id_spd'].'">'.$data_spd['no_surat_spd'].'</option>';
                                } 
                                ?>
                            </select>
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
                        <div class="form-group">
                            <label for="id_pejabat">Pejabat</label>
                            <select name="id_pejabat" id="id_pejabat" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_pejabat = mysqli_query($con, "SELECT * FROM tb_pejabat ORDER BY nama_pejabat ASC") or die (mysqli_error($con)); 
                                while($data_pejabat = mysqli_fetch_array($sql_pejabat)) {
                                    echo '<option value="'.$data_pejabat['id_pejabat'].'">'.$data_pejabat['nama_pejabat'].' / '.$data_pejabat['jabatan'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mak">MAK</label>
                            <input type="text" name="mak" id="mak" class="form-control" required>
                        </div>    
                        <div class="form-group">
                            <label for="u_harian">Uang Harian</label>
                            <input type="number" name="u_harian" id="u_harian" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="u_transportasi">Uang Transportasi</label>
                            <input type="number" name="u_transportasi" id="u_transportasi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="u_penginapan">Uang Penginapan</label>
                            <input type="number" name="u_penginapan" id="u_penginapan" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="tgl_surat">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" id="tgl_surat" value="<?=date('Y-m-d')?>" class="form-control" required>
                        </div>                        
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="add" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>