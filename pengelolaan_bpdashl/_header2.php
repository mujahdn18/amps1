<?php
    require_once "config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AMPS BPDASHL Barito</title>
    <link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/simple-sidebar.css');?>" rel="stylesheet">    
    <link href="<?=base_url('assets/libs/DataTables/datatables.min.css');?>" rel="stylesheet">
    <link rel="icon" href="<?=base_url('assets/bpdas.png')?>"> 
</head>
<body>
    <script src="<?=base_url('assets/js/jquery.js')?>"></script>  
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script> 
    <script src="<?=base_url('assets/libs/DataTables/datatables.min.js')?>"></script> 
    <style>
        .dropdown {
          position: relative;
          background-color: #006400;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #32cd32;
          min-width: 270px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          padding: 12px 16px;
          z-index: 1;
        }

        .dropdown:hover .dropdown-content {
          display: block;
        }
        .sidebar-nav{
            background-color: #006400;
        }
        .text-primary{
            color: white;
        }
        .text-new{
            color: #999999;
        }
        #sidebar-wrapper{
            background-color: #006400;
        }
        #text{
            color: white;
        }
        #icon{
            width: 20px;
            height: 20px;
            margin-top: -60px;
        }
        #img{
            width: 100px;
            height: 100px;
            margin-top: -60px;
        }
        #img-slideshow{
            width: 500px;
            height: 300px;
            margin-top: -60px;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-size: cover;
        }
        #main {
            background-color: #006400;
            align : center;
            width: 100%;
            height: 300px;
        }
        #text-dlm{
            background-color: #b87333;
            color: white;
            width: 250px;
            font-size: 20px;
            border: none;
        }
        #text:focus{
            outline: none;
        }
        hr{
            width: 290px;
            margin-top: 10px;
        }
        #sub{
            width: 290px;
            height: 30px;
            border: none;
        }
        #test{
            margin-left : 270px;
            margin-top : 100px
        }
    </style>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="<?=base_url('dashboard')?>"><span class="text-primary"><b><img src="<?=base_url('/assets/bpdas.png')?>" width="30" hight="30"> AMPS-BPDASHL.Brt</b></span></a>
                </li>
                <li>
                    <a href="<?=base_url('dashboard2')?>"><span class="glyphicon glyphicon-home" id="text"><span class="text-primary"> Beranda </span></span></a>
                </li>              
                <li class="dropdown">
                    <a href="#" id="text"><span class="glyphicon glyphicon-user"> Data Pegawai </span></a>
                    <div class="dropdown-content">
                        <a href="<?=base_url('pegawai2/data.php')?>"><span class="text-primary">Pengawai</span></a>
                </li>  
                <li class="dropdown">
                    <a href="#" id="text"><span class="glyphicon glyphicon-envelope"> Data Surat </span></a>
                    <div class="dropdown-content">
                        <a href="<?=base_url('spt2/data.php')?>"><span class="text-primary">Data SPT</span></a>
                        <a href="<?=base_url('spd2/data.php')?>"><span class="text-primary">Data SPD</span></a>
                        <a href="<?=base_url('spj2/data.php')?>"><span class="text-primary">Data SPJ</span></a>
                        <a href="<?=base_url('sm2/data.php')?>"><span class="text-primary">Data Surat Masuk</span></a>
                        <a href="<?=base_url('sk2/data.php')?>"><span class="text-primary">Data Surat Keluar</span></a>
                        <a href="<?=base_url('cuti2/data.php')?>"><span class="text-primary">Data Surat Cuti</span></a>
                    </div>
                </li> 
                <li>
                    <a href="<?=base_url('berita2/data.php')?>"><span class="glyphicon glyphicon-list-alt" id="text"> <span class="text-primary">Berita</span></span></a>
                </li>      
                <li>
                    <a href="<?=base_url('auth/logout.php')?>"><span class="glyphicon glyphicon-log-out" id="text"><span class="text-primary danger"> Logout </span></span></a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">

