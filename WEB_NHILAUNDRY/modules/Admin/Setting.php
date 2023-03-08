<?php
    if(postIndex("btnSetting") != ""){
        $info = postIndex("info");
        $sign = postIndex("sign");
        $headerVideo = postIndex("headerVideo");
        $descriptionVideo = postIndex("descriptionVideo");
        $video = getFile("video");
        $storeName = postIndex("storeName");
        $date = postIndex("date");
        $time = postIndex("time");
        $site = postIndex("site");
        $phone1 = postIndex("phone1");
        $phone2 = postIndex("phone2");
        $mail = postIndex("mail");
        
        if($setting->updateSetting($info, $sign, "default.mp4", $headerVideo, $descriptionVideo, $storeName, $date, $time, $site, $phone1, $phone2, $mail) > 0){
           
        }
        
        if($video["size"] > 0){
            move_uploaded_file($video["tmp_name"], "media/video/default.mp4");
        }
    }
    
    $data = $setting->getSetting();
?>
<div style="height: 100%" class="scrollVer">
    <h2>&nbsp</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <h4 class="text-start">Nội dung trang web</h4><hr>
        <textarea name="info" placeholder="Nhập nội dung..." class="form-control" cols="30" rows="5"><?php echo $data["content"]; ?></textarea><br>
        <input type="text" name="sign" value="<?php echo $data["sign"]; ?>" placeholder="Nhập ghi chú..." class="form-control"><br>
        <h4 class="text-start">Video</h4><hr>
        <!-- Thêm video -->
        <input hidden type='file' name="video" accept="video/mp4" id='videoUpload' />
    
        <video class="img-thumbnail" style="max-height: 150px;" width="320" height="240" controls>
            <source src="../media/video/default.mp4" type="video/mp4">
        </video><br>
        <label id="labelVideo" for="videoUpload" class="btn btn-default text-light fw-bolder"> Chọn
            video</label>
    
        <script>
        document.getElementById("videoUpload")
            .onchange = function(event) {
                let file = event.target.files[0];
                let blobURL = URL.createObjectURL(file);
                document.querySelector("video").src = blobURL;
            }
        </script>
        <div class="input-group mb-2">
            <span class="input-group-text">Tiêu đề</span>
            <input type="text" name="headerVideo" value="<?php echo $data["header"]; ?>" class="form-control">
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">Mô tả video</span>
            <input type="text" name="descriptionVideo" value="<?php echo $data["videoDescription"]; ?>" class="form-control">
        </div>
        <h4 class="text-start">Thông tin giới thiệu</h4><hr>
        <div class="input-group mb-2">
            <span class="input-group-text">Tên cửa hàng</span>
            <input type="text" name="storeName" value="<?php echo $data["storeName"]; ?>" class="form-control">
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">Ngày mở cửa</span>
            <input type="text" name="date" value="<?php echo $data["date"]; ?>" class="form-control">
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">Thời gian mở</span>
            <input type="text" name="time" value="<?php echo $data["time"]; ?>" class="form-control">
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">Địa chỉ</span>
            <input type="text" name="site" value="<?php echo $data["site"]; ?>" class="form-control">
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">SDT 1</span>
            <input type="text" name="phone1" value="<?php echo $data["phone1"]; ?>" class="form-control">
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">SDT 2</span>
            <input type="text" name="phone2" value="<?php echo $data["phone2"]; ?>" class="form-control">
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">Mail</span>
            <input type="text" name="mail" value="<?php echo $data["mail"]; ?>" class="form-control">
        </div>
        <input type="submit" name="btnSetting" value="Lưu chỉnh sửa" class="btn btn-secondary fw-bolder mb-3" style="width: 100%">
    </form>
</div>