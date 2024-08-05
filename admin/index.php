<?php 
session_start();
ob_start();
include '../models/pdo.php';
include '../models/danhmuc.php';
include '../models/size.php';
include '../models/sanpham.php';
include '../models/hoadon.php';
include '../models/thongke.php';
include '../models/taikhoan.php';
include '../models/binhluan.php';
include '../models/giamgia.php';
include 'view/header.php';

if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        # Danh mục
        case 'danh_muc':
             $danh_muc = tat_ca_danh_muc();
            include 'view/danhmuc/list.php';
            break;
        case 'them_danh_muc':
        if(isset($_POST['them_btn'])) {
                        $ten_danh_muc = $_POST['ten_danh_muc'];
                        
                        if(empty($ten_danh_muc)) {
                            $thongbao = "Vui lòng nhập tên danh mục";
                        } else {
                            $check = check_danh_muc($ten_danh_muc);
                            
                            if($check !== false) {
                                $thongbao = "Danh mục đã tồn tại";
                            } else {
                                them_moi_danh_muc($ten_danh_muc);
                               
                            }
                        }
                    }
                    $danh_muc = tat_ca_danh_muc();
                    include 'view/danhmuc/list.php';
            break;
        case 'xoa_danh_muc':
         if(isset($_GET['iddm'])){
            $iddm = $_GET['iddm'];
            xoa_danh_muc($iddm);
            $danh_muc = tat_ca_danh_muc();
            include 'view/danhmuc/list.php';
            }
            break;
            case 'danh_muc_da_xoa':
            $danh_muc_da_xoa = tat_ca_danh_muc_da_xoa();
            include 'view/danhmuc/list_delete.php';
            break;
            case 'khoi_phuc_danh_muc':
            if(isset($_GET['id_dmdx'])){
            $iddm = $_GET['id_dmdx'];
            khoi_phuc_danh_muc($iddm);
            $danh_muc_da_xoa = tat_ca_danh_muc_da_xoa();
            include 'view/danhmuc/list_delete.php';
            }
            break;
        case 'danh_muc_da_xoa':
          $danh_muc_da_xoa = tat_ca_danh_muc_da_xoa();
            include 'view/danhmuc/list_delete.php';
            break;
        case 'khoi_phuc_danh_muc':
        if(isset($_GET['id_dmdx'])){
            $iddm = $_GET['id_dmdx'];
            khoi_phuc_danh_muc($iddm);
            $danh_muc_da_xoa = tat_ca_danh_muc_da_xoa();
            include 'view/danhmuc/list_delete.php';
            }
            break;
        case 'khoi_phuc_toan_bo_danh_muc':
         khoi_phuc_toan_bo_danh_muc();
            $danh_muc_da_xoa = tat_ca_danh_muc_da_xoa();
            include 'view/danhmuc/list_delete.php';
            break;
        case 'sua_danh_muc':
        if(isset($_GET['idsdm'])){
                $id_danh_muc = $_GET['idsdm'];
                $one_danh_muc =show_1_danh_muc($id_danh_muc);
            }
            include 'view/danhmuc/fix.php';
            break;
        case 'update_danh_muc':
        if (isset($_POST['sua_btn'])) {
                    $id_danh_muc = $_POST['id_danh_muc'];
                    $ten_danh_muc = $_POST['ten_danh_muc'];
                    $errors = array();
            
                    // Validate tên danh mục
                    if (empty(trim($ten_danh_muc))) {
                        $errors[] = "Tên danh mục không được để trống.";
                    }
            
                    // Nếu không có lỗi, cập nhật danh mục
                    if (empty($errors)) {
                        sua_danh_muc($id_danh_muc, $ten_danh_muc);
                      
                       
                        header('Location: index.php?act=danh_muc');
                       
                        exit();
                    } else {
                        // Nếu có lỗi, lấy lại dữ liệu danh mục
                        $one_danh_muc = show_1_danh_muc($id_danh_muc);
                    }
                } else {
                    // Nếu không phải là POST request, lấy thông tin danh mục
                    if (isset($_GET['idsdm'])) {
                        $id_danh_muc = $_GET['idsdm'];
                        $one_danh_muc = show_1_danh_muc($id_danh_muc);
                    }
                }
            
                $danh_muc = tat_ca_danh_muc();
                include 'view/danhmuc/fix.php';
            break;
           
        # Size
        case 'size':
            $size = tat_ca_size();
            include 'view/size/list.php';
            break;
        case 'them_size':
            if(isset($_POST['them_btn'])) {
                $ten_size = $_POST['ten_size'];
                        
                if(empty($ten_size)) {
                    $thongbao = "Vui lòng nhập size";
                } else {
                    $check =  check_size($ten_size);
                            
                    if($check !== false) {
                        $thongbao = "Size đã tồn tại";
                    } else {
                        them_moi_size($ten_size);          
                    }
                }
            }
            $size = tat_ca_size();
            include 'view/size/list.php';
            break;
        case 'xoa_size':
            if(isset($_GET['idsz'])){
                $idsz = $_GET['idsz'];
                xoa_size($idsz);
                $size = tat_ca_size();
                include 'view/size/list.php';
            }
            break;
        case 'size_da_xoa':
            $tat_ca_size_da_xoa = tat_ca_size_da_xoa();
            include 'view/size/list_delete.php';
            break;
        case 'khoi_phuc_size':
            if(isset($_GET['id_szdx'])){
                $id_szdx = $_GET['id_szdx'];
                khoi_phuc_size($id_szdx);
                $tat_ca_size_da_xoa = tat_ca_size_da_xoa();
                include 'view/size/list_delete.php';
            }
            break;
        case 'khoi_phuc_toan_bo_size':
            khoi_phuc_toan_bo_size();
            $tat_ca_size_da_xoa = tat_ca_size_da_xoa();
            include 'view/size/list_delete.php';
            break;
        case 'sua_size':
            if(isset($_GET['idssz'])){
                $id_size = $_GET['idssz'];
                $one_size =show_1_size($id_size);
            }
            include 'view/size/fix.php';
            break;
        case 'update_size':
            if (isset($_POST['sua_btn'])) {
                $id_size = $_POST['id_size'];
                $ten_size = $_POST['ten_size'];
                $errors = array();
                
                // Validate tên danh mục
                if (empty(trim($ten_size))) {
                    $errors[] = "Không được để trống Size.";
                }
                
                // Nếu không có lỗi, cập nhật danh mục
                if (empty($errors)) {
                    sua_size($id_size,$ten_size);
                    header('Location: index.php?act=size');  
                    exit();
                } else {
                    // Nếu có lỗi, lấy lại dữ liệu danh mục
                    $one_size =show_1_size($id_size);
                }
            } else {
                // Nếu không phải là POST request, lấy thông tin danh mục
                if(isset($_GET['idssz'])){
                    $id_size = $_GET['idssz'];
                    $one_size =show_1_size($id_size);
                }
            } 
            $size = tat_ca_size();
            include 'view/size/fix.php';
            break;

        # Sản phẩm
        case 'san_pham':
          $danh_muc = tat_ca_danh_muc();
            include 'view/danhmuc/list.php';
            break;
        case 'them_danh_muc':
        if(isset($_POST['them_btn'])) {
                        $ten_danh_muc = $_POST['ten_danh_muc'];
                        
                        if(empty($ten_danh_muc)) {
                            $thongbao = "Vui lòng nhập tên danh mục";
                        } else {
                            $check = check_danh_muc($ten_danh_muc);
                            
                            if($check !== false) {
                                $thongbao = "Danh mục đã tồn tại";
                            } else {
                                them_moi_danh_muc($ten_danh_muc);
                               
                            }
                        }
                    }
                    $danh_muc = tat_ca_danh_muc();
                    include 'view/danhmuc/list.php';
            break;
        case 'xoa_danh_muc':
         if(isset($_GET['iddm'])){
            $iddm = $_GET['iddm'];
            xoa_danh_muc($iddm);
            $danh_muc = tat_ca_danh_muc();
            include 'view/danhmuc/list.php';
            }
            break;
            case 'danh_muc_da_xoa':
            $danh_muc_da_xoa = tat_ca_danh_muc_da_xoa();
            include 'view/danhmuc/list_delete.php';
            break;
            case 'khoi_phuc_danh_muc':
            if(isset($_GET['id_dmdx'])){
            $iddm = $_GET['id_dmdx'];
            khoi_phuc_danh_muc($iddm);
            $danh_muc_da_xoa = tat_ca_danh_muc_da_xoa();
            include 'view/danhmuc/list_delete.php';
            }
            break;
        case 'danh_muc_da_xoa':
          $danh_muc_da_xoa = tat_ca_danh_muc_da_xoa();
            include 'view/danhmuc/list_delete.php';
            break;
        case 'khoi_phuc_danh_muc':
        if(isset($_GET['id_dmdx'])){
            $iddm = $_GET['id_dmdx'];
            khoi_phuc_danh_muc($iddm);
            $danh_muc_da_xoa = tat_ca_danh_muc_da_xoa();
            include 'view/danhmuc/list_delete.php';
            }
            break;
        case 'khoi_phuc_toan_bo_danh_muc':
         khoi_phuc_toan_bo_danh_muc();
            $danh_muc_da_xoa = tat_ca_danh_muc_da_xoa();
            include 'view/danhmuc/list_delete.php';
            break;
        case 'sua_danh_muc':
        if(isset($_GET['idsdm'])){
                $id_danh_muc = $_GET['idsdm'];
                $one_danh_muc =show_1_danh_muc($id_danh_muc);
            }
            include 'view/danhmuc/fix.php';
            break;
        case 'update_danh_muc':
        if (isset($_POST['sua_btn'])) {
                    $id_danh_muc = $_POST['id_danh_muc'];
                    $ten_danh_muc = $_POST['ten_danh_muc'];
                    $errors = array();
            
                    // Validate tên danh mục
                    if (empty(trim($ten_danh_muc))) {
                        $errors[] = "Tên danh mục không được để trống.";
                    }
            
                    // Nếu không có lỗi, cập nhật danh mục
                    if (empty($errors)) {
                        sua_danh_muc($id_danh_muc, $ten_danh_muc);
                      
                       
                        header('Location: index.php?act=danh_muc');
                       
                        exit();
                    } else {
                        // Nếu có lỗi, lấy lại dữ liệu danh mục
                        $one_danh_muc = show_1_danh_muc($id_danh_muc);
                    }
                } else {
                    // Nếu không phải là POST request, lấy thông tin danh mục
                    if (isset($_GET['idsdm'])) {
                        $id_danh_muc = $_GET['idsdm'];
                        $one_danh_muc = show_1_danh_muc($id_danh_muc);
                    }
                }
            
                $danh_muc = tat_ca_danh_muc();
                include 'view/danhmuc/fix.php';
            break;

        # Sản phẩm
        case 'san_pham':
      $iddm =0;
                    if(isset($_POST['tim_btn'])){
                        $iddm = $_POST['danh_muc'];
    
                    }
                    $danh_muc =tat_ca_danh_muc();
                    $san_pham = tat_ca_san_pham($iddm);
                    include 'view/sanpham/list.php';
            break;
        case 'them_san_pham':
      $dem = 0;
                        $loi_ten = $loi_danh_muc = $loi_mo_ta = $loi_size = $loi_gia_nhap  = $loi_gia_ban = $loi_so_luong = $loi_anh = "";
                        
                        if (isset($_POST['them_btn'])) {
                            $ten_san_pham = $_POST['ten_san_pham'];
                            $mo_ta = $_POST['mo_ta'];
                            $danh_muc = $_POST['danh_muc'];
                        
                            # Xử lý validate
                            if (empty($ten_san_pham)) {
                                $loi_ten = "Tên sản phẩm không được để trống";
                                $dem++;
                            }
                        
                            if (empty($mo_ta)) {
                                $loi_mo_ta = "Mô tả không được để trống";
                                $dem++;
                            }
                        
                            if ($danh_muc == 0) {
                                $loi_danh_muc = "Hãy chọn 1 danh mục";
                                $dem++;
                            }
                        
                            // Validate biến thể sản phẩm
                            $sizes = $_POST['size'];
                            $importPrices = $_POST['importPrice'];
                        
                            $salePrices = $_POST['salePrice'];
                            $quantities = $_POST['quantity'];
                        
                            for ($i = 0; $i < count($sizes); $i++) {
                                if (empty($sizes[$i])) {
                                    $loi_size = "Hãy chọn size cho biến thể thứ " . ($i + 1);
                                    $dem++;
                                }
                                if (empty($importPrices[$i])) {
                                    $loi_gia_nhap = "Giá nhập không được để trống cho biến thể thứ " . ($i + 1);
                                    $dem++;
                                }
                          
                                if (empty($salePrices[$i])) {
                                    $loi_gia_ban = "Giá bán không được để trống cho biến thể thứ " . ($i + 1);
                                    $dem++;
                                }
                                if (empty($quantities[$i])) {
                                    $loi_so_luong = "Số lượng không được để trống cho biến thể thứ " . ($i + 1);
                                    $dem++;
                                }
                            }
                        
                            // Validate ảnh sản phẩm
                            $numFiles = count($_FILES['productImages']['name']);
                            if ($numFiles == 0) {
                                $loi_anh = "Bạn phải chọn ít nhất một ảnh sản phẩm";
                                $dem++;
                            } 
                        
                            if ($dem == 0) {
                                // Thêm sản phẩm
                                them_san_pham($ten_san_pham, $mo_ta, $danh_muc);
                                $id_san_pham = tim_idsp();
                        
                                // Xử lý biến thể sản phẩm
                                for ($i = 0; $i < count($sizes); $i++) {
                                    $size = $sizes[$i];
                                    $gia_nhap = $importPrices[$i];
                                   
                                    $gia_ban = $salePrices[$i];
                                    $so_luong = $quantities[$i];
                                    
                                    them_bien_the_san_pham($id_san_pham, $size, $gia_nhap, $gia_ban, $so_luong);
                                }
                        
                                // Xử lý ảnh sản phẩm
                                $uploadedImages = array();
                                for ($i = 0; $i < $numFiles; $i++) {
                                    $image_name = $_FILES['productImages']['name'][$i];
                                    $tmp = $_FILES['productImages']['tmp_name'][$i];
                                    $uploadPath = '../uploads/' . $image_name;
                        
                                    if (move_uploaded_file($tmp, $uploadPath)) {
                                        $uploadedImages[] = $image_name; // Lưu tên ảnh vào mảng để thêm vào cơ sở dữ liệu sau này
                                    } else {
                                        echo "Không thể tải lên ảnh $image_name.<br>";
                                    }
                                }
                        
                                // Thêm ảnh vào db
                                foreach ($uploadedImages as $image) {
                                    them_anh_san_pham($id_san_pham, $image);
                                }
                        
                                // Thông báo thành công
                                $thongbao = "Thêm sản phẩm thành công";
                            }
                        }
                        
                        $danh_muc = tat_ca_danh_muc();
                        $size = tat_ca_size();
                        include 'view/sanpham/add.php';
                       
            break;
        case 'xoa_san_pham':
       if(isset($_GET['id_xoasp'])){
                    $id_san_pham= $_GET['id_xoasp'];
                    xoa_san_pham($id_san_pham);
                }
                $iddm =0;
                if(isset($_POST['tim_btn'])){
                    $iddm = $_POST['danh_muc'];
    
                }
                $danh_muc =tat_ca_danh_muc();
                $san_pham = tat_ca_san_pham($iddm);
                include 'view/sanpham/list.php';
                
            break;
        case 'san_pham_da_xoa':
      $san_pham_da_xoa = san_pham_da_xoa();
                include 'view/sanpham/list_delete.php';
            break;
        case 'khoi_phuc_san_pham':
      if(isset($_GET['id_spdx'])){
                        $id_san_pham= $_GET['id_spdx'];
                        khoi_phuc_san_pham($id_san_pham);
                    }
                    $san_pham_da_xoa = san_pham_da_xoa();
                    include 'view/sanpham/list_delete.php';
            break;
        case 'chi_tiet_san_pham':
       $id_san_pham = isset($_GET['id_sp']) ? $_GET['id_sp'] : null;
                        $one_san_pham = show_1_san_pham($id_san_pham);
                        include 'view/sanpham/deltai.php';                
            break;
        case 'sua_san_pham':
      if(isset($_GET['id_ssp'])){
                        $id_san_pham = $_GET['id_ssp'];
                        $one_san_pham = show_1_san_pham($id_san_pham);
                        $so_luong_bien_the = count($one_san_pham['sizes']);
                        extract($one_san_pham);
                    }
                    $danh_muc = tat_ca_danh_muc();
                    $size = tat_ca_size();
                    include 'view/sanpham/fix.php'; 
            break;
        case 'update_san_pham':
       if(isset($_POST['sua_btn'])){
                            $id_san_pham = $_POST['id_san_pham'];
                            $ten_san_pham = $_POST['ten_san_pham'];
                            $mo_ta = $_POST['mo_ta'];
                            $danh_muc = $_POST['danh_muc'];
                            $sizes = $_POST['size'];
                            $importPrices = $_POST['importPrice'];
                        
                            $salePrices = $_POST['salePrice'];
                            $quantities = $_POST['quantity'];
                    
                            // Sửa sản phẩm
                            sua_san_pham($id_san_pham, $ten_san_pham, $mo_ta, $danh_muc);
                    
                            // Xử lý biến thể sản phẩm
                            for ($i = 0; $i < count($sizes); $i++) {
                                $size = $sizes[$i];
                                $gia_nhap = $importPrices[$i];
                               
                                $gia_ban = $salePrices[$i];
                                $so_luong = $quantities[$i];
                    
                                // Kiểm tra biến thể đã tồn tại chưa
                                if (bien_the_da_ton_tai($id_san_pham, $size)) {
                                    // Sửa biến thể
                                    sua_bien_the_san_pham($id_san_pham, $size, $gia_nhap, $gia_ban, $so_luong);
                                } else {
                                    // Thêm biến thể mới
                                    them_bien_the_san_pham($id_san_pham, $size, $gia_nhap, $gia_ban, $so_luong);
                                }
                            }
                    
                              // Xử lý upload ảnh
            $numFiles = count($_FILES['productImages']['name']);
            $uploadedImages = array();
    
            for ($i = 0; $i < $numFiles; $i++) {
                $image_name = $_FILES['productImages']['name'][$i];
                $tmp = $_FILES['productImages']['tmp_name'][$i];
                $uploadPath = '../uploads/' . $image_name;
    
                if (move_uploaded_file($tmp, $uploadPath)) {
                    $uploadedImages[] = $image_name; // Lưu tên ảnh vào mảng để thêm vào cơ sở dữ liệu sau này
                } else {
                    echo "Không thể tải lên ảnh $image_name.<br>";
                }
            }
    
            // Thêm ảnh vào db
            foreach ($uploadedImages as $image) {
                them_anh_san_pham($id_san_pham, $image);
            }
                    
                            // Thông báo thành công
                            $thongbao = "Thêm sản phẩm thành công";
                            header('Location:index.php?act=san_pham');
                        }
            break;

        # Giảm giá
        case 'giam_gia':
      if(isset($_GET['id_giam_gia'])){
                            $id_giam_gia = $_GET['id_giam_gia'];
                            $one_ma = show_1_ma($id_giam_gia);
                        }
                        include 'view/giamgia/fix.php';
            break;
        case 'xoa_giam_gia':
       if(isset($_GET['id_giam_gia'])){
                            $id_giam_gia = $_GET['id_giam_gia'];
                            xoa_ma_giam_gia($id_giam_gia);
                            $giam_gia = tat_ca_ma_giam_gia();
                            include 'view/giamgia/list.php';
                        }
            break;
        case 'ma_giam_gia_da_xoa':
        $tat_ca_ma_da_xoa = tat_ca_ma_da_xoa();
                        include 'view/giamgia/list_delete.php';
            break;
        case 'khoi_phuc_ma':
       if(isset($_GET['id_madx'])){
                        $id_madx = $_GET['id_madx'];
                        khoi_phuc_ma($id_madx);
                        $tat_ca_ma_da_xoa = tat_ca_ma_da_xoa();
                        include 'view/giamgia/list_delete.php';
                        }
            break;
        case 'khoi_phuc_toan_bo_ma':
      khoi_phuc_toan_bo_ma();
                        $tat_ca_ma_da_xoa = tat_ca_ma_da_xoa();
                        include 'view/giamgia/list_delete.php';
            break;
        case 'sua_ma':
      if(isset($_GET['id_giam_gia'])){
                            $id_giam_gia = $_GET['id_giam_gia'];
                            $one_ma = show_1_ma($id_giam_gia);
                        }
                        include 'view/giamgia/fix.php';
            break;
        case 'update_ma':
      if (isset($_POST['sua_btn'])) {
                            $id_giam_gia = $_POST['id_giam_gia'];
                            $ten_ma = $_POST['ten_ma'];
                            $giam_gia = $_POST['giam_gia'];
                            $ngay_bat_dau = $_POST['ngay_bat_dau'];
                            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
                            $errors = array();
                    
                            // Validate tên mã
                            if (empty(trim($ten_ma))) {
                                $errors[] = "Không được để trống tên mã.";
                            }
                            if (empty(trim($giam_gia))) {
                                $errors[] = "Không được để trống mã.";
                            }
                            // Nếu không có lỗi, cập nhật mã
                            if (empty($errors)) {
                                sua_ma($id_giam_gia, $ten_ma, $giam_gia, $ngay_bat_dau, $ngay_ket_thuc);
                                header('Location: index.php?act=giam_gia');
                                exit();
                            } else {
                                // Nếu có lỗi, lấy lại dữ liệu mã
                                $one_ma = show_1_ma($id_giam_gia);
                            }
                        } else {
                            // Nếu không phải là POST request, lấy thông tin mã
                            if(isset($_GET['id_giam_gia'])){
                            $id_giam_gia = $_GET['id_giam_gia'];
                            $one_ma = show_1_ma($id_giam_gia);
                            }
                        }
                        $giam_gia = tat_ca_ma_giam_gia();
                        include 'view/giamgia/fix.php';
            break;
        case 'them_ma':
      $dem = 0;
                        $loi_ten = $loi_giam_gia = $loi_ngay_bat_dau = $loi_ngay_ket_thuc = "";
                        $ten_ma = $giam_gia = $ngay_bat_dau = $ngay_ket_thuc = ""; // Khởi tạo biến
                        if(isset($_POST['them_btn'])) {
                            $ten_ma = $_POST['ten_ma'];
                            $giam_gia = $_POST['giam_gia'];
                            $ngay_bat_dau = $_POST['ngay_bat_dau'];
                            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
        
                            if(empty($ten_ma)) {
                                $loi_ten = "Vui lòng nhập mã";
                                $dem++;
                            } 
                            if(empty($giam_gia)) {
                                $loi_giam_gia = "Vui lòng nhập mã";
                                $dem++;
                            }
                            if(empty($ngay_bat_dau)) {
                                $loi_ngay_bat_dau = "Vui lòng chọn ngày bắt đầu";
                            } 
                            if(empty($ngay_bat_dau)) {
                                $loi_ngay_ket_thuc = "Vui lòng chọn ngày kết thúc";
                            } 
                            else {
                                $check = check_ma($ten_ma);
                                
                                if($check !== false) {
                                    $thongbao = "Mã đã tồn tại";
                                } else {
                                    them_moi_ma($ten_ma, $giam_gia, $ngay_bat_dau, $ngay_ket_thuc);
                                    $thongbao = "Thêm thành công";
                                }
                            }
                        }
                    $giam_gia = tat_ca_ma_giam_gia();
                    include 'view/giamgia/add.php';
            break;

        # Tài khoản
        case 'tai_khoan':
         $all_tai_khoan = show_tai_khoan();
                include 'view/taikhoan/list.php';
            break;
        case 'them_tai_khoan':
        $loi_ten = $loi_email = $loi_mat_khau  = "";
                $dem = 0;
                if(isset($_POST['them_tk_btn']) ){
                    $ten_dang_nhap = $_POST['ten_tai_khoan'];
                    $email = $_POST['email'];
                    $mat_khau = $_POST['mat_khau'];       
                    $trang_thai = 0;
                    $vai_tro = 1;
                    if (isset($_FILES['anh_dai_dien']) && $_FILES['anh_dai_dien']['error'] == 0) {
                        $hinh_anh = $_FILES['anh_dai_dien']['name'];
                        $tmp = $_FILES['anh_dai_dien']['tmp_name'];
                        move_uploaded_file($tmp, '../uploads/' . $hinh_anh);
                    } else {
                        $hinh_anh = 'default.jpg'; // Ảnh mặc định nếu không upload
                    }
                    #xử lý validate
                    if(empty($ten_dang_nhap) ){
                        $loi_ten = "Không được để trống tên đăng nhập";
                        $dem ++;
                    }
                    if(empty($email) ){
                        $loi_email = "Không được để trống email";
                        $dem ++;
                    }
                    if(empty($mat_khau) ){
                        $loi_mat_khau = "Không được để trống mật khẩu";
                        $dem ++;
                    }
               

                    #tiến hành thêm tài khoản nếu không xảy ra lỗi
                    if($dem == 0){
                        them_tai_khoan($ten_dang_nhap, $mat_khau, $email, $trang_thai, $hinh_anh, null, null, $vai_tro) ;
                        $thongbao ="Thêm tài khoản thành công";
                    }
                 

                }
                include 'view/taikhoan/add.php';
            break;
        case 'xoa_tai_khoan':
         if(isset($_GET['id_tk'])){
                $id_tai_khoan = $_GET['id_tk'];
                block_tai_khoan($id_tai_khoan);
            }
            header('Location:index.php?act=tai_khoan');
            break;
        case 'tai_khoan_da_khoa':
        $all_tai_khoan_khoa = show_tai_khoan_bi_khoa();
                include 'view/taikhoan/listkhoa.php';
            break;
        case 'khoi_phuc_tai_khoan':
         if(isset($_GET['id_tk'])){
                    $id_tai_khoan = $_GET['id_tk'];
                    khoi_phuc_tai_khoan($id_tai_khoan);
                }
                header('Location:index.php?act=tai_khoan_da_khoa');
            break;

        # Đơn hàng
        case 'don_hang':
          $don_hang =show_all_hoa_don();
                include 'view/donhang/list.php';
            break;
        case 'chi_tiet_don':
        if(isset($_GET['id_don']) && isset($_GET['id_tk'])){
                    $id_don_hang = $_GET['id_don'];
                    $id_tai_khoan = $_GET['id_tk'];
                }
                $hoa_don =   show_hoa_don($id_don_hang);
                include 'view/donhang/chittietdonhang.php.';
            break;
        case 'thay_doi_trang_thai_don':
        if(isset($_POST['id_don_hang'])){
                      $id_don_hang = $_POST['id_don_hang'];
                      $trang_thai_giao_hang =$_POST['trang_thai_giao_hang'];
                      thay_doi_trang_thai_don($id_don_hang,$trang_thai_giao_hang);
                      $trang_thai_hien_tai = $_POST['trang_thai_hien_tai'];
                      $ten_dang_nhap = $_POST['ten_dang_nhap'];
                      $email = $_POST['email'];
                      date_default_timezone_set('Asia/Ho_Chi_Minh');
                      $thoi_gian = date('Y-m-d H:i:s'); 
                      $noi_dung_thay_doi = "Từ ";
                      switch ($trang_thai_hien_tai) {
                        case 0: $noi_dung_thay_doi .= "Đang chờ xử lý"; 
                        break;
                        case 1: $noi_dung_thay_doi .= "Đang giao"; 
                        break;
                        case 2: $noi_dung_thay_doi .= "Đã giao"; 
                        break;
                        default: $noi_dung_thay_doi .= "Không xác định"; 
                        break;
                    }
                    $noi_dung_thay_doi.=" --> ";
                    switch ($trang_thai_giao_hang) {
                        case 0: $noi_dung_thay_doi .= "Đang chờ xử lý"; 
                        break;
                        case 1: $noi_dung_thay_doi .= "Đang giao"; 
                        break;
                        case 2: $noi_dung_thay_doi .= "Đã giao";
                         break;
                        case 3: $noi_dung_thay_doi .= "Đã hủy"; 
                        break;
                        default: $noi_dung_thay_doi .= "Không xác định"; 
                        break;
                    }
                      $thong_bao = "Đã đổi trạng thái";      
                      $subject = 'Thông báo thay đổi trạng thái đơn hàng';
                      $body = "Đơn hàng của bạn đã được thay đổi trạng thái: $noi_dung_thay_doi";
                      sendOrderStatusEmail($email, $ten_dang_nhap, $subject, $body);
                      
                    }
                    if(isset($_SESSION['user'])){
                        $id_tai_khoan = $_SESSION['user']['id_tai_khoan'];
                        $ten_nguoi_thay_doi = $_SESSION['user']['ten_dang_nhap'];
                        luu_lich_su($id_tai_khoan, $id_don_hang, $ten_nguoi_thay_doi,$thoi_gian, $noi_dung_thay_doi);
                    }
                 if( $trang_thai_giao_hang == 2){
                    update_da_thanh_toan($id_don_hang);
                 }
                    $hoa_don =   show_hoa_don($id_don_hang);
                    include 'view/donhang/chittietdonhang.php.';
            break;

        # Bình luận
        case 'binh_luan':
          $binh_luan =show_binh_luan();
                include 'view/binhluan/list.php.';
            break;
        case 'xem_binh_luan':
        if(isset($_GET['id_binh_luan'])){
                    $id_binh_luan = $_GET['id_binh_luan'];
                    $one_binh_luan = show_chi_tiet_binh_luan($id_binh_luan);
                }
                include 'view/binhluan/chitiet.php.';
            break;
        case 'an_binh_luan':
         if(isset($_GET['id_binh_luan'])){
                    an_binh_luan($_GET['id_binh_luan']);
                }
                header('Location:index.php?act=binh_luan');
            break;
        case 'binh_luan_da_xoa':
         $binh_luan_da_xoa =show_binh_luan_da_xoa();
                    include 'view/binhluan/list_delete.php.';
            break;
