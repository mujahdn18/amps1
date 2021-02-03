<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Surat Keluar</h1>
            <h4>
                <small>Edit Data Surat Keluar</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_sk = mysqli_query($con, "SELECT * FROM tb_sk WHERE id_sk = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_sk);
                ?>
                    <form action="proses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="no_surat_sk">No Surat</label>
                            <input type="hidden" name="id" value="<?=$data['id_sk']?>">
                            <input type="text" name="no_surat_sk" id="no_surat_sk" value="<?=$data['no_surat_sk']?>" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="tgl_surat">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" id="tgl_surat" value="<?=$data['tgl_surat']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="id_pegawai">Menangani Surat</label>
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
                            <label for="tujuan">Tujuan</label>
                            <input type="text" name="tujuan" id="tujuan" value="<?=$data['tujuan']?>" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <textarea name="perihal" id="perihal" class="form-control" required ><?=$data['perihal']?></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="jenis_surat">Jenis Surat</label>
                            <select name="jenis_surat" id="jenis_surat" class="form-control" required>
                                <option value="<?=$data['jenis_surat']?>"><?=$data['jenis_surat']?></option>
                                <option value="BA - BERITA ACARA">BA - BERITA ACARA</option>
                                <option value="BJ - BERITA ACARA SERAH TERIMA JABATAN">BJ - BERITA ACARA SERAH TERIMA JABATAN</option>
                                <option value="FAK - FAKSIMILE">FAK - FAKSIMILE</option>
                                <option value="INS - INSTRUKSI">INS - INSTRUKSI</option>
                                <option value="KS - SURAT KUASA">KS - SURAT KUASA</option>
                                <option value="KT- SURAT KETERANGAN">KT- SURAT KETERANGAN</option>
                                <option value="LP - LAPORAN">LP - LAPORAN</option>
                                <option value="M - MEMORANDUM">M - MEMORANDUM</option>
                                <option value="MM - MEMO">MM - MEMO</option>
                                <option value="ND - NOTA DINAS">ND - NOTA DINAS</option>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="klasifikasi_arsip">Klasifikasi Arsip</label>
                            <select name="klasifikasi_arsip" id="klasifikasi_arsip" class="form-control" required>
                                <option value="<?=$data['klasifikasi_arsip']?>"><?=$data['klasifikasi_arsip']?></option>
                                <option value="OTL.0-Organisasi">OTL.0-Organisasi</option>
                                <option value="OTL.1-Perumusan Jabatan">OTL.1-Perumusan Jabatan</option>
                                <option value="OTL.2-Tata Laksana">OTL.2-Tata Laksana</option>
                                <option value="PEG.0-Perencanaan Pegawai">PEG.0-Perencanaan Pegawai</option>
                                <option value="PEG.1-Pembinaan Karier Pegawai">PEG.1-Pembinaan Karier Pegawai</option>
                                <option value="PEG.2-Mutasi Pegawai">PEG.2-Mutasi Pegawai</option>
                                <option value="PEG.3-Administrasi Pegawai">PEG.3-Administrasi Pegawai</option>
                                <option value="PEG.4-Kesejahteraan Pegawai">PEG.4-Kesejahteraan Pegawai</option>
                                <option value="PEG.5-Pemberhentian Pegawai">PEG.5-Pemberhentian Pegawai</option>
                                <option value="PEG.6-Perselisihan Sengketa Kepegawaian">PEG.6-Perselisihan Sengketa Kepegawaian</option>
                                <option value="PEG.7-Penghargaan">PEG.7-Penghargaan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="unit_pengolah">Unit Pengolah</label>
                            <select name="unit_pengolah" id="unit_pengolah" class="form-control" required>
                                <option value="<?=$data['unit_pengolah']?>"><?=$data['unit_pengolah']?></option>
                                <option value="Tata Usaha">Tata Usaha</option>
                                <option value="Program">Program</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Evaluasi">Evaluasi</option>
                                <option value="RHL">RHL</option>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="dt_surat_masuk">Dengan/Tanpa Surat Masuk</label>
                            <select name="dt_surat_masuk" id="dt_surat_masuk" class="form-control" required>
                                <option value="<?=$data['dt_surat_masuk']?>"><?=$data['dt_surat_masuk']?></option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>                                              
                        <div class="form-group">
                            <label for="eselon">Eselon</label>
                            <select name="eselon" id="eselon" class="form-control" required>
                                <option value="<?=$data['eselon']?>"><?=$data['eselon']?></option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                            </select>
                        </div>   
                        <div class="form-group">
                            <label>Scan Surat Keluar (.pdf)</label>
                            <input type="file" class="form-control" value="<?=$data['file']?>" name="file" id="file" required>
                        </div> 
                        <div class="form-group">
                            <label for="sifat_surat">Sifat Surat</label>
                            <select name="sifat_surat" id="sifat_surat" class="form-control" required>
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