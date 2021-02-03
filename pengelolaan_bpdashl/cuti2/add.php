<?php 
include_once('../_header2.php');
?>

    <div class="box">
        <h1>Surat Cuti</h1>
            <h4>
                <small>Tambah Data Surat Cuti</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="tgl_cuti">Tanggal Cuti</label>
                            <input type="date" name="tgl_cuti" id="tgl_cuti" value="<?=date('Y-m-d')?>" class="form-control" required autofocus>
                        </div> 
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <select name="perihal" id="perihal" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="Cuti Tahunan">Cuti Tahunan</option>
                                <option value="Cuti Besar">Cuti Besar</option>
                                <option value="Cuti Sakit">Cuti Sakit</option>
                                <option value="Cuti Bersalin">Cuti Bersalin</option>
                                <option value="Cuti karena alasan penting">Cuti karena alasan penting</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_pegawai">Nama Pegawai</label>
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
                            <label for="jangka_hari">Jangka Hari</label>
                            <input type="number" name="jangka_hari" id="jangka_hari" class="form-control" required >
                        </div> 
                        <div class="form-group">
                            <label for="dari_tgl">Dari Tanggal</label>
                            <input type="date" name="dari_tgl" id="dari_tgl" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="sampai_tgl">Sampai Tanggal</label>
                            <input type="date" name="sampai_tgl" id="sampai_tgl" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" required ></textarea>
                        </div>      
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="add" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>