<<<<<<< HEAD

=======
>>>>>>> daothianh_ph46943
        default:
            $chua_xu_ly = dem_don_chu_xu_ly();
            $da_xu_ly = dem_don_da_xu_ly();
            $da_giao =  dem_don_da_giao();
            $da_huy = dem_don_da_huy();
            $san_pham_da_xoa = san_pham_da_khoa();
            $san_pham_het_hang =san_pham_het_hang();
            include 'view/main.php';
            include 'view/bieudodoanhthu.php';
            break;
    }
}else{
    $chua_xu_ly = dem_don_chu_xu_ly();
    $da_xu_ly = dem_don_da_xu_ly();
    $da_giao =  dem_don_da_giao();
    $da_huy = dem_don_da_huy();
    $san_pham_da_xoa = san_pham_da_khoa();
    $san_pham_het_hang =san_pham_het_hang();
    include 'view/bieudodoanhthu.php';
<<<<<<< HEAD
    include 'view/main.php';
}
=======
>>>>>>> daothianh_ph46943

include 'view/footer.php';
ob_end_flush();
?>
<script>
function xoa_danh_muc() {
    return confirm('Bạn muốn xóa danh mục này chứ?')
}
function khoi_phuc_danh_muc() {
    return confirm('Bạn muốn khôi phục danh mục này chứ?')
}
function khoi_phuc_toan_bo_danh_muc() {
    return confirm('Bạn muốn khôi phục toàn bộ danh mục không?')
}
function xoa_size() {
    return confirm('Bạn muốn xóa size này không?')
}
function khoi_phuc_size() {
    return confirm('Bạn muốn khôi phục size này không?')
}
function khoi_phuc_toan_bo_size() {
    return confirm('Bạn muốn khôi phục toàn bộ size không?')
}
function xoa_san_pham() {
    return confirm('Bạn muốn xóa sản phẩm này chứ?')
}
function khoi_phuc_san_pham() {
    return confirm('Bạn muốn khôi phục sản phẩm này chứ?')
}
</script>
