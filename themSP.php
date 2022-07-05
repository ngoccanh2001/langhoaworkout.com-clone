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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06272aca3f.js" crossorigin="anonymous"></script>
    <style>
        .card-img-top {
            width: 285px;
            height: auto;
        }
    </style>
    <!-- <script type="text/javascript">
        function validateTextArea(){
            var data = document.getElementById("exampleFormControlTextarea1").value;
            const reguarExp = new RegExp('[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ0-9|_]+$');
            if (reguarExp.test(data) === false){
                alert("Mô tả của bạn không hợp lệ, vui lòng nhập lại!");    
                return false;
            }
        }
    </script> -->
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
                            <a class="dropdown-item" href="qlkh.php">QUẢN LÍ YÊU CẦU KHÁCH HÀNG</a>
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
        <h2 style="text-align: center; color:rgb(51, 204, 255);">THÊM SẢN PHẨM</h2>
        <form method="POST" action="xulyThemSP.php" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">TÊN SẢN PHẨM</span>
                </div>
                <input name="productName" type="text" class="form-control" placeholder="Tên sản phẩm mới"
                    aria-label="Username" aria-describedby="basic-addon1" pattern="[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ|_]+$" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">GIÁ SẢN PHẨM</span>
                </div>
                <input name="productPrice" type="number" class="form-control" placeholder="Giá sản phẩm"
                    aria-label="Username" aria-describedby="basic-addon1" min="10000" max="1000000" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">SỐ LƯỢNG</span>
                </div>
                <input name="productQuantity" type="number" class="form-control" placeholder="Số lượng"
                    aria-label="Username" aria-describedby="basic-addon1" min="1" max="500" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">ẢNH SẢN PHẨM</span>
                </div>
                <div class="custom-file">
                    <input name="productFile" type="file" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01" required>
                    <label class="custom-file-label" for="inputGroupFile01">Chọn ảnh</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">LOẠI SẢN PHẨM</label>
                </div>
                <select name="productType" class="custom-select" id="inputGroupSelect01" required>
                    <option selected>Chọn...</option>
                    <option value="1">Dụng cụ tập luyện</option>
                    <option value="2">Quần áo tập luyện</option>
                    <option value="3">Sản phẩm dinh dưỡng</option>
                </select>
            </div>
            <div class="form-group">
                <textarea placeholder='Mô tả chi tiết sản phẩm mới' name="productDescription"  class="form-control" id="exampleFormControlTextarea1"
               rows="3"></textarea>
            </div>
            <button type="submit"  class="btn btn-primary">THÊM</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous"></script>
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