<?php
    $dataSetting = $setting->getSetting();
?>
<div class="home-body px-5">
    <div id="place" class="d-flex justify-content-center my-5">
        <figure class="text-center" style="max-width: 50%;">
          <blockquote class="blockquote blur-text">
            <p><?php echo $dataSetting["content"]; ?></p>
          </blockquote>
          <figcaption class="blockquote-footer">
            <?php echo $dataSetting["sign"]; ?>
          </figcaption>
        </figure>
    </div>
    <div>
        <!--slideShow-->
        <div>
            <div id="carouselExampleDark" class="carousel carousel-dark slide d-none" data-bs-ride="carousel">
                <!--<div class="carousel-indicators">-->
                <!--    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"-->
                <!--        aria-current="true" aria-label="Slide 1"></button>-->
                <!--    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"-->
                <!--        aria-label="Slide 2"></button>-->
                <!--    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"-->
                <!--        aria-label="Slide 3"></button>-->
                <!--</div>-->
                <div class="carousel-inner">
                    <?php 
                        if(postIndex("btnSearch") != ""){
                            // echo '<meta http-equiv="refresh" content="0,url=index.php?action=home#place">';
                            $listSanPham = $sanPham->getOnRequest("maSanPham", "ASC", postIndex("search"));
                        }else{
                            $listSanPham = $sanPham->getAll();   
                        }
                        $flag = true;
                        foreach($listSanPham as $data){
                            $path = "media/image/sanpham/";
                            $img = (file_exists($path.$data["hinh"]) && is_file($path.$data["hinh"]))?$path.$data["hinh"]:$path."default.jpg";
                    ?>
                    <div class="carousel-item <?php if($flag){echo "active"; $flag = false;} ?>" data-bs-interval="2000">
                        <div class="d-block w-100 d-flex justify-content-evenly">
                            <div class="card" style="width: 200px;">
                                <img src="<?php echo "../".$img; ?>" style="height: 150px" class="img-fluid" alt="...">
                                <div class="card-body scrollVer" style="height: 200px">
                                    <h4><?php echo $data["tenSanPham"]; ?></h4>
                                    <i class"fs-3"><?php echo $data["gia"]; ?></i>
                                    <p class="card-text"><?php echo $data["moTa"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!---->

        <div id="listSP" class="list-group list-group-horizontal scrollView">
            <?php
                foreach($listSanPham as $data){
                    $path = "media/image/sanpham/";
                    $img = (file_exists($path.$data["hinh"]) && is_file($path.$data["hinh"]))?$path.$data["hinh"]:$path."default.jpg";
            ?>
            <div class="list-group-item border-0 bg-transparent">
                <div class="card" style="width: 200px;">
                    <img src="<?php echo "../".$img; ?>" style="height: 150px" class="img-fluid" alt="...">
                    <div class="card-body scrollVer" style="height: 200px">
                        <h4><?php echo $data["tenSanPham"]; ?></h4>
                        <i class"fs-3"><?php echo $data["gia"]; ?></i>
                        <p class="card-text"><?php echo $data["moTa"]; ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="img-content d-flex justify-content-center my-5">
        <div class="card border-0 mb-3 bg-transparent">
            <div class="row g-0">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-center">
                    <video src="../media/video/default.mp4" class="img-fluid" style="max-height: 150pp150ppx;" controls autoplay loop>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex align-items-center">
                    <div class="card-body" >
                        <h5 class="card-title"><?php echo $dataSetting["header"]; ?></h5>
                        <p class="card-text"><?php echo $dataSetting["videoDescription"]; ?></p>
                        <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

