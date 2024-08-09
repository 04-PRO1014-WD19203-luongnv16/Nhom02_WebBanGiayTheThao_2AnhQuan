<style>
        .card-body {
            padding: 7.25rem;
            overflow: auto;
            
        }
        .chart-container {
            position: relative;
            height: 100vh;
            width: 100%;
        }
        .container-fluid {
    padding: 1.5rem; /* Padding chung cho toàn bộ container */
    background-color: #f8f9fc; /* Màu nền nhẹ cho toàn bộ container */
    border-radius: 0.35rem; /* Bo góc cho container */
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); /* Thêm bóng cho container */
    margin: 1rem 0; /* Khoảng cách trên và dưới container */
    border: 1px solid #e3e6f0; /* Đường viền nhẹ cho container */
}
.card {
            margin-bottom: 1rem; /* Khoảng cách giữa các hộp */
        }
.card-custom {
    border: 2px solid #007bff; /* Đổi màu viền hộp */
    border-radius: 15px; /* Bo góc hộp */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Đổ bóng hộp */
}

.card-header-custom {
    background-color: #007bff; /* Màu nền tiêu đề */
    color: #fff; /* Màu chữ tiêu đề */
    border-bottom: 2px solid #0056b3; /* Đường viền dưới tiêu đề */
    padding: 1rem; /* Khoảng cách bên trong tiêu đề */
    font-size: 1.25rem; /* Kích thước chữ tiêu đề */
    font-weight: bold; /* Đậm chữ tiêu đề */
}

.card-body {
    padding: 0.5rem; /* Khoảng cách bên trong nội dung hộp */
}

.list-group-item-custom {
    background-color: #f8f9fa; /* Màu nền của các mục trong danh sách */
    border: none; /* Bỏ viền cho các mục danh sách */
    padding: 0.75rem; /* Khoảng cách bên trong mục danh sách */
    display: flex;
    align-items: center;
    margin-bottom: 0.5rem; /* Khoảng cách giữa các mục */
    border-radius: 10px; /* Bo góc cho các mục danh sách */
    position: relative; /* Để định vị giá nằm sát phải */
}

.product-img {
    width: 100px; /* Kích thước hình ảnh sản phẩm */
    height: 100px; /* Kích thước hình ảnh sản phẩm */
    object-fit: cover; /* Đảm bảo ảnh không bị biến dạng */
    border-radius: 10px; /* Bo góc ảnh */
}

.product-name {
    margin-bottom: 0.5rem; /* Khoảng cách giữa tên sản phẩm và mã sản phẩm */
}

.product-code {
    margin-bottom: 0; /* Không có khoảng cách dưới mã sản phẩm */
}

.price {
    margin-left: auto; /* Đẩy giá sang bên phải */
    font-weight: bold; /* Đậm giá sản phẩm */
    color: #28a745; /* Màu xanh lá cho giá */
    position: absolute; /* Định vị giá */
    right: 10px; /* Khoảng cách từ cạnh phải */
}

.custom-select {
    max-width: 150px; /* Điều chỉnh kích thước của select */
}

#filterForm {
    display: flex;
    align-items: center; /* Căn giữa các phần tử theo chiều dọc */
}

#filterForm .form-group {
    margin-bottom: 0; /* Xóa khoảng cách dưới form-group */
}

#filterForm .form-group label {
    margin-right: 10px; /* Khoảng cách giữa label và select */
}

#filterForm .form-group select {
    margin-right: 10px; /* Khoảng cách giữa select và button */
}

    </style>
<?php

$doanh_thu_thang = doanh_thu_theo_thang(); 
$doanh_thu_nam = doanh_thu_nam(); 
$doanh_thu_ngay = doanh_thu_ngay(); 
$filter = isset($_POST['filter']) ? $_POST['filter'] : 'month';

$full_labels = [];
$data = [];

switch ($filter) {
    case 'month':
        // Tạo danh sách các ngày trong tháng (1-31)
        $full_labels = array_map(fn($i) => "Ngày $i", range(1, 31));
        $data = $doanh_thu_thang ;
        break;
    case 'day':
        // Tạo danh sách các giờ trong ngày (0-23)
        $full_labels = array_map(fn($i) => "Giờ $i", range(0, 23));
        $data = $doanh_thu_ngay;
        break;
    case 'year':
        // Tạo danh sách các tháng trong năm (1-12)
        $full_labels = array_map(fn($i) => "Tháng $i", range(1, 12));
        $data = $doanh_thu_nam;
        break;
}

