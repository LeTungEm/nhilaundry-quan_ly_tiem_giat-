<?php
    if(postIndex("btnAddProduct") != ""){
        $productName = postIndex("productName");
        $productPrice = (postIndex("productPrice") == "")?0:postIndex("productPrice");
        $productDescription = postIndex("productDescription");
        $productImage = getFile("productImage");
        $maxID = $sanPham->getMaxID();
        $imgName;
        
        if(strlen($productName) == 0){
            $_SESSION["err"] = "Không được để trống tên sản phẩm";
        }else{
            if(count($sanPham->checkName($productName)) == 0){
                $imgName = ($productImage["size"] == 0)?"":($maxID.substr($productImage["name"],-4));
                if($sanPham->insertProduct($productName, $productPrice, $productDescription, $imgName) > 0){
                    if (!move_uploaded_file($productImage["tmp_name"], "media/image/sanpham/".$imgName) && $productImage["size"] < 0 ){
                        $_SESSION["err"] = "Không thể lưu ảnh!!!!";
                    }
                    $_SESSION["info"] = "Đã thêm sản phẩm: ".$productName;
                }
            }else{
                $_SESSION["err"] = "Tên sản phẩm đã tồn tại";
            }
        }
    }
    
    if(postIndex("btnDeleteProduct") != ""){
        $idProduct = postIndex("idProduct");
        $imgProduct = postIndex("imgProduct");
        $nameProduct = postIndex("nameProduct");
        
        if($sanPham->deleteProduct($idProduct) > 0){
            $path = "media/image/sanpham/$imgProduct";
            (file_exists($path) && is_file($path))?unlink($path):"";
            $_SESSION["info"] = "Đã xóa sản phẩm: ".$nameProduct;
        }
    }
?>


