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

        # Sản phẩm
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

        # Giảm giá
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
            break;
        case 'chi_tiet_don':
            break;
        case 'thay_doi_trang_thai_don':
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
