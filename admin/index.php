<?php 
session_start();
ob_start();
include '../models/pdo.php';
include '../models/danhmuc.php';
include '../models/size.php';
include '../models/sanpham.php';
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
            
                break;
                case 'them_san_pham':
                 
                    break;
            case 'xoa_san_pham':
           
            break;
            case 'san_pham_da_xoa':
           
            break;
            case 'khoi_phuc_san_pham':
               
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
