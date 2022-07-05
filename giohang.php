<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <title>Giỏ hàng</title>
    <link rel="icon" href="img/header-icon.png" type="image/png" /> 
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- <script src="https://kit.fontawesome.com/06272aca3f.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f3f7fa;
        }
        .row{
            background: #ccc;
        }
        .bg-light{
            background: #ccc !important;            
        }
        .row a, .bg-light a{
            color: #000 !important; 
        }
    </style>

    

    <script type = "text/javascript">
        function removeProduct(input){
            var check = confirm(input);
            if(check == true) return true;
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
                    if (isset($_SESSION["name"])) {
                        echo "<li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                               Xin chào " . $_SESSION["name"]. "! 
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
                            </li>";
                        }
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

        <h2 style="color:rgb(51, 204, 255);margin-top: 20px;">GIỎ HÀNG CỦA BẠN</h2>
        <?php 
           if(isset($_SESSION['cart'])){
            $tongtien = 0;
            $i=0;
            echo "<table style='width: 100%; font-size:17.5px; text-align: center; border-collapse:collapse;margin-top: 15px;' border='1'>
            <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th style='width: 200px;'>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                    <th>Quản lý</th>
            </tr>";
            echo "<span><a onclick='return removeProduct(\"Bạn có chắc chắn xóa toàn bộ sản phẩm?\")' style='margin-top:-25px; float:right; font-size:17.5px; text-decoration:none; color:rgb(153, 51, 0);' href='capnhatgiohang.php?xoatoanbo=1'>Xóa tất cả</a></span>";
            foreach($_SESSION['cart'] as $cart_item){
                $thanhtien = $cart_item['soluong'] * $cart_item['gia'];
                $tongtien+=$thanhtien;
                $_SESSION['num'][$i]=$cart_item['soluong'];
                $_SESSION['value'][$i]=$cart_item['gia'];
                $_SESSION['sp'][$i]=$cart_item['masp'];
                $_SESSION["numsp"] = $i;
                $i++; 
                echo "<tr>
                        <td>$i</td>
                        <td>".$cart_item['tensp']."</td>
                        <td><img src='".$cart_item['hinhanh']."' style = 'width:10rem; height:8rem;'/></td>
                        <td><a style='text-decoration:none;' href='" . "capnhatgiohang.php?tru=" . $cart_item["masp"] . "'><i class='fas fa-minus'></i></a> &nbsp
                        ".$cart_item['soluong']." &nbsp 
                        <a style ='text-decoration:none;'href='" . "capnhatgiohang.php?cong=" . $cart_item["masp"] . "'><i class='fas fa-plus'></i></a>
                        </td>
                        <td>".number_format($cart_item['gia'],0,',','.')." VNĐ</td>
                        <td>".number_format($thanhtien,0,',','.')." VNĐ</td>
                        <td><a onclick='return removeProduct(\"Bạn có chắc chắn xóa sản phẩm này không?\")' style='text-decoration:none;' href='" . "capnhatgiohang.php?xoa=" . $cart_item["masp"]."'>Xóa</a></td>
                </tr>";
            }
            echo $i;
            echo "</table>";
            $_SESSION['money']=$tongtien;
            echo "<div class = 'tongtien' style='font-weight:bold; margin-left:850px; margin-top:10px;'>Tổng tiền: ".number_format($tongtien,0,',','.'). " VNĐ</div>";
            echo "<span style='font-size:12px; margin-left:900px;'>(Chưa bao gồm phí VAT)</span>";
            echo "<a class = 'dathang' style='margin-left: 945px;' href='dathang.php'><button style=margin:5px;background-color:#0099ff;border:none;color:#fff;>Mua hàng</button></a>";
            }
            else{
                echo "<h4>Hiện tại giỏ hàng của bạn trống!</h4>";
                echo "<a href='sanpham.php?id=1'>Chọn mua sản phẩm</a>";
            }
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