<div style="height: 100%" class="scrollVer">
    <form method="post">
        <ul class="list-group text-start my-2">
            <li class="list-group-item">
                <!-- form lọc thông tin -->
                <div class="input-group my-2">
                    <label class="input-group-text" for="type">Sắp xếp theo</label>
                    <select class="form-select" id="type" name="type">
                        <option selected value="msp">Mã sản phẩm</option>
                        <option value="tsp">Tên sản phẩm</option>
                        <option value="g">Giá</option>
                        <option value="h">Hình</option>
                    </select>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" checked name="role" type="radio" id="asc" value="1">
                    <label class="form-check-label" for="asc">Tăng dần dữ liệu</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="role" type="radio" id="desc" value="0">
                    <label class="form-check-label" for="desc">Giảm dần dữ liệu</label>
                </div>
                <input class="btn btn-success" value="Lọc dữ liệu" type="submit" name="btnSubmit">
            </li>
            <li class="list-group-item d-flex">
                <input class="form-control me-3" name="search" type="search" placeholder="Tìm sản phẩm"
                    aria-label="Search">
            </li>
        </ul>
    </form>
    <div class="container bg-light text-center my-2 p-0 rounded" style="max-width: 100%">
        <ul class="list-group">
            <li class="list-group-item">
                <!-- Thông báo lỗi -->
                <?php if(getSession("err") != ''){ ?>
                <div class='alert alert-danger'>
                    <strong><?php echo getSession("err"); ?></strong>
                </div>
                <?php } unset($_SESSION["err"]); ?>
                <!-- Thông báo thông tin -->
                <?php if(getSession("info") != ''){ ?>
                <div class='alert alert-info'>
                    <strong><?php echo getSession("info"); ?></strong>
                </div>
                <?php } unset($_SESSION["info"]); ?>
            </li>
            <li class="list-group-item">
                <!-- form thêm san pham -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row courses-info">
                        <div class="col col-lg-1 col-12 mb-1 fw-bolder">
                            <!-- icon thêm san pham -->
                            <label for="qlcourse_cbControl" class="d-flex my-1">
                                <i class="material-icons text-success" style="font-size:36px">
                                    add_circle
                                </i>
                            </label>
                        </div>
                        <input hidden type="checkbox" id="qlcourse_cbControl">
                        <div hidden class="col col-lg-2 col-12 mb-1 fw-bolder"><input class="form-control"
                                placeholder="Nhập tên *..." type="text" name="productName"></div>
                        <div hidden class="col col-lg-2 col-12 mb-1 fw-bolder"><input class="form-control"
                                placeholder="Nhập giá *..." type="text" name="productPrice"></div>
                        <div hidden class="col col-lg-2 col-12 mb-1 fw-bolder"><input class="form-control"
                                placeholder="Mô tả..." type="text" name="productDescription"></div>
                        <div hidden class="col col-lg-2 col-12 mb-1 fw-bolder"><img class="img-thumbnail" id="productImage"></div>
                        <div hidden class="col col-lg-3 col-12 mb-1">
                            <label id="labelCourseImage" for="formAdd_courseImage"
                                class="btn btn-default text-success fw-bolder"> Chọn ảnh</label>
                            <input hidden accept="image/*" type="file" name="productImage" id="formAdd_courseImage">
                            <script>
                            const reader = new FileReader();
                            document.getElementById("formAdd_courseImage")
                                .onchange = function(event) {
                                    
                                    var file = event.target.files[0];
                                    
                                    reader.readAsDataURL(file);

                                    // Once loaded, do something with the string
                                    reader.addEventListener('load', (event) => {
                                        // Here we are creating an image tag and adding
                                        // an image to it.
                                    
                                        const img = document.getElementById("productImage");
                                        img.src = event.target.result;
                                        img.alt = file.name;
                
                                        document.getElementById("labelCourseImage").innerText = file.name;
                                    });
                                }
                            </script>
                            <input type="submit" name="btnAddProduct" class="btn btn-success fw-bolder" value="Thêm">
                        </div>
                    </div>
                </form>
            </li>
            
            
            <li class="list-group-item">
                <div class="row product-info">
                    <div class="col col-1 fw-bolder">Mã</div>
                    <div class="col col-3 fw-bolder">Tên Sản Phẩm</div>
                    <div class="col col-2 fw-bolder">Giá</div>
                    <div class="col col-2 fw-bolder">Mô Tả</div>
                    <div class="col col-2 fw-bolder">Hinh</div>
                    <div class="col col-2 fw-bolder">&nbsp;</div>
                </div>
            </li>
            <?php 
            if(isset($_POST["btnSubmit"])){
                // Xử lý lọc khóa học
                $role = (postIndex("role") == '1')? "ASC":"DESC";
                $arrType = array("maSanPham" => "msp", "tenSanPham" => "tsp", "gia" => "g", "hinh" => "h");
                $type = (postIndex("type") != 'slb')?array_keys($arrType,postIndex("type"))[0]:"";
                
                $listSanPham = $sanPham->getOnRequest($type, $role, postIndex("search"));
                
            }else{
                $listSanPham = $sanPham->getAll();
            }
        foreach($listSanPham as $data){ ?>
            <li class="list-group-item">
                <div class="row product-info">
                    <div class="col col-1"><?php echo $data["maSanPham"]; ?></div>
                    <div class="col col-3"><?php echo $data["tenSanPham"]; ?></div>
                    <div class="col col-2"><?php echo $data["gia"]; ?></div>
                    <div class="col col-2"><?php echo $data["moTa"]; ?></div>
                    <div class="col col-2 fw-bolder">
                        <?php 
                            $pathProductImg = "media/image/sanpham/".$data["hinh"];
                            if (file_exists($pathProductImg) && is_file($pathProductImg)){
                        ?>
                        <img src="<?php echo $pathProductImg ?>" style="max-height: 50px" class="img-fluid">
                        <?php } ?>
                    </div>
                    <div class="col col-2">
                        <i onclick="deleteMessage(<?php echo $data['maSanPham'].", '".$data["hinh"]."', '".$data["tenSanPham"]."'"; ?>)" class="material-icons me-3"data-bs-toggle="modal" data-bs-target="#exampleModal" data-toggle="tooltip" title="Xóa"
                            style="font-size: 24px; cursor: pointer;">delete</i>
                        <a href="?action=products_manager&mod=editProduct&idProduct=<?php echo $data["maSanPham"]; ?>" class="material-icons text-black" data-toggle="tooltip" title="Chỉnh sửa" style="font-size:24px;cursor: pointer;">edit</a>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel">Thông báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc muốn xóa sản phẩm này
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <form method="post">
                    <input id="idProduct" hidden type="text" name="idProduct" value="">
                    <input id="imgProduct" hidden type="text" name="imgProduct" value="">
                    <input id="nameProduct" hidden type="text" name="nameProduct" value="">
                    <input name="btnDeleteProduct" type="submit" value="Xóa sản phẩm" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Lấy id qua sự kiện click
function deleteMessage(id, imgName, nameProduct) {
    document.getElementById("idProduct").value = id;
    document.getElementById("imgProduct").value = imgName;
    document.getElementById("nameProduct").value = nameProduct;
}
</script>

<style>
i {
    cursor: pointer;
}

i:hover {
    color: darkgray;
}

#qlcourse_cbControl:checked~.col {
    display: block !important;
}
</style>