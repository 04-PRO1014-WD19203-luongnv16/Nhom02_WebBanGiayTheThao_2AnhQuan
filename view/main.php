<section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          	<img class="one-third order-md-last img-fluid" src="images/bg_1.png" alt="">
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">#Sản phẩm mới</span>
		          		<div class="horizontal">
				            <h1 class="mb-4 mt-3">Bộ sưu tập giày 2024</h1>
				            <p class="mb-4">
								Một dòng sông nhỏ tên Duden chảy ngang qua nơi này và mang lại nguồn cung cấp cần thiết. Đây là một thiên đường tráng lệ.</p>
				            
				            <p><a href="#" class="btn-custom">Khám phá ngay</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          	<img class="one-third order-md-last img-fluid" src="images/bg_2.png" alt="">
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">#Sản phẩm mới</span>
		          		<div class="horizontal">
				            <h1 class="mb-4 mt-3">Bộ sưu tập giày mùa đông mới</h1>
				            <p class="mb-4">Một dòng sông nhỏ tên Duden chảy ngang qua nơi này và mang lại nguồn cung cấp cần thiết. Đây là một thiên đường tráng lệ.</p>
				            
				            <p><a href="#" class="btn-custom">Khám phá ngay</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-bag"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Miễn phí vận chuyển</h3>
                <p>Để mang lại trải nghiệm mua sắm tốt nhất cho khách hàng, chúng tôi cung cấp dịch vụ vận chuyển miễn phí, giúp bạn tiết kiệm chi phí và thời gian. Hãy khám phá ngay!.</p>
              </div>
            </div>      
          </div>
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Hỗ trợ 24/7</h3>
                <p>Chúng tôi cam kết hỗ trợ khách hàng 24/7, luôn sẵn lòng giải đáp mọi thắc mắc và cung cấp sự giúp đỡ mọi lúc, mọi nơi. Đừng ngần ngại liên hệ với chúng tôi, chúng tôi luôn ở đây để hỗ trợ bạn!</p>
              </div>
            </div>    
          </div>
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-payment-security"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Thanh toán an toàn</h3>
                <p>Hệ thống thanh toán của chúng tôi được mã hóa mạnh mẽ và tuân thủ nghiêm ngặt các tiêu chuẩn bảo mật, giúp bảo vệ thông tin cá nhân và tài khoản của bạn. Bạn có thể yên tâm mua sắm trên trang web của chúng tôi mà không phải lo lắng về vấn đề bảo mật.</p>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

    <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Giày mới về</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
 
