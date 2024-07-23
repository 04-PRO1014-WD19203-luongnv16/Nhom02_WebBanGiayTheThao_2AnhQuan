<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></span> <span>Cửa hàng</span></p>
            <h1 class="mb-0 bread">Cửa hàng</h1>
          </div>
        </div>
      </div>
    </div>
<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">
                    <?php 
foreach ($san_pham as $key => $sp) {

?>
   			<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
    				<div class="product d-flex flex-column">
    					<a href="index.php?act=chi_tiet_san_pham&id_ctsp=<?=$sp['id_san_pham'] ?>" class="img-prod"><img class="img-fluid" src="uploads/<?=$sp['hinh_anh'] ?>" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3">
    						<div class="d-flex">
    							<div class="cat">
		    						<span><?=$sp['ten_danh_muc'] ?></span>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right mb-0">
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    								<a href="#"><span class="ion-ios-star-outline"></span></a>
	    							</p>
	    						</div>
	    					</div>
    						<h3><a href="#"><?=$sp['ten_san_pham'] ?></a></h3>
    					
	    					<p class="bottom-area d-flex px-3">
								<?php if(isset($_SESSION['user'] )){ ?>
									<a href="index.php?act=chi_tiet_san_pham&id_ctsp=<?=$sp['id_san_pham'] ?>" class="add-to-cart text-center py-2 mr-1"><span>Thêm vào giỏ hàng	 <i class="ion-ios-add ml-1"></i></span></a>
									<a href="index.php?act=chi_tiet_san_pham&id_ctsp=<?=$sp['id_san_pham'] ?>" class="buy-now text-center py-2">Mua ngay<span><i class="ion-ios-cart ml-1"></i></span></a>
									<?php 
								}else{
									?> 
									<a onclick="yeu_cau_dn()" href="#" class="add-to-cart text-center py-2 mr-1"><span>Thêm vào giỏ hàng	 <i class="ion-ios-add ml-1"></i></span></a>
									<a onclick="yeu_cau_dn()"  href="#" class="buy-now text-center py-2">Mua ngay<span><i class="ion-ios-cart ml-1"></i></span></a>
									<?php
								}
								 ?>
    							
    						</p>
    					</div>
    				</div>
    			</div>
<?php 
}
?>

		    		</div>

		    	</div>

		    	<div class="col-md-4 col-lg-2">
		    		<div class="sidebar">
							<div class="sidebar-box-2">
								<h2 class="heading">Danh mục</h2>
								<div class="fancy-collapse-panel">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                     <div class="panel panel-default">
                         <div class="panel-heading" role="tab" id="">
                             <h4 class="panel-title">
                             <a href="index.php?act=cua_hang" >Tất cả  </a>
                                <?php 
                                foreach ($danh_muc as $key => $dm) {
                                ?>
                                    <a href="index.php?act=cua_hang&iddm=<?=$dm['id_danh_muc'] ?>" ><?=$dm['ten_danh_muc'] ?>
                                    </a>
                                <?php
                                }
                                ?>
                             
                             </h4>
                         </div>
                     </div>
           
                  </div>
               </div>
							</div>

						</div>
    			</div>
    		</div>
    	</div>
    </section>
