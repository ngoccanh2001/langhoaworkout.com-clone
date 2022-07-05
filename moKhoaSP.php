<?php
    require("config.php");
    $tablename = "product";

    $productID=$_GET['id'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE `".$tablename."`
    SET `LockProduct`=0
    WHERE `Product-ID`=$productID";

    $conn->query($sql);

    $conn->close();
     header("Location: admin-index.php");
    exit;
?>