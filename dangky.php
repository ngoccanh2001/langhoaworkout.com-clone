<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <title>Đăng ký</title>
    <link rel="icon" href="img/header-icon.png" type="image/png" /> 
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06272aca3f.js" crossorigin="anonymous"></script>
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
        a{
            color: #000 !important; 
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
        <div style='border: 2px solid black;border-radius: 5px;margin-top: 55px;width: 50%;margin-left: 250px; padding: 5px;'>
            <h2 style="margin-top: 50px;">ĐĂNG KÝ</h2>
            <form method="POST" action="xulydangky.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên đệm</label>
                    <input placeholder="VD: Nguyễn Văn" name="lastname" type="text" class="form-control" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s|_]+$" required id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">Tên</label>
                    <input placeholder="VD: Nam" name="firstname" type="text" class="form-control" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s|_]+$" required id="exampleInputEmail2" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Tên đăng nhập</label>
                    <input placeholder="VD: vannguyen123" name="username-i" type="text" class="form-control" pattern="(?=.*[a-zA-Z0-9]$).{6,}" id="exampleInputEmail3" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail5">Địa chỉ</label>
                    <input  placeholder="VD: Bình Chánh, TPHCM" name="address" type="text" class="form-control"  pattern="(?=.*[a-zA-Z0-9]).{1,}" id="exampleInputEmail5" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput4">Số điện thoại (+84)</label>
                    <input placeholder="VD: 123456789" name="phone" type="tel" pattern="(?=.*[0-9]).{9}" class="form-control" id="exampleFormControlInput4">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input placeholder="Mật khẩu nên có độ dài trên 6 ký tự" pattern=".{6,}" name="password-i" type="password" class="form-control" id="exampleInputPassword1" required>
                </div>

                <!-- <div class="form-group">
                    <label for="exampleInputPassword2">Nhập lại mật khẩu</label>
                    <input name="password-i2" type="password" class="form-control" pattern=".{6,}" id="exampleInputPassword2" required>
                </div> -->
                
                <button type="submit" class="btn btn-primary" style="margin-top: 20px; margin-left:41%;">Đăng ký</button>
            </form>
        </div>
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