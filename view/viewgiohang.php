<?php 

if(isset($_SESSION['user'])){
?> 
<style>
.quantity-btn {
    min-width: 40px;
    text-align: center;
    padding: 5px 10px; /* Khoảng cách bên trong nút */
    border-radius: 5px; /* Đường viền cong cho nút */
    color: #495057;
    background-color: #fff; /* Màu nền của nút */
    border: 1px solid #ced4da; /* Viền của nút */
    transition: all 0.3s ease;
    display: inline-block;
	font-size: 25px;
    text-decoration: none; /* Loại bỏ gạch chân mặc định */
}

.quantity-btn:hover {
    background-color: #e9ecef; /* Màu nền khi di chuột qua */
    color: #007bff;
    text-decoration: none; /* Loại bỏ gạch chân khi di chuột qua */
}

.quantity-btn.increase-btn {
    margin-right: -1px; /* Điều chỉnh khoảng cách giữa các nút */
    border-top-right-radius: 0; /* Đường viền cong bên phải trên */
    border-bottom-right-radius: 0; /* Đường viền cong bên phải dưới */
}

.quantity-btn.decrease-btn {
    border-top-left-radius: 0; /* Đường viền cong bên trái trên */
    border-bottom-left-radius: 0; /* Đường viền cong bên trái dưới */
}

.quantity-btn:hover {
    text-decoration: none; /* Loại bỏ gạch chân khi di chuột qua */
}

.quantity-btn:focus {
    outline: none; /* Loại bỏ đường viền khi tập trung */
}

.quantity-btn:active {
    background-color: #ccc; /* Màu nền khi click */
}
</style>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span> <span>Giỏ hàng</span></p>
            <h1 class="mb-0 bread">Giỏ hàng của bạn</h1>
          </div>
        </div>
      </div>
    </div>
<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
                                <th>STT</th>
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Sản phẩm</th>
                                <th>Loại</th>
						        <th>Giá</th>
						        <th>Số lượng</th>
						        <th>Tổng</th>
						      </tr>
						    </thead>
						    <tbody>
                                <?php 
								
                                if(isset($gio_hang)){
									
                                    $tong_gio_hang  = 0;
                                    foreach ($gio_hang as $key => $value) {
                                        ?>
     <tr class="text-center">
         <td><?=$key+1?></td>
                                     <td class="product-remove"><a href="index.php?act=xoa_toan_bo_gio_hang&idxgh=<?=$value['id_bien_the'] ?>"><span class="ion-ios-close"></span></a></td>
                                     
                                     <td class="image-prod"><div class="img" style="background-image:url(uploads/<?=$value['hinh_anh'] ?>);"></div></td>
                                     
                                     <td class="product-name">
                                         <h3><?=$value['ten_san_pham'] ?></h3>
                                         <p><?=$value['mo_ta'] ?></p>
                                     </td>
                                     <td>size <?=$value['size_name'] ?></td>
                                     <td class="price"><?php
                                     $gia_tam = $value['gia_ban'] * $value['sale'] / 100;
                                     $gia_ban_ra = $value['gia_ban'] - $gia_tam;
                                     echo number_format($gia_ban_ra);
                                     ?> Đồng</td>
                 
									 <td class="quantity">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <a href="index.php?act=view_gio_hang&giam=<?=$value['id_bien_the']?>" class="btn btn-outline-secondary quantity-btn increase-btn">-</a>
        </div>
        <input type="number" name="quantity" class="quantity form-control input-number" value="<?=$value['so_luong'] ?>" min="1">
        <div class="input-group-append">
            <a href="index.php?act=view_gio_hang&tang=<?=$value['id_bien_the']?>" class="btn btn-outline-secondary quantity-btn decrease-btn">+</a>
        </div>
    </div>
</td>




                                     <?php 
                                     $tong_gia_i = $gia_ban_ra * $value['so_luong'];
                                     $tong_gio_hang += $tong_gia_i
                                     ?>
                                     <td class="total"><?= number_format($tong_gia_i) ?> Đồng</td>
                                   </tr><!-- END TR-->
                                        <?php 
                                     }
                                }else {
                                    ?>
                                    <p>Giỏ hàng trống</p>
                                    <?php
                                }
                               
                                ?>
						      

						    </tbody>
						  </table>
					  </div>
					  <div class="row justify-content-start">
						<div class="col-md-12 mt-5 text-center">
							<a href="index.php?act=cua_hang" class="btn btn-secondary py-3 px-4">Tiếp tục mua hàng</a>
							<a onclick="return xoa_toan_bo_gio_hang()" href="index.php?act=xoa_toan_bo_gio_hang" class="btn btn-danger py-3 px-4">Xóa giỏ hàng</a>
						</div>
					</div>
    			</div>
    		</div>
    		<div class="row justify-content-start">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Tổng giỏ hàng</h3>
    					<p class="d-flex">
    						<span>Tổng giá giỏ hàng</span>
    						<span><?php if(isset($tong_gio_hang)){echo number_format($tong_gio_hang)." Đồng";  }else{ echo "0 Đồng" ;} ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Sale</span>
    						<span><?php if(isset($sale_of)){echo $sale_of . " %";}else{$sale_of =0; echo $sale_of ." %"; } ?></span>
    					</p>
    					
    					<hr>
    					<p class="d-flex total-price">
    						<span>Tổng</span>
    						<span><?php $tong_tien = $tong_gio_hang * $sale_of / 100; 
							$thanh_toan = $tong_gio_hang  -$tong_tien;
							if(isset($thanh_toan)){ echo number_format($thanh_toan) ." Đồng"; }else { $thanh_toan = $tong_gio_hang; echo $thanh_toan ." Đồng";}
							?></span>
    					</p>
    				</div>
					<form action="index.php?act=thanh_toan" method="post">
						<input type="hidden" name="tong_gio_hang" value="<?=$tong_gio_hang?>" >
						<input type="hidden" name="sale_of" value="<?=$sale_of?>" >
						<?php foreach ($gio_hang as $key => $v) : ?>
        					<input type="hidden" name="id_bien_the[]" value="<?=$v['id_bien_the'] ?>">
        					<input type="hidden" name="so_luong[]" value="<?=$v['so_luong'] ?>">
        					<input type="hidden" name="size_name[]" value="<?=$v['size_name'] ?>">
        					<input type="hidden" name="hinh_anh[]" value="<?=$v['hinh_anh'] ?>">
    					<?php endforeach; ?>
						<input type="hidden" name="id_tai_khoan" id="" value="<?=$_SESSION['user']['id_tai_khoan'] ?>" >
						<input type="submit" class ="btn btn-primary py-3 px-4" value="Tiến hàng thanh toán" name="thanh_toan_btn" >
					</form>
    				
    			</div>
    		</div>
			</div>
		</section>
<?php
}else {
	header("location:index.php");
}
?>

