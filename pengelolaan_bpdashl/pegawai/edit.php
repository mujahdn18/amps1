<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Pegawai</h1>
            <h4>
                <small>Edit Data Pegawai</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_pegawai WHERE id_pegawai = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_pegawai);
                ?>
                    <form action="proses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="hidden" name="id" id="id" value="<?=$data['id_pegawai']?>">
                            <input type="text" name="nip" id="nip" value="<?=$data['nip']?>" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nama_pegawai">Nama Pegawai</label>
                            <input type="text" name="nama_pegawai" id="nama_pegawai" value="<?=$data['nama_pegawai']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?=$data['tgl_lahir']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status_nikah">Status</label>
                            <select name="status_nikah" id="status_nikah" class="form-control" required>
                                <option value=""><?=$data['status_nikah']?></option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Menikah">Menikah</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" id="email" value="<?=$data['email']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="negara">Negara</label>
                            <input type="text" name="negara" id="negara" value="<?=$data['negara']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div>
                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" required <?=$data['jenis_kelamin'] == "Laki-laki" ? "checked" : null ?>> Laki-laki
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" <?=$data['jenis_kelamin'] == "Perempuan" ? "checked" : null ?>> Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" value="<?=$data['jabatan']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id_pangkat">Pangkat</label>
                            <select name="id_pangkat" id="id_pangkat" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_pangkat = mysqli_query($con, "SELECT * FROM tb_pangkat ORDER BY pangkat ASC") or die (mysqli_error($con)); 
                                while($data_pangkat = mysqli_fetch_array($sql_pangkat)) {
                                    echo '<option value="'.$data_pangkat['id_pangkat'].'">'.$data_pangkat['pangkat'].'</option>';
                                } 
                                ?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="seksi">Seksi</label>
                            <select name="seksi" id="seksi" class="form-control" required>
                                <option value=""><?=$data['seksi']?></option>
                                <option value="Tata Usaha">Tata Usaha</option>
                                <option value="Program">Program</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Evaluasi">Evaluasi</option>
                                <option value="RHL">RHL</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="no_hp">No Telepon</label>
                            <input type="number" name="no_hp" id="no_hp" value="<?=$data['no_hp']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="istri">Jumlah Suami/Istri</label>
                            <input type="number" name="istri" id="istri" value="<?=$data['istri']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="anak">Jumlah Anak</label>
                            <input type="number" name="anak" id="anak" value="<?=$data['anak']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required ><?=$data['alamat']?></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="id_eselon">Eselon</label>
                            <select name="id_eselon" id="id_eselon" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_eselon = mysqli_query($con, "SELECT * FROM tb_eselon ORDER BY eselon ASC") or die (mysqli_error($con)); 
                                while($data_eselon = mysqli_fetch_array($sql_eselon)) {
                                    echo '<option value="'.$data_eselon['id_eselon'].'">'.$data_eselon['eselon'].'</option>';
                                } 
                                ?>
                            </select>
                        </div> 
                        <br><br>
                        <div>
                            <label>Riwayat Pendidikan :</label>
                        </div>
                        <div class="form-group">
                            <label for="id_sd">SD</label>
                            <select name="id_sd" id="id_sd" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_rpsd = mysqli_query($con, "SELECT * FROM tb_rpsd ORDER BY namaorg_sd ASC") or die (mysqli_error($con)); 
                                while($data_rpsd = mysqli_fetch_array($sql_rpsd)) {
                                    echo '<option value="'.$data_rpsd['id_sd'].'">'.$data_rpsd['namaorg_sd'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_smp">SMP</label>
                            <select name="id_smp" id="id_smp" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_rpsmp = mysqli_query($con, "SELECT * FROM tb_rpsmp ORDER BY namaorg_smp ASC") or die (mysqli_error($con)); 
                                while($data_rpsmp = mysqli_fetch_array($sql_rpsmp)) {
                                    echo '<option value="'.$data_rpsmp['id_smp'].'">'.$data_rpsmp['namaorg_smp'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_sma">SMA</label>
                            <select name="id_sma" id="id_sma" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_rpsma = mysqli_query($con, "SELECT * FROM tb_rpsma ORDER BY namaorg_sma ASC") or die (mysqli_error($con)); 
                                while($data_rpsma = mysqli_fetch_array($sql_rpsma)) {
                                    echo '<option value="'.$data_rpsma['id_sma'].'">'.$data_rpsma['namaorg_sma'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_pt1">Perguruan Tinggi I</label>
                            <select name="id_pt1" id="id_pt1" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_rppt1 = mysqli_query($con, "SELECT * FROM tb_rppt1 ORDER BY namaorg_pt1 ASC") or die (mysqli_error($con)); 
                                while($data_rppt1 = mysqli_fetch_array($sql_rppt1)) {
                                    echo '<option value="'.$data_rppt1['id_pt1'].'">'.$data_rppt1['namaorg_pt1'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_pt2">Perguruan Tinggi II</label>
                            <select name="id_pt2" id="id_pt2" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_rppt2 = mysqli_query($con, "SELECT * FROM tb_rppt2 ORDER BY namaorg_pt2 ASC") or die (mysqli_error($con)); 
                                while($data_rppt2 = mysqli_fetch_array($sql_rppt2)) {
                                    echo '<option value="'.$data_rppt2['id_pt2'].'">'.$data_rppt2['namaorg_pt2'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_pt3">Perguruan Tinggi III</label>
                            <select name="id_pt3" id="id_pt3" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_rppt3 = mysqli_query($con, "SELECT * FROM tb_rppt3 ORDER BY namaorg_pt3 ASC") or die (mysqli_error($con)); 
                                while($data_rppt3 = mysqli_fetch_array($sql_rppt3)) {
                                    echo '<option value="'.$data_rppt3['id_pt3'].'">'.$data_rppt3['namaorg_pt3'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control" value="<?=$data['foto']?>"  required>
                        </div>                        
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>