<?php 
foreach ($san_pham as $key => $sp) {

?>
   			<div class="col-sm-12 col-md-6 col-lg-3  ftco-animate d-flex">
    				<div class="product d-flex flex-column">
    					<a href="index.php?act=chi_tiet_san_pham&id_ctsp=<?=$sp['id_san_pham'] ?>" class="img-prod"><img class="img-fluid" src="uploads/<?=$sp['hinh_anh'] ?>" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
					
    					<div class="text py-3 pb-4 px-3">
    						<div class="d-flex">
    							<div class="cat">
		    						<span><?=$sp['ten_danh_muc'] ?></span>
		    					</div>
		    				
	    					</div>
    						<h3><a href="#"><?=$sp['ten_san_pham'] ?></a></h3>
    					
	    					<p class="bottom-area d-flex px-3">
								<?php  if(isset($_SESSION['user'])) { ?> 
									<a href="index.php?act=chi_tiet_san_pham&id_ctsp=<?=$sp['id_san_pham'] ?>" class="add-to-cart text-center py-2 mr-1"><span>Thêm vào giỏ hàng	 <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="index.php?act=chi_tiet_san_pham&id_ctsp=<?=$sp['id_san_pham'] ?>" class="buy-now text-center py-2">Mua ngay<span><i class="ion-ios-cart ml-1"></i></span></a>
									<?php  
									}else{
										?>
										<a onclick="yeu_cau_dn()" href="#" class="add-to-cart text-center py-2 mr-1"><span>Thêm vào giỏ hàng	 <i class="ion-ios-add ml-1"></i></span></a>
										<a onclick="yeu_cau_dn()" href="#" class="buy-now text-center py-2">Mua ngay<span><i class="ion-ios-cart ml-1"></i></span></a>
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
    </section>



    <section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
    	<div class="container">
				<div class="row no-gutters">
					<div class="col-lg-4">
						<div class="choose-wrap divider-one img p-5 d-flex align-items-end" style="background-image: url(images/choose-1.jpg);">

    					<div class="text text-center text-white px-2">
								<span class="subheading">Giày nam</span>
    						<h2>Bộ sưu tập dành cho nam</h2>
    						<p>Những đôi giày mới nhất dành cho các chàng trai</p>
    						<p><a href="index.php?act=cua_hang" class="btn btn-black px-3 py-2">Ghé thăm cửa hàng</a></p>
    					</div>
    				</div>
					</div>
					<div class="col-lg-8">
    				<div class="row no-gutters choose-wrap divider-two align-items-stretch">
    					<div class="col-md-12">
	    					<div class="choose-wrap full-wrap img align-self-stretch d-flex align-item-center justify-content-end" style="background-image: url(images/choose-2.jpg);">
	    						<div class="col-md-7 d-flex align-items-center">
	    							<div class="text text-white px-5">
	    								<span class="subheading">Giày nữ</span>
			    						<h2>Bộ sưu tập dành cho nam</h2>
			    						<p>Những đôi giày mới nhất dành cho các cô gái.</p>
			    						<p><a href="index.php?act=cua_hang" class="btn btn-black px-3 py-2">Ghé thăm cửa hàng</a></p>
			    					</div>
	    						</div>
	    					</div>
	    				</div>
    					<div class="col-md-12">
    						<div class="row no-gutters">
    							<div class="col-md-6">
		    						<div class="choose-wrap wrap img align-self-stretch bg-light d-flex align-items-center">
		    							<div class="text text-center px-5">
		    								<span class="subheading">Ưu đãi mùa hè</span>
				    						<h2>Giảm tới 50%</h2>
				    						<p>Những kiểu dáng năng động cho mùa hè nóng bức</p>
				    						<p><a href="index.php?act=cua_hang" class="btn btn-black px-3 py-2">Ghé thăm cửa hàng</a></p>
				    					</div>
		    						</div>
	    						</div>
	    						<div class="col-md-6">
		    						<div class="choose-wrap wrap img align-self-stretch d-flex align-items-center" style="background-image: url(images/choose-3.jpg);">
		    							<div class="text text-center text-white px-5">
		    								<span class="subheading">Những đôi giày tốt nhất</span>
				    						<h2>Bán chạy nhất</h2>
				    						<p>Những sản phẩm tốt nhất của chúng tôi sẽ làm bạn bất ngờ</p>
				    						<p><a href="index.php?act=cua_hang" class="btn btn-black px-3 py-2">Ghé thăm cửa hàng</a></p>
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

    <section class="ftco-section ftco-deal bg-primary">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6">
    				<img src="images/prod-1.png" class="img-fluid" alt="">
    			</div>
    			<div class="col-md-6">
    				<div class="heading-section heading-section-white">
    					<span class="subheading">Deal of the month</span>
	            <h2 class="mb-3">Deal of the month</h2>
	          </div>
    				<div id="timer" class="d-flex mb-4">
						  <div class="time" id="days"></div>
						  <div class="time pl-4" id="hours"></div>
						  <div class="time pl-4" id="minutes"></div>
						  <div class="time pl-4" id="seconds"></div>
						</div>
						<div class="text-deal">
							<h2><a href="#">Nike Free RN 2019 iD</a></h2>
							<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
							<ul class="thumb-deal d-flex mt-4">
								<li class="img" style="background-image: url(images/product-6.png);"></li>
								<li class="img" style="background-image: url(images/product-2.png);"></li>
								<li class="img" style="background-image: url(images/product-4.png);"></li>
							</ul>
						</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row">
        	<div class="col-lg-5">
        		<div class="services-flow">
        			<div class="services-2 p-4 d-flex ftco-animate">
        				<div class="icon">
        					<span class="flaticon-bag"></span>
        				</div>
        				<div class="text">
	        				<h3>Miễn phí vận chuyển</h3>
	        				<p class="mb-0">Separated they live in. A small river named Duden flows</p>
        				</div>
        			</div>
        			<div class="services-2 p-4 d-flex ftco-animate">
        				<div class="icon">
        					<span class="flaticon-heart-box"></span>
        				</div>
        				<div class="text">
	        				<h3>Rinh ngay quà xịn</h3>
	        				<p class="mb-0">Separated they live in. A small river named Duden flows</p>
	        			</div>
        			</div>
        			<div class="services-2 p-4 d-flex ftco-animate">
        				<div class="icon">
        					<span class="flaticon-payment-security"></span>
        				</div>
        				<div class="text">
	        				<h3>Hỗ trợ 24/7</h3>
	        				<p class="mb-0">Separated they live in. A small river named Duden flows</p>
	        			</div>
        			</div>
        			<div class="services-2 p-4 d-flex ftco-animate">
        				<div class="icon">
        					<span class="flaticon-customer-service"></span>
        				</div>
        				<div class="text">
	        				<h3>Bảo mật thanh toán</h3>
	        				<p class="mb-0">Separated they live in. A small river named Duden flows</p>
	        			</div>
        			</div>
        		</div>
        	</div>
          <div class="col-lg-7">
          	<div class="heading-section ftco-animate mb-5">
	            <h2 class="mb-4">Khách hàng của chúng tôi nói</h2>
	            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
	          </div>
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap">
                  <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap">
                  <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap">
                  <div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap">
                  <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">Web Developer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap">
                  <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">System Analyst</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-gallery">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-8 heading-section text-center mb-4 ftco-animate">
            <h2 class="mb-4">Theo dõi chúng tôi trên facebook</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
    		</div>
    	</div>
    	<div class="container-fluid px-0">
    		<div class="row no-gutters">
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-5.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-5.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-6.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-6.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>
