

<?php
        session_start();
        if (!isset($_SESSION['name'])){
            echo "<script>alert('Đăng nhập để đặt hàng')</script>";
            header( "refresh:0;url=dangnhap.php" );
        }
        else{
            require("config.php");

            $a=$_SESSION["currentID"];
            $b=$_SESSION["money"]; //tổng tiền
            $r=$_SESSION["numsp"]+1; 
            $date = date('Y-m-d', time());

            // Tra cứu thông tin khách hàng
            $sqlGetCustomer = "SELECT * FROM `customer` WHERE `CustomerID` = '".$a."' LIMIT 1";
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $result1=$conn->query($sqlGetCustomer);
            
            if ($result1->num_rows > 0) $row1 = $result1->fetch_assoc();


            if(isset($_GET['payed'])){
                require("config.php");
                $con = new mysqli($servername, $username, $password, $dbname);
                $sql_stmt1="INSERT INTO Bill VALUES ('','$a','2','$date','$b','Chờ xác nhận')";
                mysqli_query($con,$sql_stmt1);


                $sqll="SELECT * FROM `bill` ORDER BY `bill`.`BillID` DESC";
                $result=mysqli_query($con,$sqll);
                $row = mysqli_fetch_array($result);
                $t=$row['BillID'];

                for($i=0;$i<$r;$i++)
                {
                    $n=$_SESSION['num'][$i];
                    $v=$_SESSION['value'][$i];
                    $s=$_SESSION['sp'][$i];

                    $sql_stmt2="INSERT INTO billdetail VALUES ('$t','$s','$n', '$v')"; // t = billID, s = productID, n = soluongmua, v = gia
                    mysqli_query($con,$sql_stmt2);


                    // <!-- Code xu ly cap nhat so luong ton kho cua san pham -->

                    // Soluongtonkhomoi = ton kho - soluongmua


                    $sql_getnum = "SELECT `Quantity` FROM `product` WHERE `Product-ID` = '".$s."' LIMIT 1";   

                
                    $result =  $con->query($sql_getnum);

                    
                    if ($result->num_rows > 0) 
                        // output data of each row
                        $row = $result->fetch_array();
                    else 
                        echo "0 results";
                        

                    $SLTonKhoMoi = $row['Quantity'] - $n;

                    // Check connection
                    if ($con->connect_error) 
                    die("Connection failed: " . $con->connect_error);
                    
                    $sql = "UPDATE `product`
                    SET `Quantity`= $SLTonKhoMoi
                    WHERE `product`.`Product-ID`=$s";
                    $con->query($sql);
                }
                    // Hủy giỏ hàng
                    // echo $t;
                    unset($_SESSION['cart']);
                    echo "<script>alert('Cảm ơn bạn đã đặt hàng!')</script>";
                    header( "refresh:0;url=index.php" );
            }
?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <link rel="icon" href="img/header-icon.png" type="image/png" /> 
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Thanh toán và mua hàng</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
                <script src="https://kit.fontawesome.com/06272aca3f.js" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
                <link rel="stylesheet" href="style.css">
                <style>
                    h2{
                        margin-left:-700px;
                        padding: 15px;
                        color:#0099ff;
                    }
                    
                    body{
                        background-color: #f3f7fa;
                    }
                    header{
                        background: #fff;
                    }
                    .type-ship, .type-payment, .ship-address, .your-order{
                        position: relative;
                        background-color: #fff;
                        margin: 30px;
                        width: 500px;
                        padding: 20px;
                    }
                    .type-ship{
                        left: 150px;
                    }

                    .type-payment{
                        left: 150px;
                    }

                    .ship-address{
                        left: 700px;
                        top: -263px;
                        width: 400px !important;
                    }

                    .your-order{
                        left: 700px;
                        top: -262px;
                        width: 400px !important;

                    }
                    .left, .right{
                        width: 500px;
                    }

                    .sumtotal{
                        margin: 0 0 0 0px !important;
                    }

                </style>
            </head>
            <body>
                <header>
                    <h2>LangHoaWorkout - Trang thanh toán</h2>
                </header>

                <div class="wrapper-content">
                    <div class="left">
                        <div class="type-ship">
                            <h4>Chọn hình thức giao hàng</h4>
                            <input type="checkbox" id="" name="vehicle1" value="Bike"> LangHoaNow - giao hàng tiết kiệm
                        </div>

                        <div class="type-payment">
                            <h4>Chọn hình thức thanh toán</h4>
                            <select class="form-select" aria-label="Default select example">
                                <option value="4" selected>Thanh toán tiền mặt khi nhận hàng</option>
                                <option value="1">Thanh toán bằng ví MoMo</option>
                                <option value="2">Thanh toán bằng ví ZaloPay</option>
                                <option value="3">Thanh toán bằng thẻ ATM nội địa</option>
                            </select>
                        </div>
                    </div>

                    <div class="right">
                        <div class="ship-address">
                            <h5>Giao tới</h5>
                            <table>
                                <tr>
                                    <?php 
                                        echo "<th style='width:200px;'>".$row1['LastName']." ".$row1['FirstName']."</th>
                                              <th>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                              <th>+84 ".$row1['PhoneNumber']."</th>"; 
                                    ?>
                                </tr>
                                <tr>
                                    <td><?php echo $row1['Address'] ?></td>
                                </tr>
                            </table>
                        </div>

                        <div class="your-order">
                            <h5>Đơn hàng của bạn</h5>
                            <p> <b>Tạm tính</b> </p> 
                            <p style='margin: -38px 0px 0px 243px;'><b>Phí vận chuyển</b>  </p>
                            <p> <?php echo number_format($b,0,',','.')." VNĐ";?> </p>
                            <p style='position: absolute; top: 78px; left: 262px;'>20.000 VNĐ</p>
                            <p class='sumtotal' sytyle='margin-top:150px; margin-botton: 15px;'> <b>Tổng tiền</b> <span style='font-size: 12px;'>(Đã bao gồm VAT nếu có)</span> </p> 
                            <b><p style="color:red;"><?php echo  number_format($b+20000,0,',','.')." VNĐ";?></p></b>
                            <a href="dathang.php?payed=1"  class="btn btn-primary"><b>Đặt hàng</b> </a>
                        </div>
                    </div>
                    
                </div>

                </body>
                </html>
<?php
}    
?>