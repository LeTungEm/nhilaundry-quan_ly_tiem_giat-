<?php
    switch(getIndex("mod")){
        case "editProduct":
            include("modules/Admin/ProductManager/editProduct.php");
            break;
        default:
            include("modules/Admin/ProductManager/ProductManager.php");
            break;
    }
?>