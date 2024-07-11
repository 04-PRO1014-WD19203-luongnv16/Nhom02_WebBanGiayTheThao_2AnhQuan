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