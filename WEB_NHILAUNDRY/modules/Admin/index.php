<div class="container" style="max-width: 100%; padding-left: 0px; padding-right: 0px;">
    <div class="row" style="width: 100%; margin-left: 0px;">
        <div class="col-lg-3 col-md-3 pdm-No text-center" style="background-color: rgb(0 0 0 / 13%);">
            <ul class="list-group my-2 fw-bolder">
                <li class="list-group-item list-group-item-action <?php if ($action == "products_manager")
        echo "border-end border-success border-5"; ?>"><a href="?action=products_manager" class="text-black">Quản lý
                        sản phẩm</a></li>
                <li class="list-group-item list-group-item-action <?php if ($action == "setting")
        echo "border-end border-success border-5"; ?>"><a href="?action=setting" class="text-black">Chỉnh sửa giao diện</a></li>
                <li class="list-group-item list-group-item-action <?php if ($action == "logout")
        echo "border-end border-success border-5"; ?>"><a href="?action=logout" class="text-black">Đăng xuất</a></li>
            </ul>
        </div>
        <div id="div_gdql" class="col-lg-9 col-md-9 pdm-No text-center bg-success">
            <script>
            var div_lession = document.getElementById("div_gdql");
            var length = document.documentElement.clientHeight;
            div_lession.style.height = length + "px";
            </script>
            <?php
                switch($action){
                    case "home":
                        $action = "products_manager";
                    case "products_manager":
                        include("modules/Admin/ProductManager/index.php");
                        break;
                    case "setting":
                        include("modules/Admin/Setting.php");
                        break;
                    case "course_manager":
                        include("module/CourseManager/index.php");
                        break;
                    case "logout":
                        unset($_SESSION["adminEmail"]);
                        echo '<meta http-equiv="refresh" content="0,url=index.php?index.php?action=home">';
                        break;
                default:
                    //echo '<meta http-equiv="refresh" content="0,url=index.php?index.php?action=home">';
                    break;
                }
            ?>
        </div>
    </div>
</div>