<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Surat Masuk</h1>
            <h4>
                <small>Edit Data Surat Masuk</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_sm = mysqli_query($con, "SELECT * FROM tb_sm WHERE id_sm = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_sm);
                ?>
                    <form action="proses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="no_agenda">No Agenda</label>
                            <input type="hidden" name="id" value="<?=$data['id_sm']?>">
                            <input type="text" name="no_agenda" id="no_agenda" value="<?=$data['no_agenda']?>" class="form-control" required autofocus>
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
                                <option value="<?=$data['kode_surat']?>"><?=$data['kode_surat']?></option>
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
                            <input type="text" name="asal_surat" id="asal_surat" value="<?=$data['asal_surat']?>" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="kelompok_asal">Kelompok Asal</label>
                            <select name="kelompok_asal" id="kelompok_asal" class="form-control" required>
                                <option value="<?=$data['kelompok_asal']?>"><?=$data['kelompok_asal']?></option>
                                <option value="Instansi Pemerintah">Instansi Pemerintah</option>
                                <option value="Instansi Swasta">Instansi Swasta</option>
                                <option value="Masyarakat">Masyarakat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <select name="tujuan" id="tujuan" class="form-control" required>
                                <option value="<?=$data['tujuan']?>"><?=$data['tujuan']?></option>
                                <option value="Tata Usaha">Tata Usaha</option>
                                <option value="Seksi Program">Seksi Program</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Seksi Evaluasi">Seksi Evaluasi</option>
                                <option value="Seksi RHL">Seksi RHL</option>
                            </select>
                        </div>   
                        <div class="form-group">
                            <label for="no_surat">No Surat</label>
                            <input type="text" name="no_surat" id="no_surat" value="<?=$data['no_surat']?>" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label for="tgl_surat">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" id="tgl_surat" value="<?=$data['tgl_surat']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <textarea name="perihal" id="perihal" class="form-control" required ><?=$data['perihal']?></textarea>
                        </div>  
                        <div class="form-group">
                            <label>Scan Surat Masuk (.pdf)</label>
                            <input type="file" class="form-control" name="file" id="file" required>
                        </div>                       
                        <div class="form-group">
                            <label for="lampiran">Lampiran</label>
                            <input type="number" name="lampiran" id="lampiran" value="<?=$data['lampiran']?>" class="form-control" required>
                        </div>     
                        <div class="form-group">
                            <label for="sifat_surat">Sifat Surat</label>
                            <select name="sifat_surat" id="sifat_surat"  class="form-control" required>
                                <option value="<?=$data['sifat_surat']?>"><?=$data['sifat_surat']?></option>
                                <option value="Biasa">Biasa</option>
                                <option value="Penting">Penting</option>
                                <option value="Rahasia">Rahasia</option>
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