<section class="ftco-section contact-section mt-5 mb-5">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Đăng ký</h2>
            <p>Đăng ký tài khoản.</p>
          </div>
        </div>
        <div class="row justify-content-center "  >
          <div class="col-md-6">
            <form  class="bg-light p-5 contact-form" method="post">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Tên đăng nhập" name="ten_dang_nhap" >
                <span style="color:red;"><?php echo $loi_ten  ?></span>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" >
                <span style="color:red;"><?php echo $loi_email  ?></span>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Mật khẩu" name="mat_khau" >
                <span style="color:red;"><?php echo $loi_mat_khau  ?></span>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="nhap_lai_mat_khau" >
                <span style="color:red;"><?php echo $loi_nhap_lai_mat_khau  ?></span>
              </div>
              <div class="form-group ">
                <input type="submit" value="Đăng ký" class="btn btn-primary  px-5 " name="dang_ky_btn">
                <span style="color:red;"><?php if(isset($thongbao)){
                  echo $thongbao;
                }else {
                  $thongbao = "";
                }
                  ?></span>
              </div>
            </form>
            <div class="signup-link">
              <p>Bạn đã có tài khoản? <a href="index.php?act=dang_nhap">Đăng nhập</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
