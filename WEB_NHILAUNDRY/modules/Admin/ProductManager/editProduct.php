<div style="height: 100%" class="scrollVer">
    <h3>setting product</h3>   
    <?php
        $productID = getIndex("idProduct");
        $data = $sanPham->getByID($productID);
        if(postIndex("btnEditProduct") != ""){
            $productImage = getFile("productImage");
            $imgName = ($productImage["size"] == 0)?"":($productID.substr($productImage["name"],-4));
            
            $productName = trim(postIndex("productName"));
            $oldName = trim(postIndex("oldName"));
            $productPrice = postIndex("productPrice");
            $productDescription = postIndex("productDescription");
            
            if((strcmp($oldName, $productName) == 0) || (empty($sanPham->checkName($productName)))){
                if(($sanPham->updateProduct($productName, $productPrice, $productDescription, $productID)) > 0){
                    $_SESSION["info"] = "Đã sửa: ".$productName;
                }
                if($productImage["size"] > 0){
                    $sanPham->updateImage($imgName, $productID);
                    $path = "media/image/sanpham/".$data["hinh"];
                    (file_exists($path) && is_file($path))?unlink($path):"";
                    if (!move_uploaded_file($productImage["tmp_name"], "media/image/sanpham/".$imgName)){
                        $_SESSION["err"] = "Không thể lưu ảnh!!!!";
                    }
                }
            }else{
                $_SESSION["err"] = "Tên sản phẩm đã tồn tại";
            }
            
        }
        $data = $sanPham->getByID($productID);
    ?>
    <form method="post" enctype="multipart/form-data">
        <!-- Hiện ảnh đã có và chọn ảnh mới -->
        <img id="productImage" src="./media/image/sanpham/<?php echo $data["hinh"]; ?>" class="img-thumbnail"
            style="max-height: 150px;" alt="...">
        <br>
        <h5 id="labelImage"></h5>
        <label class="btn btn-default text-white fw-bolder">
            Chọn ảnh mới<input id="labelChooseFile" type="file" accept="image/*" hidden name="productImage">
        </label>
        <!-- Hiện ảnh ngay khi load -->
        <script>
        const fileUploader = document.querySelector("#labelChooseFile");
        const reader = new FileReader();
    
        fileUploader.addEventListener('change', (event) => {
            const files = event.target.files;
            const file = files[0];
    
            // Get the file object after upload and read the
            // data as URL binary string
            reader.readAsDataURL(file);
    
            // Once loaded, do something with the string
            reader.addEventListener('load', (event) => {
                // Here we are creating an image tag and adding
                // an image to it.
                const img = document.getElementById('productImage');
                img.src = event.target.result;
                img.alt = file.name;
                document.getElementById("labelImage").innerHTML = file.name;
            });
        });
        </script>
        <!-- Thông báo thông tin -->
        <?php if(getSession("info") != ''){ ?>
        <div class='alert alert-info'>
            <strong><?php echo getSession("info"); ?></strong>
        </div>
        <?php } unset($_SESSION["info"]); ?>
    
        <!-- Thông báo lỗi -->
        <?php if(getSession("err") != ''){ ?>
        <div class='alert alert-danger'>
            <strong><?php echo getSession("err"); ?></strong>
        </div>
        <?php } unset($_SESSION["err"]); ?>
        <div class="input-group mb-2">
            <span class="input-group-text">Tên sản phẩm *</span>
            <input type="text" name="productName" value="<?php echo $data["tenSanPham"] ?>" class="form-control">
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">Giá *</span>
            <input type="text" name="productPrice" value="<?php echo $data["gia"] ?>" class="form-control">
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">Mô tả</span>
            <textarea name="productDescription" class="form-control" cols="30"
                rows="5"><?php echo $data["moTa"] ?></textarea>
        </div>
        <input hidden type="text" name="oldName" value="<?php echo $data["tenSanPham"] ?>">
        <input class="btn btn-light fw-bold" type="submit" name="btnEditProduct" value="Sửa thông tin">
    </form>
</div>