<?php 
    session_start();

    // Xử lý hủy đơn hàng
        if(isset($_GET['del']) && $_GET['del'] == 1){
            require("config.php");
    
            $tablename1 = "billdetail";
            $tablename = "bill";
            
    
            $id = $_GET['id'];
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
    
    
    
            $sql ="DELETE FROM $tablename1 WHERE BillID=$id";
            $conn->query($sql);
    
            
            
    
            $sql2 = "DELETE FROM $tablename WHERE BillID=$id";
            if($conn->query($sql2) == true){
                echo "<script>alert('Đã hủy đơn hàng thành công');</script>";
                $conn->close();
                header( "refresh:0;url=thongtinDonHang.php" );

            }
            
            
        }

?>