<?php
   require("config.php");
    $tablename = "requirementscustomer";

    $phone=$_GET['phone-customer'];
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE `".$tablename."`
    SET `Process`=1
    WHERE `requirementscustomer`.`PhoneNumberCus`=$phone";

    $conn->query($sql);
    $conn->close();
    header("Location: qlyc.php");
    exit;
?>