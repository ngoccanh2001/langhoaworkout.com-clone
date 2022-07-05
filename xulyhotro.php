<?php
    session_start();
    require("config.php");

    


    $tablename = "requirementscustomer";

    $customerBillCode=$_POST['customer-bill-code'];
    $customerTitle=$_POST['customer-title'];
    $customerContent=$_POST['customer-content'];

    $date = date('Y-m-d', time());
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql1 = "SELECT * FROM customer WHERE CustomerID = ".$_SESSION['currentID']."";
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result=$conn->query($sql1);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }

    $sql = "INSERT INTO `".$tablename."` (`PhoneNumberCus`, `BillID`,`FullName`, `Title`, `Content`,`DateRequired`,`Process`)
    VALUES ('".$row['PhoneNumber']."', '".$customerBillCode."', '".$row['LastName']." ".$row['FirstName']."' ,  '".$customerTitle."', '".$customerContent."','".$date."',0)";
   
    $conn->query($sql);
    $conn->close();
    
    header('location:index.php');

?>