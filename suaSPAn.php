<?php
    require("config.php");

    $tablename = 'product';

   
    $productPrice=$_POST['productPrice'];
    $productQuantity=$_POST['productQuantity'];
    
    $productDescription=$_POST['productDescription'];
    $productID=$_GET['id'];

    // //upload images
    // $tempfile = $_FILES['productFile']['tmp_name'];
    // $userfile = $_FILES['productFile']['name']; 
    // echo $userfile;
    // echo $tempfile;

    // $destfile = './img/anh.'.$userfile;

    // if(is_uploaded_file($tempfile)){
    //     if(!move_uploaded_file($tempfile,$destfile)){
    //         echo 'Problem: Could not move to dest direct';
    //         exit;
    //     }
    // }
    // else { 
    //     echo 'Possiblefile upload attack. File name'.$userfile;
    //     exit;
    // }
    // echo 'File upload Successfully';
    // echo "<img src='".$destfile."' alt='Girl in a jacket' width='500' height='600'>";
    // echo $destfile;


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE `".$tablename."`
    SET `Quantity`=".$productQuantity.", `Price`=".$productPrice.",`Description`='".$productDescription."'
    WHERE `product`.`Product-ID`=$productID";

    if ($conn->query($sql) == TRUE) {
        echo "Update successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: admin-index.php");
    exit;
?>