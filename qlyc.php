<?php 
    session_start();
    if(isset($_SESSION['loginedadmin'])){
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/header-icon.png" type="image/png" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06272aca3f.js" crossorigin="anonymous"></script>
    <style>
        #btn-danger{
            cursor:not-allowed;;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="admin-index.php">TRANG QUẢN TRỊ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    </div>
    <h2 style="text-align: center; color:rgb(51, 204, 255); margin: 15px 0 15px 0;">QUẢN LÍ YÊU CẦU KHÁCH HÀNG</h2>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
<?php
   require("config.php");
    $tablename = "requirementscustomer";

    $sql = "SELECT* from `".$tablename."` ORDER BY `DateRequired` DESC";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
      $i=0;
      echo "<table class='table' style=' margin: 15px auto;'>
      <thead>
      <tr>
          <th scope='col'>STT</th>
          <th scope='col'>Họ và tên</th>
          <th scope='col'>Số điện thoại</th>
          <th scope='col'>Mã đơn hàng</th>
          <th scope='col'>Tiêu đề</th>
          <th scope='col'>Nội dung</th>
          <th scope='col'>Ngày gửi</th>
          <th scope='col'>Xử lý</th>
      </tr>
      </thead>
      <tbody>";
    while($row = $result->fetch_assoc()) {
        $i++;
        echo "<tr>
        <th scope='row'>".$i."</th>
        <td>".$row['FullName']."</td>
        <td>+84 ".$row['PhoneNumberCus']."</td>
        <td>".$row['BillID']."</td>
        <td>".$row['Title']."</td>
        <td>".$row['Content']."</td>
        <td>".$row['DateRequired']."</td>
        <td>";
        if ($row['Process']==0){
            echo "<a href='"."tiepnhanYC.php?phone-customer=".$row['PhoneNumberCus']."' class='btn btn-success'>Chưa tiếp nhận</a>";
            }
        else {
            echo "<div class='btn btn-danger' id='btn-danger' >Đã tiếp nhận</div>";
            }
        echo "</td>
      </tr>";
    }
    echo "</tbody>
    </table>
    
    ";
    } else {
      echo "<p style='text-align:center;'>Chưa có yêu cầu nào!</p>";
    }

    // if ($conn->query($sql) == TRUE) {
    // echo "New record created successfully";
    // } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    $conn->close();
?>
<!-- Kiểm tra session đăng nhập -->
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