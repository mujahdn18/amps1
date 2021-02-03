<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>SPT</h1>
            <h4>
                <small>Edit Data Surat Perintah Tugas</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_spt = mysqli_query($con, "SELECT * FROM tb_spt WHERE id_spt = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_spt);
                ?>
                <?php
                $id_sp = @$_GET['id_sp'];
                $sql_surat_pegawai = mysqli_query($con, "SELECT * FROM tb_surat_pegawai WHERE id = '$id_sp'") or die (mysqi_error($con));
                $data_sp = mysqli_fetch_array($sql_surat_pegawai);
                ?>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="no_surat_spt">No Surat</label>
                            <input type="hidden" name="id" value="<?=$data['id_spt']?>">
                            <input type="hidden" name="id_sp" value="<?=$data_sp['id']?>">
                            <input type="text" name="no_surat_spt" id="no_surat_spt" value="<?=$data['no_surat_spt']?>" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="id_pegawai">Pegawai</label>
                            <select multiple name="id_pegawai[]" id="id_pegawai" class="form-control" size="5" required>
                                <?php
                                $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_pegawai ORDER BY nama_pegawai ASC") or die (mysqli_error($con)); 
                                while($data_pegawai = mysqli_fetch_array($sql_pegawai)) {
                                    echo '<option value="'.$data_pegawai['id_pegawai'].'">'.$data_pegawai['nama_pegawai'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <textarea name="perihal" id="perihal" class="form-control" required ><?=$data['perihal']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jangka_waktu">Jangka Waktu</label>
                            <input type="number" name="jangka_waktu" id="jangka_waktu" value="<?=$data['jangka_waktu']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="dari_tgl">Dari Tanggal</label>
                            <input type="date" name="dari_tgl" id="dari_tgl" value="<?=$data['dari_tgl']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sampai_tgl">Sampai Tanggal</label>
                            <input type="date" name="sampai_tgl" id="sampai_tgl" value="<?=$data['sampai_tgl']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_surat">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" id="tgl_surat" value="<?=$data['tgl_surat']?>" class="form-control" required>
                        </div>
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success">                            
                        </div>
                    </form>
                    <!-- <?php
                    $id_surat_pegawai = @$_GET['id_surat_pegawai'];
                    $sql_surat_pegawai = mysqli_query($con, "SELECT * FROM tb_surat_pegawai WHERE id = '$id_surat_pegawai'") or die (mysqi_error($con));
                    $data_surat_pegawai = mysqli_fetch_array($sql_surat_pegawai);
                    ?>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id_surat_pegawai" value="<?=$data['id']?>">
                        </div>
                    </from> -->
                </div>
            </div>
    </div>