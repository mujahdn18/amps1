<?php 
include_once('../_header2.php');
?>

    <div class="box">
        <h1>Surat Masuk</h1>
            <h4>
                <small>Tambah Data Surat Masuk</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="no_agenda">No Agenda</label>
                            <input type="hidden" name="id">
                            <input type="text" name="no_agenda" id="no_agenda" value="/BPDASHL.BRT/" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="tgl_agenda">Tanggal Agenda</label>
                            <input type="date" name="tgl_agenda" id="tgl_agenda" value="<?=date('Y-m-d')?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="id_pegawai">Menerima Surat</label>
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
                            <label for="kode_surat">Kode Arsip</label>
                            <select name="kode_surat" id="kode_surat" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="DAS">DAS</option>
                                <option value="DIK">DIK</option>
                                <option value="DTN">DTN</option>
                                <option value="GKM">GKM</option>
                                <option value="HMS">HMS</option>
                                <option value="HPL">HPL</option>
                                <option value="KAP">KAP</option>
                                <option value="KEU">KEU</option>
                                <option value="KKL">KKL</option>
                                <option value="KKS">KKS</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="asal_surat">Asal Surat</label>
                            <input type="text" name="asal_surat" id="asal_surat" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="kelompok_asal">Kelompok Asal</label>
                            <select name="kelompok_asal" id="kelompok_asal" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="Instansi Pemerintah">Instansi Pemerintah</option>
                                <option value="Instansi Swasta">Instansi Swasta</option>
                                <option value="Masyarakat">Masyarakat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <select name="tujuan" id="tujuan" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="Tata Usaha">Tata Usaha</option>
                                <option value="Program">Program</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Evaluasi">Evaluasi</option>
                                <option value="RHL">RHL</option>
                            </select>
                        </div>   
                        <div class="form-group">
                            <label for="no_surat">No Surat</label>
                            <input type="text" name="no_surat" id="no_surat" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label for="tgl_surat">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <textarea name="perihal" id="perihal" class="form-control" required ></textarea>
                        </div> 
                        <div class="form-group">
                            <label>Scan Surat Masuk (.pdf)</label>
                            <input type="file" class="form-control" name="file" id="file" required>
                        </div>                        
                        <div class="form-group">
                            <label for="lampiran">Lampiran</label>
                            <input type="number" name="lampiran" id="lampiran" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label for="sifat_surat">Sifat Surat</label>
                            <select name="sifat_surat" id="sifat_surat" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="Biasa">Biasa</option>
                                <option value="Penting">Penting</option>
                                <option value="Rahasia">Rahasia</option>
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