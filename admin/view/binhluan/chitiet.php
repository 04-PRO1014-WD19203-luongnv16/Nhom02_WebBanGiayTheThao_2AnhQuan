
<style>
     .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .page-heading {
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .comment-detail {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }
        .comment-detail h2 {
            font-size: 1.5rem;
            color: #333;
            margin-top: 0;
        }
        .comment-detail p {
            font-size: 1rem;
            color: #555;
            line-height: 1.5;
        }
        .comment-detail strong {
            color: #333;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        
        }
        .reply-section {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        .reply-section textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .reply-section .btn-submit {
    background-color: #28a745; /* Màu nền xanh lá cây */
    border-color: #28a745; /* Màu viền xanh lá cây */
    color: #ffffff; /* Màu chữ trắng */
    padding: 10px 20px; /* Padding để tạo khoảng trống bên trong nút */
    border: none; /* Không có viền */
    border-radius: 5px; /* Bo góc nút */
    font-size: 16px; /* Kích thước chữ */
    cursor: pointer; /* Hiển thị con trỏ tay khi di chuột */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Hiệu ứng chuyển động khi hover */
}

.reply-section .btn-submit:hover {
    background-color: #218838; /* Màu nền khi hover */
    border-color: #1e7e34; /* Màu viền khi hover */
    transform: scale(1.05); /* Phóng to nút khi hover */
}

.reply-section .btn-submit:focus {
    outline: none; /* Loại bỏ viền khi focus */
}

.stars {
            font-size: 24px; /* Kích thước của sao */
        }

        .stars .fa-star {
            color: #cccccc; /* Màu mặc định của sao (chưa được đánh giá) */
        }

        .stars .fa-star.checked {
            color: #ffcc00; /* Màu cho sao đã được đánh giá */
        }
</style>
<div class="container">
    <!-- Page Heading -->
    <div class="page-heading">
        <h1 class="h3 mb-4 text-gray-800">Chi Tiết Bình Luận</h1>
    </div>

    <!-- Comment Detail -->
    <div class="comment-detail">
        <h2>Bình luận của: <?= htmlspecialchars($one_binh_luan['ten_dang_nhap']) ?></h2>
        <p><strong>Thời gian:</strong> <?= htmlspecialchars($one_binh_luan['date']) ?></p>
        <p><strong>Nội dung:</strong></p>
        <p><?= htmlspecialchars($one_binh_luan['noi_dung']) ?></p>
        <div class="stars">
    <?php 
    $binh_luan = show_binh_luan_theo_san_pham($one_binh_luan['id_san_pham'] );
    $diem_danh_gia = isset($one_binh_luan['diem_danh_gia']) ? $one_binh_luan['diem_danh_gia'] : 0;
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $diem_danh_gia) {
            echo '<span class="fa fa-star checked"></span>';
        } else {
            echo '<span class="fa fa-star"></span>';
        }
    }
    ?>
</div>
    </div>

    <!-- Back to list button -->
    <a href="index.php?act=binh_luan" class="btn btn-primary">Quay lại danh sách bình luận</a>
</div>