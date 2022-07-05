<?php
    session_start();
    if (isset($_SESSION["name"])){
    // xóa session login
        unset($_SESSION["name"]); 
        unset($_SESSION["currentID"]);
        header("Location: index.php");
    }
    if (isset($_SESSION["loginedadmin"])){
        // xóa session loginadmin
            unset($_SESSION["loginedadmin"]); 
            header("Location: admin-index.php");
    }
?>