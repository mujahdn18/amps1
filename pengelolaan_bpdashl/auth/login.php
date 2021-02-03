<?php
    require_once "../config/config.php";
    if (isset($_SESSION['user'])) {
        echo "<script>window.location='".base_url()."';</script>";
    } else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login - AMPS BPDASHL Barito</title>
    <link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="icon" href="<?=base_url('assets/bpdas.png')?>"> 
    <style type="text/css">
        #img{
            width: 100px;
            height: 100px;
            margin-top: -60px;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: url("<?=base_url('assets/bgnew.jpg');?>");
            background-size: cover;
        }
        #main {
            background-color: #006400;
            width: 350px;
            height: 400px;
            border-radius: 30px;
            margin-top: 20px
        }
        h1{
            color: white;
        }
        #text{
            background-color: #003300;
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
</head>
<body>
    <div id="wrapper" >
    <div class="container" >
    <?php
                if (isset($_POST['login'])) {
                        $user = trim(mysqli_real_escape_string($con, $_POST['user']));
                        $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
                
                        $query = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass'") or die (mysqli_error($con));
                        $data = mysqli_fetch_array($query);
                        $username = $data['username'];
                        $password = $data['password'];
                        $level = $data['level'];
                
                        if ($user==$username && $pass==$password) {
                            $_SESSION['nama'] = $username;
                            $_SESSION['level'] = $level;
                
                            if($level==='admin') {
                                echo "<script> alert(' Anda berhasil login. sebagai : $level');</script>";
                                echo "<meta http-equiv='refresh' content='0; url=../_header.php'>";
                            }else{
                                echo "<script> alert(' Anda berhasil login. sebagai : $level');</script>";
                                echo "<meta http-equiv='refresh' content='0; url=../_header2.php'>";
                            }
                        }else{
                            echo "<script> alert(' Username dan Password tidak ditemukan');</script>";
                                echo "<meta http-equiv='refresh' content='0; url=login.php'>";
                        }
                    }
                ?>
                </div>
        <div class="container" id="main">
            <div align="center" style="margin-top: 100px;">
                
                <form action="" method="post" class="navbar-form">
                    <img src="<?=base_url('/assets/bpdas.png')?>" id="img">
                    <h1>Login</h1>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
                        <input type="text" name="user" class="form-control" placeholder="Username" id="text" required autofocus>
                    </div>
                    <br><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
                        <input type="password" name="pass" class="form-control" placeholder="Password" id="text" required>
                    </div>
                    <br><br>
                    <div class="input-group">
                        <input type="submit" name="login" class="btn btn-deafult" value="Login" id="sub">
                    </div>
                </form>
            </div>
        </div>      
    </div>  
    <script src="<?=base_url('assets/js/jquery.js')?>"></script>  
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>      
</body>
</html>
<?php 
    }
?>
