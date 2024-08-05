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
        $iddm =0;
                    if(isset($_POST['tim_btn'])){
                        $iddm = $_POST['danh_muc'];
    
                    }
                    $danh_muc =tat_ca_danh_muc();
                    $san_pham = tat_ca_san_pham($iddm);
                    include 'view/sanpham/list.php';
                    break;
                    // *
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
            break;
        case 'them_tai_khoan':
            break;
        case 'xoa_tai_khoan':
            break;
        case 'tai_khoan_da_khoa':
            break;
        case 'khoi_phuc_tai_khoan':
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
