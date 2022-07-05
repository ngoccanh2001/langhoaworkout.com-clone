<?php
    session_start();
    if(isset($_SESSION['loginedadmin'])){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="icon" href="img/header-icon.png" type="image/png" /> 
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06272aca3f.js" crossorigin="anonymous"></script>
    <style>
        .card-img-top {
            width: 285px;
            height: 200px;
        }

        .card {
            margin-top: 20px;
        }
        .imgInBillDetail {
            width: 70px;
            height: 70px;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="admin-index.php">TRANG QUẢN TRỊ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-tasks"></i> QUẢN LÍ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="admin-index.php">QUẢN LÍ SẢN PHẨM</a>
                            <a class="dropdown-item" href="qldh.php">QUẢN LÍ ĐƠN HÀNG</a>
                            <a class="dropdown-item" href="qlkh.php">QUẢN LÍ KHÁCH HÀNG</a>
                            <a class="dropdown-item" href="qlyc.php">QUẢN LÍ YÊU CẦU KHÁCH HÀNG</a>
                            <!-- <a class="dropdown-item" href="#">CHƯƠNG TRÌNH KHUYẾN MÃI</a> -->
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="thongke.php"><i class="fas fa-calculator"></i> THỐNG KÊ</a>
                    </li>
                    <?php
                    if (isset($_SESSION["loginedadmin"])) {
                        echo  "<li class='nav-item'>
                                <a class='nav-link' href='dangxuat.php'><i class='fas fa-sign-out-alt'></i> THOÁT</a>
                              </li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <h2 style="text-align: center; color: rgb(51, 204, 255);">CHI TIẾT ĐƠN HÀNG</h2>
        <div>
            <?php
            require("config.php");
            $tablename = "billdetail";
            $billID=$_GET['id'];
            $cusID=$_GET['customerID'];
            $sql = "SELECT* from `" . $tablename . "` WHERE `BillID`=".$billID."";
            //echo $sql;
            $conn = new mysqli($servername, $username, $password, $dbname);
            echo "<br><p><b>Mã hóa đơn: </b>".$billID;
            echo "<br><p><b>Mã khách hàng: </b>".$cusID;
            echo "<br><p><b>Ngày đặt hàng: </b>".$_GET['date'];
            echo "<br><p><b>Tổng tiền: </b>".number_format($_GET['total']+20000,0,',','.')." VNĐ<br>";
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $i = 0;
                echo "<table class='table'>
      <thead>
      <tr>
        <th scope='col'>STT</th>
          <th scope='col'>Mã sản phẩm</th>
          <th scope='col'>Tên sản phẩm</th>
          <th scope='col'>Ảnh sản phẩm</th>
          <th scope='col'>Số lượng</th>
          <th scope='col'>Đơn giá</th>
      </tr>
      </thead>
      <tbody>";
      $idHinhAnh;
      $tenSP;
                while ($row = $result->fetch_assoc()) {
                    $sqlSelect="SELECT* FROM `product` WHERE `Product-ID`=".$row['ProductID']."";
                    //echo $sqlSelect;
                    $ketQua=$conn->query($sqlSelect);
                    
                    if($ketQua->num_rows>0){
                        while($row2=$ketQua->fetch_assoc()){
                            $idHinhAnh=$row2['Picture'];
                            $tenSP=$row2['Name'];
                        }
                    }
                    $i++;
                    echo "<tr>
        <td scope='row'>" . $i . "</td>
        <td>" . $row['ProductID'] . "</td>
        <td>" . $tenSP . "</td>
        <td><img class='imgInBillDetail' src='".$idHinhAnh."'></td>
        <td>" . $row['Quantity'] . "</td>
        <td>" . $row['Price'] . " VNĐ</td>
      </tr>";
                }
                echo "</tbody>
    </table>";
            } else {
                echo "0 results";
            }

            // if ($conn->query($sql) == TRUE) {
            // echo "New record created successfully";
            // } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            // }

            $conn->close();
            ?>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
<?php
    } else{ ?>
        <head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">              
            <style>
                body{ background: #eee; }
            </style>
        </head>
        <div style='border: 2px solid black;border-radius: 5px;margin:100px auto; width: 30%;'>
        <h2 style="text-align:center;">ĐĂNG NHẬP ADMIN</h2>
        <form method='POST' action='xulydangnhap.php'>
            <div class='form-group'>
                <input placeholder='Tên đăng nhập' name='username-i' type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' style='margin-left: 7px; width: 96%'>
            </div>
            <div class='form-group'>
                <input placeholder='Mật khẩu' name='password-i' type='password' class='form-control' id='exampleInputPassword1' style='margin-left: 7px; width: 96%'>
            </div>
            <button type='submit' class='btn btn-primary' style='margin-left:170px;'>Đăng nhập</button> <br>
        </form>
        </div>";
<?php } ?>