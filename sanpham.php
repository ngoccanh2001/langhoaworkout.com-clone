<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sản phẩm</title>
    <link rel="icon" href="img/header-icon.png" type="image/png" /> 
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06272aca3f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        h2{
            color:#0099ff;
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
        .card-body a{
            color: #fff !important;
        }
        .hethang{
            color: red;
            margin-bottom: 16px;
        }
    </style>
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
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Trang chủ <span class="sr-only">(current)</span></a>
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
                    } else {
                        echo " <li class='nav-item'>
                        <a class='nav-link' href='dangnhap.php'><i class='fas fa-sign-in-alt'></i> Đăng nhập</i></a>
                        </li>
                        <a class='nav-link' href='dangky.php'><img src='./img/register.svg' alt='' style='width:16px; height:16.8px;margin-top: -4px;'> Đăng ký</i></a>
                        </li>";}
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="giohang.php"><i class="fas fa-shopping-cart"></i><span class="badge badge-pill badge-danger">
                            <?php
                                    $tongMatHang = 0;
                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $cart_item) {
                                            $tongMatHang++;
                                        }
                                    }
                                    echo $tongMatHang;
                            ?>
                            </span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action='sanpham.php?id=<?php echo $_GET['id'];?>' method = "POST">
                    <input name ="sanphamcantim" class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm tại đây" aria-label="Search">
                    <input  name = "submitSearch" value ="Tìm kiếm" class="btn btn-outline-success my-2 my-sm-0" type="submit"/>
                </form>
            </div>
        </nav>
       
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active car-img-f" data-interval="10000">
                    <img src="./img/langhoaworkout.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item car-img-f" data-interval="2000">
                    <img src="./img/an7.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item car-img-f">
                    <img src="./img/an8.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?php 
            if ($_GET['id'] == 1) echo "<h2 style='margin-top: 50px;'>DỤNG CỤ TẬP LUYỆN</h2>";
            else if ($_GET['id'] == 2) echo "<h2 style='margin-top: 50px;'>QUẦN ÁO TẬP LUYỆN</h2>";
            else echo "<h2 style='margin-top: 50px;'>SẢN PHẨM DINH DƯỠNG</h2>";
    
           require("config.php");
            $tablename = "product";
            $typeid = $_GET["id"];

       
            if (isset($_POST['submitSearch'])){

                $sanphamTim = trim($_POST["sanphamcantim"]);

                $sanphamTim = "%".$sanphamTim."%";

                $sql = "SELECT * FROM `" . $tablename . "` WHERE `TypeID`=$typeid AND `Name` LIKE '".$sanphamTim."' AND LockProduct=0";

                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<div class='row' style = 'margin-left:21px;background-color:#f3f7fa;'>";
                    while ($row = $result->fetch_assoc()){
                        // if (trim($_POST["sanphamcantim"]) !== "" && strpos($row["Name"],$_POST["sanphamcantim"]) !== false){
                            echo "<div style='margin-top: 50px;' class='col'>";
                            echo "<div class='card' style='width: 18rem;'>
                            <img src='" . $row["Picture"] . "'' class='card-img-top' alt='...''>
                            <div class='card-body'>
                            <h5 class='card-title'>" . $row["Name"] . "</h5>
                            <p class='card-text'>ID: " . $row["Product-ID"] . "</p>
                            <p class='card-text'>" . number_format($row["Price"],0,',','.') . " VNĐ</p>";
                            if($row['Quantity'] == 0) echo "<div class ='hethang'>Tạm thời hết hàng</div>";
                            else{
                                echo "
                                    <a href='" . "capnhatgiohang.php?id=" . $row["Product-ID"] . "' class='btn btn-primary'>MUA NGAY</a>
                                    <a href='" . "chitietsanpham.php?id=" . $row["Product-ID"] . "' class='btn btn-primary'>CHI TIẾT</a>";
                                }
                                echo "</div>
                                    </div>    
                                    </div>";
                        // }
                    }
                    echo "</div>";
                }
                else echo "<h4>Không tìm thấy kết quả!</h4>";  
            }

            else{
                $sql = "SELECT * FROM `" . $tablename . "` WHERE `TypeID`=$typeid AND LockProduct=0";

                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<div class='row' style = 'margin-left:21px;background-color:#f3f7fa;'>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<div style='margin-top: 50px;' class='col'>";
                        echo "<div class='card' style='width: 18rem;'>
                            <img src='" . $row["Picture"] . "'' class='card-img-top' alt='...''>
                            <div class='card-body'>
                            <h5 class='card-title'>" . $row["Name"] . "</h5>
                            <p class='card-text'>" . number_format($row["Price"],0,',','.') . " VNĐ</p>";
                            if($row['Quantity'] == 0) echo "<div class ='hethang'>Tạm thời hết hàng</div>";
                            else{
                                echo "
                                    <a href='" . "capnhatgiohang.php?id=" . $row["Product-ID"] . "' class='btn btn-primary'>MUA NGAY</a>
                                    <a href='" . "chitietsanpham.php?id=" . $row["Product-ID"] . "' class='btn btn-primary'>CHI TIẾT</a>";
                                }
                                echo "</div>
                                    </div>    
                                    </div>";
                    }
                    echo "</div>";
                }
            
            }
        


        // else {
        //     echo "0 results";
        // }

        // if ($conn->query($sql) === TRUE) {
        //     echo "New record created successfully";
        // } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // 
        // $conn->close();
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