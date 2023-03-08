<?php 
    if(isset($_GET["mod"])){
        $mod = $_GET["mod"];
        $db = new Db();
    
        $header = "Đăng nhập";
        $btnName = "btnSubmitLg";
        if($mod == "register"){
            $header = "Đăng ký";
            $btnName = "btnSubmitRG";
        }
        
    if(postIndex("btnSubmitLg") != ''){
        $email = postIndex("txtEmail");
        $passW = postIndex("txtPassW");
        if($email != '' || $passW != ''){
            $checkLG = $admin->checkLogin($email, $passW);
            if($checkLG != null){
                $_SESSION["adminEmail"] = $email;
                echo '<meta http-equiv="refresh" content="0,url=index.php?action=home">';
            }else{
                $_SESSION["err"] = "Tên đăng nhập hoặc mật khẩu không chính xác!";
                $_SESSION["email"] = $email;
                //echo '<meta http-equiv="refresh" content="0,url=index.php?action=login&mod=login">';
            }
            
        }
    }
?>
<style>
a {
    color: #007bff;
}

.container {
    width: 40%;
}

@media(max-width: 900px) {
    .container {
        width: 80%;
    }
}
</style>

<div class="d-flex mt-4 justify-content-center">
    <div class="border border-2 rounded p-3 container">
        <a class="d-flex justify-content-center" href="./?action=home">
            <h1 class="fw-bold text-center text-success border-bottom">Nhi Laundry</h1>
        </a>
        <h2 class="text-center py-2"><?php echo $header; ?></h2>
        <form method="post" action="">
            <?php if($mod == "register"){ ?>
            <div class="form-group p-1">
                <label for="txtName">Tên</label>
                <input type="text" class="form-control" id="txtName" name="txtName"
                value="<?php echo getCookie("ten") ?>" placeholder="Nhập họ và tên">
            </div>
            <?php } ?>
            <div class="form-group p-1">
                <label for="txtPhone">Mail</label>
                <input type="email" class="form-control" id="txtEmail" name="txtEmail"
                    value="<?php echo getSession("email"); unset($_SESSION["email"]); ?>" aria-describedby="emailHelp"
                    placeholder="Nhập mail ">
            </div>
            <div class="form-group p-1">
                <label for="txtPassW">Mật khẩu</label>
                <input type="password" class="form-control" id="txtPassW" name="txtPassW" placeholder="Nhập mật khẩu">
            </div>
            <?php if($mod == "login"){?>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="ckbRemember" name="ckbRemember" value="1">
                <label class="form-check-label" for="ckbRemember">Lưu đăng nhập</label>
            </div>
            <?php }else{ ?>
            <div class="form-group p-1">
                <label for="txtCKPassW">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="txtCKPassW" name="txtCKPassW"
                    placeholder="Nhập lại mật khẩu">
            </div>
            <?php } ?>
            <button style="width: 100%;" type="submit" value="btnSubmitLG" name="<?php echo $btnName; ?>"
                class="btn btn-success d-flex mx-auto"><span
                    class="d-flex mx-auto"><?php echo $header; ?></span></button>
        </form>
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

    </div>
</div>
<?php } ?>