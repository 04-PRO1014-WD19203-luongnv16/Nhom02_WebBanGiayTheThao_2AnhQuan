<section class="ftco-section contact-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2 class="mb-4">Đăng nhập</h2>
        <p>Đăng nhập vào tài khoản của bạn.</p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="#" class="bg-light p-5 contact-form" method="post">
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Mật khẩu" name="mat_khau">
          </div>
          <div class="form-group">
            <input type="submit" value="Đăng nhập" class="btn btn-primary px-5" name="dang_nhap_btn">
            <span style="color:red;">
              <?php
              if (isset($thongbao)) {
                echo $thongbao;
              } else {
                $thongbao = "";
              }
              ?>
            </span>
          </div>
        </form>
        <div class="signup-link">
          <p>Bạn chưa có tài khoản? <a href="index.php?act=dang_ky">Đăng ký</a></p>
        </div>
      </div>
    </div>
  </div>
</section>
