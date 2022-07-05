<?php
   
    require("config.php"); 

    $tablename = "bill";

    $BillID=$_GET['id'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE `".$tablename."`
    SET `Status`='Đã giao hàng'
    WHERE `bill`.`BillID`=$BillID";

    $conn->query($sql);

    $conn->close();
    header("Location: qldh.php");
    exit;
?>