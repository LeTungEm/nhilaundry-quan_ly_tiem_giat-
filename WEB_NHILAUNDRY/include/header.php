<?php
    $dataSetting = $setting->getSetting();
?>
<div id="header" style="width: 100%;" class="d-flex align-items-center justify-content-center">
    <script>
        var div_header = document.getElementById("header");
        var height = document.documentElement.clientHeight;
        div_header.style.height = height + "px";
        function scrolled(event){
            var position = window.pageYOffset;
            var nav = document.getElementById("nav");
            if(position >= height){
                nav.style.backgroundColor = "#c9c9c9";
            }else{
                nav.style.backgroundColor = "transparent";
            }
        }
        window.addEventListener('scroll', scrolled);
    </script>
    
    <nav id="nav" class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="?action=home">Menu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="?action=home">Home</a>
            </li>
          </ul>
          <form action="?action=home#place" method="post" class="d-flex">
            <input class="form-control me-2" name="search" type="search" placeholder="Tìm kiếm..." aria-label="Search">
            <a href="#place"><button class="btn btn-success text-white d-flex align-items-center" name="btnSearch" value="btnSearch" type="submit"><i class="material-icons">&#xe8b6;</i></button></a>
          </form>
          <a href="./?action=login&mod=login" id="btnLogin" class="btn btn-success text-white ms-2 " type="button"><b>Đăng nhập</b></a>
        </div>
      </div>
    </nav>
    
    <div class="text-center">
        <h2><?php echo $dataSetting["storeName"]; ?></h2>
        <h4><i>Mở cửa: <?php echo $dataSetting["time"]; ?></i></h4>
        <h4><i><?php echo $dataSetting["date"]; ?></i></h4>
        <h4><a class="d-flex justify-content-center text-success text-decoration-underline" href="tel:<?php echo $dataSetting["phone1"]; ?>">Gọi tại đây</a></h4>
    </div>
</div>
