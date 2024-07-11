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
                    $loi_ten = $loi_mo_ta = $loi_size = $loi_gia_nhap = $loi_sale = $loi_gia_ban = $loi_so_luong = "";
                    if(isset($_POST['them_btn'])){
                        $ten_san_pham = $_POST['ten_san_pham'];
                        $mo_ta = $_POST['mo_ta'];
                        $danh_muc =$_POST['danh_muc'];
                    
                    #xử lý validate
                       

                    #thêm sp
                    them_san_pham($ten_san_pham,$mo_ta,$danh_muc);
                    $id_san_pham =  tim_idsp();

                       // Xử lý biến thể sản phẩm
                    $sizes = $_POST['size'];
                    $importPrices = $_POST['importPrice'];
                    $sales = $_POST['Sale'];
                    $salePrices = $_POST['salePrice'];
                    $quantities = $_POST['quantity'];

                  // Lặp qua từng biến thể và thêm vào cơ sở dữ liệu
                    for ($i = 0; $i < count($sizes); $i++) {
                     $size = $sizes[$i];
                     $gia_nhap = $importPrices[$i];
                     $sale = $sales[$i];
                     $gia_ban = $salePrices[$i];
                     $so_luong = $quantities[$i];
                    
                    them_bien_the_san_pham($id_san_pham, $size, $gia_nhap, $gia_ban, $sale, $so_luong);
                        }
                        
                    // Xử lý ảnh sản phẩm
                    $numFiles = count($_FILES['productImages']['name']);
                    $uploadedImages = array();
                    
                    // Lặp qua từng file ảnh và xử lý
                    for ($i = 0; $i < $numFiles; $i++){
                     $image_name = $_FILES['productImages']['name'][$i];
                    $tmp = $_FILES['productImages']['tmp_name'][$i];
                    $uploadPath = '../uploads/' . $image_name;
            
                    // Di chuyển ảnh vào thư mục lưu trữ
                     if (move_uploaded_file($tmp, $uploadPath)) {
                    $uploadedImages[] = $image_name; // Lưu tên ảnh vào mảng để thêm vào cơ sở dữ liệu sau này
                    } else {
                    echo "Không thể tải lên ảnh $image_name.<br>";
                    }
                        }
        
                    // Thêm  ảnh vào db
                    foreach ($uploadedImages as $image) {
                        them_anh_san_pham($id_san_pham, $image);
                    }
        
                    // Thông báo thành công
                    $thongbao = "Thêm sản phẩm thành công";

                    }
                    $danh_muc =tat_ca_danh_muc();
                    $size =tat_ca_size();
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
