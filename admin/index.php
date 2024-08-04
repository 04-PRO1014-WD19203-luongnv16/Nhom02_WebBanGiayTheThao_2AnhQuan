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
        case 'sua_danh_muc':
        break;
        
        case 'update_danh_muc':
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
                break;
                case 'them_san_pham':
                    break;
            case 'xoa_san_pham':
            break;
            case 'san_pham_da_xoa':
            break;
            case 'khoi_phuc_san_pham':
                break;
                case 'chi_tiet_san_pham':                 
                    break;
                case 'sua_san_pham':  
                break;
                case 'update_san_pham':
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
 // mã giảm giá
 function xoa_ma() {
    return confirm('Bạn muốn xóa mã này không?')
 }

 function khoi_phuc_ma() {
    return confirm('Bạn muốn khôi phục mã này không?')
 }

 function khoi_phuc_toan_bo_ma(){
    return confirm('Bạn muốn khôi phục toàn bộ mã không?')
 }
 //sản phẩm
 function xoa_san_pham(){
    return confirm('Bạn muốn xóa sản phẩm này chứ?')
 }
 function khoi_phuc_san_pham(){
    return confirm('Bạn muốn khôi phục sản phẩm này chứ?')
 }
</script>
