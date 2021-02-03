<?php include_once('../_header.php'); ?>
<style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: url("<?=base_url('assets/bggb.jpeg');?>");
            background-size: cover;
            width: 100%;
            height: 300px;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-primary">Beranda</h1>
            <p class="text-primary">Selamat datang <mark><?=$_SESSION['level'];?></mark> di website BPDASHL Barito</p>
            <a href="#menu-toggle"  id="menu-toggle" ></a>
            <!-- <span class="glyphicon glyphicon-home" > -->
        </div>
    </div>

<?php include_once('../_footer.php'); ?>