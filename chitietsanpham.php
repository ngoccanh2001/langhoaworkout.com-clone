<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sản phẩm</title>
    <link rel="icon" href="img/header-icon.png" type="image/png" /> 
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06272aca3f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f3f7fa;
        }
        #them{
			margin-top: 30px;
			font-size: 20px;
			background-color: red;
			border: none;
			font-weight: bold;
			cursor: pointer;
            padding: 8px;
            text-decoration:none; 
            color:#fff;
            width: 261px;
		}
		#them:hover{
			background-color: darkred;
		}
        .content {
            padding: 0px 0px 450px 480px;
            margin-top: -550px;
        }
        input[type='submit']{
            border:none;
            padding:8px;
            background-color:red;
            font-weight:bold;
            color:#fff;
        }
        input[type='submit']:hover{
            background-color:darkred;
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
                    if (isset($_SESSION["name"])) {
                        echo "<li class='nav-item dropdown'>
                               
                                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>  
                                 <b>  Xin chào ".$_SESSION['name']. " ! </b>
                                </a>
                                
                                <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                    <a class='dropdown-item' href='thongTinDonHang.php'>Thông tin đơn hàng</a>
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
            </div>
        </nav>
    <?php 
        require("config.php");
        $tablename = "product";
        $productid = $_GET["id"];
    
        $sql = "SELECT * from `" . $tablename . "` WHERE `Product-ID` =$productid LIMIT 1";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $query=mysqli_query($conn,$sql);
        $result=mysqli_fetch_array($query);
        if ($result) {
    ?>
        <script type="text/javascript">
            // function checkNumber(){ // Hàm này bị lỗi do biến toàn cục $resutl['Quantity']
            //     var tonKho = "<?php echo $result['Quantity']; ?>";
            //     var number = document.getElementById("numberAddItem").value;
            //     if(number > tonKho){
            //         alert('Mặt hàng này chỉ còn ' + tonKho + ' sản phẩm');
            //         return false;
            //     }
            // }
            function checkNumber(RemainingNumberProduct) {
                var number = document.getElementById("numberAddItem").value;
                if(number > RemainingNumberProduct){
                    // document.getElementById('announmentInvalidNumber').innerHTML = "Mặt hàng này chỉ còn " + RemainingNumberProduct + " sản phẩm";
                    alert('Mặt hàng này chỉ còn ' + RemainingNumberProduct + ' sản phẩm');
                    return false;
                }
            }
        </script>
        <form action='capnhatgiohang.php?id=<?php echo $result['Product-ID']?>' method ="POST">
                <img src="<?php echo $result['Picture']; ?>" width="420px;" height="540px;" style='margin:20px 0;'>
                <div class="content" style="height: 300px;">
                    <p style="font-weight: bold; font-size: 30px;">
                        <?php echo $result['Name']; ?><br>
                        <p style="font-size: 20px; color: #748087;"><?php echo number_format($result['Price'],0,',','.'). " VNĐ"; ?></p>
                        <p style="font-size: 16px; width:500px; margin:none;"><?php echo $result['Description'];?></p></br>
                    <table>
                        <tr>
                            <td style="font-size: 20px; width: 150px;"><b>SỐ LƯỢNG:</b></td>
                            <td><input style='width:70px;' id = 'numberAddItem' type="number" name='soluong' min ="1" value="1" required></td>
                        </tr>
                    </table>
                    <!-- Dòng thông báo nếu số lượng vượt quá tồn kho -->
                    <!-- <div id="announmentInvalidNumber" style='color:red; font-size: 15px;'></div> -->
                    <?php 
                            if($result['TypeID'] == 2){
                    ?>
                    </br>
                    <table>
                        <tr>
                            <td style="font-size: 20px; width: 149px;"><b>SIZE:</b></td>
                            <td style='color: #DC143C;'>FREE</td>
					    </tr>
                    </table>
                    <?php 
                            }
                    ?>
                    </br><input name ='themgiohang' onclick="return checkNumber(<?php echo $result['Quantity']; ?>)" type="submit" value="+ THÊM VÀO GIỎ HÀNG"/>
                    
                </div>
        </form>
        
    <?php 
        }
    ?>
    
        <div class="row" style="margin-top: 100px;">
            <div class="col">
                <p><b>HỖ TRỢ KHÁCH HÀNG</b></p>
                <a href="" target="_blank">Gửi yêu cầu hỗ trợ</a> <br>
                <a href="" target="_blank">Hướng dẫn mua hàng</a> <br>
                <a href="" target="_blank">Đơn vị vận chuyển</a>
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