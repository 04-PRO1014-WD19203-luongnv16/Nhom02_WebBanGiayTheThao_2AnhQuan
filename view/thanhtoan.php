
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span> <span>Thanh toán</span></p>
            <h1 class="mb-0 bread">Thanh toán</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
						<form action="index.php?act=xac_nhan" class="billing-form" method="post" >
							<h3 class="mb-4 billing-heading">Chi tiết thanh toán</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Họ tên</label>
	                  <input type="text" class="form-control" placeholder="Nhập họ tên của bạn" name="ten_dang_nhap" >
	                </div>
	              </div>
				  <div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Địa chỉ</label>
	                  <input type="text" class="form-control" placeholder="Nhập địa chỉ của bạn" name="dia_chi">
	                </div>
	              </div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" class="form-control" placeholder="" name="sdt">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="text" class="form-control" placeholder="" name="email">
	                </div>
                </div>
	            </div>
                <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-6 d-flex">
	          		<div class="cart-detail cart-total bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Tổng hóa đơn</h3>
	          			<p class="d-flex">
		    						<span>Tổng tạm</span>
		    						<span><?=number_format($tong_gio_hang)?></span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Sale</span>
		    						<span><?=number_format($sale_of)?></span>
		    					</p>
		    					
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Tổng</span>
		    						<span><?php $tong_tien = $tong_gio_hang * $sale_of / 100; 
							$thanh_toan = $tong_gio_hang  -$tong_tien;
							if(isset($thanh_toan)){ echo number_format($thanh_toan) ." Đồng"; }else { $thanh_toan = $tong_gio_hang; echo $thanh_toan ." Đồng";}
							?></span>
							<input type="hidden" name="tong_tien" id="" value="<?=$tong_tien?>" >
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-6">
	          		<div class="cart-detail bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" value="0" name="thanh_toan" class="mr-2"> Thanh toán khi nhận hàng</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" value="1" name="thanh_toan" class="mr-2"> Chuyển khoản</label>
											</div>
										</div>
									</div>
								
									
									<input type="hidden" name="amount" value="<?= $tong_gio_hang ?>">
    								<input type="hidden" name="partnerCode" value="<?= $partnerCode ?>">
    								<input type="hidden" name="accessKey" value="<?= $accessKey ?>">
    								<input type="hidden" name="secretKey" value="<?= $secretKey ?>">
    								<input type="hidden" name="redirectUrl" value="<?= $redirectUrl ?>">
    								<input type="hidden" name="ipnUrl" value="<?= $ipnUrl ?>">
    								
                                    <input class="btn btn-primary py-3 px-4" type="submit" name="dat_hang_btn" id="" value="Đặt hàng" >
								</div>
	          	</div>
	          </div>
	          </form><!-- END -->



	        
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
