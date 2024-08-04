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
        
        #size-----------
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
        #sản phẩm--------
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
                    $loi_ten = $loi_danh_muc = $loi_mo_ta = $loi_size = $loi_gia_nhap = $loi_sale = $loi_gia_ban = $loi_so_luong = $loi_anh = "";
                    
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
                        $sales = $_POST['Sale'];
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
                            if (empty($sales[$i])) {
                                $loi_sale = "Giá sale không được để trống cho biến thể thứ " . ($i + 1);
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
                                $sale = $sales[$i];
                                $gia_ban = $salePrices[$i];
                                $so_luong = $quantities[$i];
                                
                                them_bien_the_san_pham($id_san_pham, $size, $gia_nhap, $gia_ban, $sale, $so_luong);
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
                        $sales = $_POST['Sale'];
                        $salePrices = $_POST['salePrice'];
                        $quantities = $_POST['quantity'];
                
                        // Sửa sản phẩm
                        sua_san_pham($id_san_pham, $ten_san_pham, $mo_ta, $danh_muc);
                
                        // Xử lý biến thể sản phẩm
                        for ($i = 0; $i < count($sizes); $i++) {
                            $size = $sizes[$i];
                            $gia_nhap = $importPrices[$i];
                            $sale = $sales[$i];
                            $gia_ban = $salePrices[$i];
                            $so_luong = $quantities[$i];
                
                            // Kiểm tra biến thể đã tồn tại chưa
                            if (bien_the_da_ton_tai($id_san_pham, $size)) {
                                // Sửa biến thể
                                sua_bien_the_san_pham($id_san_pham, $size, $gia_nhap, $gia_ban, $sale, $so_luong);
                            } else {
                                // Thêm biến thể mới
                                them_bien_the_san_pham($id_san_pham, $size, $gia_nhap, $gia_ban, $sale, $so_luong);
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
         break;
          case 'xoa_giam_gia':
          break;
        case 'ma_giam_gia_da_xoa':
        break;
        case 'khoi_phuc_ma':
         break;
        case 'khoi_phuc_toan_bo_ma':
             break;
        case 'sua_ma':
             break;
        case 'update_ma':
             break;
           case 'them_ma':
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
            break;
         case 'chi_tiet_don':
            break;
         case 'thay_doi_trang_thai_don':
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
