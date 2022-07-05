<?php
    session_start();
    require("config.php");
    $tablename = "product";

    $productName=$_POST['productName'];
    $productPrice=$_POST['productPrice'];
    $productQuantity=$_POST['productQuantity'];
    $productType=$_POST['productType'];
    $productDescription=$_POST['productDescription'];
    
   
    //upload images
    $tempfile = $_FILES['productFile']['tmp_name'];
    $userfile = $_FILES['productFile']['name']; 
    echo $userfile;
    echo $tempfile;

    $destfile = './img/anh.'.$userfile;

    if(is_uploaded_file($tempfile)){
        if(!move_uploaded_file($tempfile,$destfile)){
            echo 'Problem: Could not move to dest direct';
            exit;
        }
    }
    else { 
        echo 'Possiblefile upload attack. File name'.$userfile;
        exit;
    }
    echo 'File upload Successfully';
    echo "<img src='".$destfile."' alt='Girl in a jacket' width='500' height='600'>";
    echo $destfile;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $Products = $_SESSION['ProductArray'];

    $sql = "INSERT INTO `".$tablename."` (`Picture`, `Name`, `Quantity`, `Price`,`TypeID`,`Description`)
    VALUES ('".$destfile."', '".$productName."', '".$productQuantity."', '".$productPrice."', '".$productType."', '".$productDescription."')";
    
    for($i=0;$i<count($Products);$i++){
        if ($Products[$i][0] ===$productName){
            echo $Products[$i][0] . "</br>";
            $newquantity =  $Products[$i][1]+$productQuantity;
            $sql = "UPDATE`".$tablename."` SET `Quantity` = $newquantity WHERE `Name` = '$productName'";
            break;
        }
    }
   
    $conn->query($sql);


    $conn->close();
    header("Location: admin-index.php");
    exit;
?>