// Khởi tạo mảng doanh thu với giá trị 0 cho tất cả các khoảng thời gian
$revenueData = array_fill_keys($full_labels, 0);

// Cập nhật doanh thu từ dữ liệu thực tế
foreach ($data as $row) {
    $label = '';
    if ($filter === 'month') {
        $label = "Ngày " . $row['ngay']; // Ngày trong tháng
    } elseif ($filter === 'day') {
        $label = "Giờ " . $row['gio']; // Giờ trong ngày
    } elseif ($filter === 'year') {
        $label = "Tháng " . $row['thang']; // Tháng trong năm
    }
    if (isset($revenueData[$label])) {
        $revenueData[$label] = $row['doanh_thu'];
    }
}

// Chuyển đổi mảng doanh thu thành các giá trị và nhãn
$labels = array_keys($revenueData);
$revenueData = array_values($revenueData);

$labelsJson = json_encode($labels);
$revenueDataJson = json_encode($revenueData);
?>
<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Biểu đồ Doanh thu</h1>
        </div>
        <form method="post" id="filterForm">
    <div class="form-group d-flex align-items-center">
        <label for="filter" class="mr-2">Chọn khoảng thời gian:</label>
        <select id="filter" name="filter" class="form-control custom-select mr-2">
            <option value="month">Theo tháng</option>
            <option value="day">Theo ngày</option>
            <option value="year">Theo năm</option>
        </select>
        <button type="submit" class="btn btn-primary">Lọc</button>
    </div>
</form>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Biểu đồ Doanh thu</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <?php 
        $top_5_doanh_thu =top_5_doanh_thu();
        $top_5_ban_chay =top_5_ban_chay();
        ?>
    <div class="row">
        <!-- Top 5 Sản phẩm Doanh thu cao nhất -->
        <div class="col-md-6 mb-4">
            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    Top 5 Sản phẩm Doanh thu cao nhất
                </div>
                <?php 
                foreach ($top_5_doanh_thu as $key => $dt) {
                    ?>
                    <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-custom">
                            <div class="d-flex align-items-center">
                                <img src="../uploads/<?=$dt['hinh_anh_san_pham'] ?>" alt="Sản phẩm 1" class="product-img">
                                <div class="ml-3 flex-grow-1">
                                    <h5 class="product-name"><?=$dt['ten_san_pham'] ?></h5>
                                    <p class="product-code text-muted"><?=number_format($dt['doanh_thu'] )?> VNĐ</p>
                                </div>
                               
                            </div>
                        </li>
                        <!-- Add more items here -->
                    </ul>
                    </div>
                    <?php
                }
                ?>
                
            </div>
        </div>

        <!-- Top 5 Sản phẩm Bán chạy nhất -->
        <div class="col-md-6 mb-4">
            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    Top 5 Sản phẩm Bán chạy nhất
                </div>
                <?php 
                foreach ($top_5_ban_chay as $key => $bc) {
                  ?>
                   <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-custom">
                            <div class="d-flex align-items-center">
                                <img src="../uploads/<?=$bc['hinh_anh_san_pham'] ?>" alt="Sản phẩm 6" class="product-img">
                                <div class="ml-3 flex-grow-1">
                                    <h5 class="product-name"><?=$bc['ten_san_pham'] ?></h5>
                                    <p class="product-code text-muted"><?=$bc['tong_so_luong'] ?> sản phẩm</p>
                                </div>
                             
                            </div>
                        </li>
                        <!-- Add more items here -->
                    </ul>
                </div>
                  <?php
                }
                ?>
               
            </div>
        </div>
    </div>
</div>




    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const labels = <?php echo $labelsJson; ?>;
    const revenueData = <?php echo $revenueDataJson; ?>;

    const chartCtx = document.getElementById('chart').getContext('2d');
    const chart = new Chart(chartCtx, {
        type: 'bar', // Hoặc line, pie, etc.
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh thu',
                data: revenueData ,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
