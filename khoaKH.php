<?php
    require("config.php");

    $tablename = "customer";

    $ID=$_GET['id'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE `".$tablename."`
    SET `LockCustomer`=1
    WHERE `customer`.`CustomerID`=$ID";
    $conn->query($sql);
    $conn->close();
    header("Location: qlkh.php");
    exit;
?>