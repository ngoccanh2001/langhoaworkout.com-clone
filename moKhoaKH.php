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
    SET `LockCustomer`=0
    WHERE `customer`.`CustomerID`=$ID";

    $conn->query($sql);
    $conn->close();
    header("Location: qlkh.php");
    exit;
?>

<!-- //Cập nhật đơn hàng trừ số lượng
// $conn = mysqli_connect($severname,$username,$password,$dbname);
            // foreach($_SESSION['cart'] as $cart_item){
            //     $sql = "SELECT * FROM `".$tablename. "` WHERE `Product-ID` = '".$cart_item['masp']."' LIMIT 1";
            //     $query = mysqli_query($conn,$sql);
            //     $result = mysqli_fetch_array($query);

            //     $soluongmoi = $result['Quantity'] - $cart_item['soluong'];
            //     $id = $result['masp'];

            //     $sql = "UPDATE `".$tablename."`
            //     SET `Quantity`=$soluongmoi
            //     WHERE `product`.`Product-ID`=$id";
            
            //     $conn->query($sql);
                
            // } -->