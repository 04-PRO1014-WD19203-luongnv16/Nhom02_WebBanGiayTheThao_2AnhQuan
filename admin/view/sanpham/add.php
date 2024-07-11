
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Thêm sản phẩm</h1>

                    <!-- Add Product Form -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" enctype="multipart/form-data" >
                                <!-- Product Name -->
                                <div class="form-group">
                                    <label for="productName">Tên sản phẩm</label>
                                    <input name="ten_san_pham" type="text" class="form-control" id="productName" placeholder="Nhập tên sản phẩm">
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="productDescription">Mô tả</label>
                                    <textarea name="mo_ta" class="form-control" id="productDescription" rows="3" placeholder="Nhập mô tả sản phẩm"></textarea>
                                </div>

                                <!-- Category -->
                                <div class="form-group">
                                    <label for="productCategory">Danh mục</label>                                  
                                    <select name="danh_muc" class="form-control" id="productCategory">
                                        <option value="">Chọn danh mục</option>
                                        <?php 
                                    foreach ($danh_muc as $key => $dm) {
                                        ?>
                                        <option value="<?=$dm['id_danh_muc'] ?>"><?=$dm['ten_danh_muc'] ?></option>
                                       
                                        <?php
                                    }
                                    ?>
                                        
                                    </select>
                                </div>

                                <!-- Product Image -->
                                <div class="form-group">
                                    <label for="productImage">Ảnh sản phẩm</label>
                                    <input name="productImages[]" type="file" class="form-control-file" id="productImage" multiple>
                                </div>

                                <!-- Product Variants -->
                                <div class="form-group">
                                    <label for="productVariants">Sản phẩm biến thể</label>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kích cỡ</th>                                          
                                                <th>Giá nhập</th>
                                                <th>Sale</th>
                                                <th>Giá bán</th>
                                                <th>Số lượng</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody id="variantTable">
                                            <tr>
                                                <td>
                                                    <select class="form-control" name="size[]">
                                                        <option value="">Chọn Size</option>
                                                        <?php 
                                    foreach ($size as $key => $sz) {
                                        ?>
                                        <option value="<?=$sz['id_size'] ?>"><?=$sz['size_name'] ?></option>
                                       
                                        <?php
                                    }
                                    ?>
                                                    </select>
                                                </td>
                                          
                                                <td><input type="number" class="form-control" name="importPrice[]" placeholder="Giá nhập"></td>
                                                <td><input type="number" class="form-control" name="Sale[]" placeholder="Sale"></td>
                                                <td><input type="number" class="form-control" name="salePrice[]" placeholder="Giá bán"></td>
                                                <td><input type="number" class="form-control" name="quantity[]" placeholder="Số lượng"></td>
                                                <td>
                                                   
                                                    <button type="button" class="btn btn-danger btn-sm removeVariantRow">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-success btn-sm addVariantRow">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>

                                <!-- Add Product Button -->
                                <input type="submit" class="btn btn-primary" name="them_btn" value="Thêm sản phẩm">
                           
                            </form>
                        </div>
                    </div>
                    <span style="color:red;"><?php if(isset($thongbao)){
                  echo $thongbao;
                }else {
                  $thongbao = "";
                }
                  ?></span>
                </div>
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
                <script>
    $(document).ready(function() {
        // Function to add a new variant row
        $('.addVariantRow').click(function() {
            var newRow = `
                <tr>
                  <td>
                                                    <select class="form-control" name="size[]">
                                                        <option value="">Chọn Size</option>
                                                        <?php 
                                    foreach ($size as $key => $sz) {
                                        ?>
                                        <option value="<?=$sz['id_size'] ?>"><?=$sz['size_name'] ?></option>
                                       
                                        <?php
                                    }
                                    ?>
                                                    </select>
                                                </td>
             
                    <td><input type="number" class="form-control" name="importPrice[]" placeholder="Giá nhập"></td>
                     <td><input type="number" class="form-control" name="Sale[]" placeholder="Sale"></td>
                    <td><input type="number" class="form-control" name="salePrice[]" placeholder="Giá bán"></td>
                    <td><input type="number" class="form-control" name="quantity[]" placeholder="Số lượng"></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm removeVariantRow">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
            `;
            $('#variantTable').append(newRow);
        });

        // Function to remove a variant row
        $(document).on('click', '.removeVariantRow', function() {
            $(this).closest('tr').remove();
        });
    });

    // tải nhiều ảnh
    // $(document).ready(function() {
    //         $('#productImages').on('change', function() {
    //             var files = $(this)[0].files;
    //             var previewContainer = $('#imagePreview');
    //             previewContainer.html(''); // Clear any existing previews

    //             if (files.length > 0) {
    //                 $.each(files, function(index, file) {
    //                     var reader = new FileReader();
    //                     reader.onload = function(e) {
    //                         var img = $('<img>').attr('src', e.target.result).addClass('preview-img');
    //                         previewContainer.append(img);
    //                     }
    //                     reader.readAsDataURL(file);
    //                 });
    //             }
    //         });
    //     });
</script>  