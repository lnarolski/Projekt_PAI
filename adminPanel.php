<?php
    switch ($_GET["edit"]) {
        case 'categories':
            include("./editCategories/mainPage.php");
            break;
        case 'subcategories':
            include("./editSubcategories/mainPage.php");
            break;
        case 'products':
            # code...
            break;
        default:
            include("mainAdminPanel.php");
            break;
    }

    
?>