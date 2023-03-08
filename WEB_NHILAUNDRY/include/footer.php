<?php
    $dataSetting = $setting->getSetting();
?>
<div class="mx-5">
    <hr style="border-top: 5px solid;">
    <div style="width: 100%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <ul class="list-group">
                        <li class="list-group-item border-0 bg-transparent"><?php echo $dataSetting["site"]; ?></li>
                        <li class="list-group-item border-0 bg-transparent">
                            Hotline: 
                            <a class="text-black" href="tel:0708618698"><?php echo $dataSetting["phone1"]; ?></a>
                            <a class="text-black" href="tel:0768618698"><?php echo $dataSetting["phone2"]; ?></a>
                        </li>
                        <li class="list-group-item border-0 bg-transparent"><a class="text-black" href="mailto:<?php echo $dataSetting["site"]; ?>"><?php echo $dataSetting["mail"]; ?></a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <!--<ul class="list-group">-->
                    <!--    <li class="list-group-item border-0 bg-transparent">Địa chỉ: 76 Phạm Thị Tánh, phường 4, quận 8, HCM.</li>-->
                    <!--    <li class="list-group-item border-0 bg-transparent"><a class="text-black" href="tel:...">...</a></li>-->
                    <!--    <li class="list-group-item border-0 bg-transparent"><a class="text-black" href="mailto: ">NhiLaundry@gmail.com</a></li>-->
                    <!--</ul>-->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <!--<ul class="list-group">-->
                    <!--    <li class="list-group-item border-0 bg-transparent">Địa chỉ: 76 Phạm Thị Tánh, phường 4, quận 8, HCM.</li>-->
                    <!--    <li class="list-group-item border-0 bg-transparent"><a class="text-black" href="tel:...">...</a></li>-->
                    <!--    <li class="list-group-item border-0 bg-transparent"><a class="text-black" href="mailto: ">NhiLaundry@gmail.com</a></li>-->
                    <!--</ul>-->
                </div>
            </div>
        </div>
    </div>
</div>