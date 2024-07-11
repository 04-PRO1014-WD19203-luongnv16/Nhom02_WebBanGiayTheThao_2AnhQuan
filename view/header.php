<!DOCTYPE html>
<html lang="en">
  <head>
    <title>A2Q-Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">A2Q-Shop</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse align-items-center"id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Trang chủ</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link " href="index.php?act=cua_hang" >Cửa hàng</a>         
            </li>
	          <li class="nav-item"><a href="index.php?act=ve_chung_toi" class="nav-link">Về chúng tôi</a></li>
	          <li class="nav-item"><a href="index.php?act=blog" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="index.php?act=lien_he" class="nav-link">Liên hệ</a></li>
	          <li class="nav-item cta cta-colored"><a href="index.php?act=gio_hang" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
			  <li class="nav-item cta cta-colored">
				
				                
                    <?php 
                    if(isset($_SESSION['user'])){
                        if($_SESSION['user']['vai_tro'] == 0){
?>
   <span class="nav-link d-inline-block">
   <a class="nav-link text-dark d-inline" href="">Xin chào</a>,
        <span class="d-inline"><?= $_SESSION['user']['ten_dang_nhap'] ?></span>
        <a class="nav-link text-danger d-inline" href="index.php?act=dang_xuat">Đăng xuất</a>
    </span> 
<?php
                        }elseif($_SESSION['user']['vai_tro'] == 1){
                            ?>
                              <span class="nav-link d-inline-block">
                            <a class="nav-link text-dark d-inline" href="admin/index.php">Tới admin</a>,
                            <span class="d-inline "><?= $_SESSION['user']['ten_dang_nhap'] ?></span> 
                            <a class="nav-link text-danger d-inline" href="index.php?act=dang_xuat">Đăng xuất</a>
                        </span>
                            <?php  
                        }else {
                            ?>
                            <a href="index.php?act=dang_nhap" class="nav-link">
                            	<span class="icon-user"></span>  
                                </a>
                            <?php
                        }

                    }else {
                        ?>
                            <a href="index.php?act=dang_nhap" class="nav-link">
                            	<span class="icon-user"></span>  
                                </a>
                            <?php
                    }
                    ?>
				
			</li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->