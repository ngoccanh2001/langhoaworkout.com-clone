<?php
    require("config.php");
    $tablename = "bill";

    $BillID=$_GET['id'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $chiTietDonHang="SELECT* FROM `billdetail` WHERE `BillID`=$BillID";
    echo $chiTietDonHang;
    $ketQua=$conn->query($chiTietDonHang);
    if($ketQua->num_rows>0){
        while($row=$ketQua->fetch_assoc()){
            $soLuong=0;
            $layThongTinSanPham="SELECT* FROM `product` WHERE `Product-ID`=".$row['ProductID']."";
            echo $layThongTinSanPham;
            $thucThi=$conn->query($layThongTinSanPham);
            if($thucThi->num_rows>0){
                echo $layThongTinSanPham;
                while($row2=$thucThi->fetch_assoc()){
                    $soLuong=$row2["Quantity"];
                    echo "<br>".$soLuong;
                }
                $soLuong-=$row["Quantity"];
                echo "<br>".$soLuong;
                $sqlUpdate="UPDATE `product` SET `Quantity`=$soLuong WHERE `Product-ID`=".$row["ProductID"]."";
                $conn->query($sqlUpdate);
                echo $sqlUpdate;
            }
            
        }
    }
    $sql = "UPDATE `".$tablename."`
    SET `Status`='Đang giao hàng'
    WHERE `bill`.`BillID`=$BillID";

    $conn->query($sql);

    $conn->close();
    header("Location: qldh.php");
    exit;
?>