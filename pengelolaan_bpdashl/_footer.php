            </div>
        </div>
    </div>  
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <body>
    <div id="wrapper" >
    <div class="container" >
    <main class="slideshow">
            <marquee id="coba1" behavior="alternate">
            <a href=""><img src="<?=base_url('/assets/bpdas1.png')?>" id="img-slideshow"></a>
            <a href=""><img src="<?=base_url('/assets/bpdas2.jpg')?>" id="img-slideshow"></a>
            <a href=""><img src="<?=base_url('/assets/bpdas3.jpg')?>" id="img-slideshow"></a>
            <a href=""><img src="<?=base_url('/assets/bpdas4.png')?>" id="img-slideshow"></a>
            <a href=""><img src="<?=base_url('/assets/bpdas5.jpg')?>" id="img-slideshow"></a>
            <a href=""><img src="<?=base_url('/assets/bpdas6.png')?>" id="img-slideshow"></a>
            <a href=""><img src="<?=base_url('/assets/bpdas7.jpg')?>" id="img-slideshow"></a>
            <a href=""><img src="<?=base_url('/assets/bpdas8.jpg')?>" id="img-slideshow"></a>
            </marquee>
            </main>
            <br><br><br>
            <h1 align="center" class="text-primary"> - Berita - </h1>
            <br>
            <?php           
                    $query = "SELECT * FROM tb_berita
                            INNER JOIN tb_pegawai ON tb_berita.id_pegawai = tb_pegawai.id_pegawai
                            ";                                   
                    $sql_berita = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_berita)) { ?>
                            <div class="text-primary">
                                <div class="media-body">
                                    <h3 class="mt-0"><?=$data['judul_berita']?></h3>
                                    <img src="../assets/img_berita/<?=$data['foto_berita']?> " hight="200" width="300px" class="mr-3" alt="...">
                                    <h6><?=tgl_indo($data['tgl_berita'])?></h6>
                                    <h6>Oleh : <?=$data['nama_pegawai']?></h6>
                                    <p><?=$data['isi_berita']?></p> <br><br>
                                </div>
                            </div>
                    <?php
                    }                    
                    ?>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.608777777186!2d114.85096561428738!3d-3.4449295427602573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de6811cdd9bad43%3A0x94b60bcf41d38f46!2sBPDASHL%20BARITO!5e0!3m2!1sid!2sid!4v1592899053577!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="container" id="main">
        <div align="center">
        <form >
            <div align="left"  class="text-primary"  >  
                <h5>Contact Person :</h5>
                <h5>0882-4745-8875</h5>
            </div>
            <br><br>
            <div align="left"  class="text-new"  >  
                <a href="https://web.facebook.com/muja.dxc" target="_blank"><img src="<?=base_url('/assets/fb_b.png')?>" id="icon"></a>
                <a href="https://www.youtube.com/channel/UC0N2Of9_paWPALDWCvIn17A/videos" target="_blank"><img src="<?=base_url('/assets/yt_b.png')?>" id="icon"></a> 
                <a href="https://www.instagram.com/muhammadmujahidin__/" target="_blank"><img src="<?=base_url('/assets/ig_b.png')?>" id="icon"></a>
                <a href="https://twitter.com/login?lang=id" target="_blank"><img src="<?=base_url('/assets/tw_b.png')?>" id="icon"></a>
            </div>
            <div align="center" class="text-primary" >  
                <img src="<?=base_url('/assets/bpdas.png')?>" id="img">  
                <h4>APLIKASI MANAJEMEN PENGELOLAAN SURAT BERBASIS WEB</h4>
                <h4>PADA BALAI PENGELOLAAN DAERAH ALIRAN SUNGAI</h4>
                <h4>DAN HUTAN LINDUNG BARITO</h4>
            </div>
            <div align="center" style="margin-top: 20px;" class="text-primary" >  
                <h6>copyright &copy;</h6>
            </div>
            </form>
            </div>
        </div>      
    </div>  
    </div>
    </body>
</body>
</html>