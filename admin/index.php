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
        #danh mục----------
        case 'danh_muc':
            break;
        case 'them_danh_muc':
                break;
        case 'xoa_danh_muc':
        break;
        case 'danh_muc_da_xoa':
       break;
        case 'khoi_phuc_danh_muc':
        break;
        case 'khoi_phuc_toan_bo_danh_muc':
       break;
       break;
       
        case 'update_danh_muc':
             break;  
       
        #size-----------
        case 'size':
            break;
        case 'them_size':
                break;
            case 'xoa_size':
                    break;
            case 'size_da_xoa':
                   break;     
            case 'khoi_phuc_size':
                   break;
            case 'khoi_phuc_toan_bo_size':
               break;
            case 'sua_size':
                 break;
            case 'update_size':
                 break;   
        #sản phẩm--------
            case 'san_pham':
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
            case 'giam_gia':
       $giam_gia = tat_ca_ma_giam_gia();
                        include 'view/giamgia/list.php';
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
        case 'tai_khoan':
         break;
          case 'them_tai_khoan':
            break;
        case 'xoa_tai_khoan':
            break;
         case 'tai_khoan_da_khoa':
            break;
         case 'khoi_phuc_tai_khoan':
            break;
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
                      $thong_bao = "   Đã đổi trạng thái";
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
        case 'binh_luan':
            break;
              case 'xem_binh_luan':
            break;
          case 'an_binh_luan':
            break;
        case 'binh_luan_da_xoa':
            break;
        default:
        include 'view/main.php';
            break;
    }
}else{
    include 'view/main.php';
}

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

 function khoi_phuc_toan_bo_size(){
    return confirm('Bạn muốn khôi phục toàn bộ size không?')
 }
 //sản phẩm
 function xoa_san_pham(){
    return confirm('Bạn muốn xóa sản phẩm này chứ?')
 }
 function khoi_phuc_san_pham(){
    return confirm('Bạn muốn khôi phục sản phẩm này chứ?')
 }
</script>
