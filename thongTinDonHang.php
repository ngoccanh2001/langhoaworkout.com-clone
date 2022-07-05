<!DOCTYPE html>
<html>

<head>
    <title>Đơn hàng</title>
    <link rel="icon" href="img/header-icon.png" type="image/png" /> 
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06272aca3f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        h2 {
            color: #0099ff;
            text-align: center;
            margin: 10px 0 10px 0;
        }
        body {
            background-color: #f3f7fa;
        }
        .row{
            background: #ccc;
        }
        .bg-light{
            background: #ccc !important;            
        }
        .navbar{
            width: 100% !important;
        }
        a{
            color: #000 !important; 
        }
        .btn-success{
            color: #fff !important;
        }
        .btn-danger{
            color: #fff !important;
        }
    </style>
    <script type='text/javascript'>
        function checkRemoveBill(){
            var check = confirm("Bạn có chắc chắn hủy đơn hàng này không?");
            if (check === true) return true;
            return false;
        }
    </script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">LangHoaWorkout</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fas fa-home"></i> Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-list"></i> Sản phẩm
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="sanpham.php?id=1">Dụng cụ tập luyện</a>
                            <a class="dropdown-item" href="sanpham.php?id=2">Quần áo tập luyện</a>
                            <a class="dropdown-item" href="sanpham.php?id=3">Sản phẩm dinh dưỡng</a>
                        </div>

                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION["name"])) {
                        echo "<li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                               Xin chào " . $_SESSION["name"] . "!
                                </a>
                                <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                    <a class='dropdown-item' href='thongTinDonHang.php'>Thông tin đơn hàng</a>
                                    <a class='dropdown-item' href='thongTinYeuCau.php'>Yêu cầu của bạn</a>
                                    <a class='dropdown-item' href='dangxuat.php'>Đăng xuất</a>
                                </div>
                                
                            </li>";
                    } else echo " <li class='nav-item'>
                            <a class='nav-link' href='dangnhap.php'><i class='fas fa-user-circle'> Đăng nhập</i></a>
                          </li>";
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="giohang.php"><i class="fas fa-shopping-cart"></i><span class="badge badge-pill badge-danger">
                                <?php
                                $tongMatHang = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $cart_item) {
                                        $tongMatHang += 1;
                                    }
                                }
                                echo $tongMatHang;
                                ?>
                            </span></a>
                    </li>
                </ul>
               
            </div>  
        </nav>
        <h2>THÔNG TIN ĐƠN HÀNG</h2>
        <?php
        require("config.php");
        $tablename = "bill";

        $idCustomer = $_SESSION['currentID'];

        $sql = "SELECT* from `" . $tablename . "` WHERE `CustomerID`=".$idCustomer." ORDER BY BillID DESC ";
        $conn = new mysqli($servername, $username, $password, $dbname);
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
          <th scope='col'>Mã đơn hàng</th>
          <th scope='col'>Ngày đặt hàng</th>
          <th scope='col'>Tổng tiền</th>
          <th scope='col'>Trạng thái</th>
          <th scope='col'>Chi tiết</th>
          <th scope='col'>Hủy đơn hàng</th>
      </tr>
      </thead>
      <tbody>";
            while ($row = $result->fetch_assoc()) {
                $i++;
                echo "<tr>
        <td scope='row'>" . $i . "</td>
        <td>" . $row['BillID'] . "</td>
        <td>" . $row['Date'] . "</td>
        <td>" .  number_format($row['TotalPrice']+20000,0,',','.')." VNĐ" . "</td>";
        if($row['Status']=='Đã hoàn tất'){
            echo "<td><span class='badge badge-pill badge-secondary'>" . $row['Status'] . "</span></td>
            <td><a  href='" . "thongTinChiTietDonHang.php?id=" . $row["BillID"] . "&customerID=" . $row['CustomerID'] . "&sellerID=" . $row['SellerID'] . "&date=" . $row['Date'] . "&total=" . $row['TotalPrice'] . "' class='btn btn-success'>XEM</a></td>
            <td></td>
            ";
            
        }
        else if($row['Status']=='Chờ xác nhận'){
            echo "<td><span class='badge badge-pill badge-success'>" . $row['Status'] . "</span></td>
            <td><a href='" . "thongTinChiTietDonHang.php?id=" . $row["BillID"] . "&customerID=" . $row['CustomerID'] . "&sellerID=" . $row['SellerID'] . "&date=" . $row['Date'] . "&total=" . $row['TotalPrice'] . "&status=" . $row['Status'] ."' class='btn btn-success'>XEM</a></td>
            <td><a onclick= 'return checkRemoveBill()' href='huydonhang.php?del=1&id=".$row['BillID']."' class='btn btn-danger'>HỦY</a></td>";
            
        } 
        else{
            echo "<td><span class='badge badge-pill badge-success'>" . $row['Status'] . "</span></td>
            <td><a href='" . "thongTinChiTietDonHang.php?id=" . $row["BillID"] . "&customerID=" . $row['CustomerID'] . "&sellerID=" . $row['SellerID'] . "&date=" . $row['Date'] . "&total=" . $row['TotalPrice'] . "&status=" . $row['Status'] ."' class='btn btn-success'>XEM</a></td>
            <td></td>";
        }
        echo "</tr>";
            }
            echo "</tbody>
    </table>";
        } else {
            echo "<p>Khách hàng chưa có đơn hàng nào!<p>";
        }

        // if ($conn->query($sql) == TRUE) {
        // echo "New record created successfully";
        // } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        // }

        $conn->close();
        ?>

        <div class="row" style="margin-top: 50px;">
            <div class="col">
                <p><b>HỖ TRỢ KHÁCH HÀNG</b></p>
                <a href="hotro.php" target="_blank">Gửi yêu cầu hỗ trợ</a> <br>
                <a href="huongdanmuahang.php" target="_blank">Hướng dẫn mua hàng</a> <br>
                <a href="donvivanchuyen.php" target="_blank">Đơn vị vận chuyển</a>
                <div class="row">Copyright © 2022 - Bản quyền thuộc về LangHoaWorkout</div>

            </div>
            <div class="col">
                <p><b>KẾT NỐI VỚI CHÚNG TÔI</b></p>
                <a href="mailto:nncanh2001@gmail.com" target="_blank"><img src='./img/email.png'  style='width:15px; height:16.8px;'> Gmail</a> <br>
                <a href="https://facebook.com/LangHoaCollection" target="_blank"><i class="fab fa-facebook-square" style="color:blue;"></i> Facebook</a> <br> 
                <a href="https://youtube.com/StreetWorkoutLàngHoa" target="_blank"><i class="fab fa-youtube-square" style="color:red;"></i> Youtube</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>

</html>