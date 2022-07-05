<?php 
    session_start();
    if(isset($_SESSION["currentID"])){?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="icon" href="img/header-icon.png" type="image/png" /> 
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <title>Hỗ trợ</title>
            <style>
                input, .form-select{
                    margin-bottom: 25px;
                }
                
                .customer-form{
                    width: 500px;
                }
                body{
                    margin: 10px 0 0 200px;
                    padding: 10px;
                }
                .name-label-title{
                    position: absolute;
                    top: 0px;
                    left: 0px;
                }
                #billCode{
                    width: 185px;
                }
            </style>
            <script type="text/javascript">
                function validateTextArea(){
                    var data = document.getElementById("contentSupport").value;
                    const reguarExp = new RegExp('[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ0-9|_]+$');
                    if (document.getElementById('billCode').value === "Chọn mã đơn hàng"){
                        alert("Vui lòng chọn mã đơn hàng");    
                        return false;
                    }
                    // if (reguarExp.test(data) === false){
                    //     alert("Nội dung của bạn không hợp lệ, vui lòng nhập lại!");    
                    //     return false;
                    // }
                }
            </script>
        </head>
        <body>
            <h2 class = "text-title" style="color:#0099ff;">Đội ngũ chăm sóc khách hàng của Làng Hoa Workout</h2>
            <?php echo "<h6>Chào ".$_SESSION['name']."! Chúng tôi luôn sẵn sàng lắng nghe ý kiến của bạn.</h6>"?>
            <p>Bạn vui lòng đặt câu hỏi bên dưới. Chúng tôi sẽ phản hồi trong vòng 24h tiếp theo.</p>
            <form class = "customer-form" action="xulyhotro.php" method ="POST">
                <?php 
                    require_once("config.php");
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM bill WHERE CustomerID = ".$_SESSION['currentID']."";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                                $i = 1;
                                echo "<select id= 'billCode' name='customer-bill-code' class='form-select'  required>
                                    <option selected>Chọn mã đơn hàng</option>";
                        while($row = $result->fetch_assoc()) {
                                echo "<option value=".$row['BillID'].">".$row['BillID']."</option>";
                                ++$i;
                        }   
                                echo "</selected>";
                    }
                ?>
                <label class = "name-label">Tiêu đề<span style="color:red;">*</span></label> 
                <input placeholder="Nhập tiêu đề" type="text" name="customer-title" class="form-control" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s|_]+$" required> 
                <textarea placeholder="Mô tả chi tiết vấn đề của bạn" rows="5" id="contentSupport" name="customer-content" class="form-control" style="width:100%; box-sizing: border-box;" required></textarea> 
                <input  class="btn btn-primary" style="margin-top: 25px; width: 150px;" type="submit" value="Gửi">
            </form>
        </body>
        </html>
    <?php
    }
    else{
        echo "<script>alert('Khách hàng vui lòng đăng nhập để gửi yêu cầu hỗ trợ')</script>";
        header( "refresh:0;url=dangnhap.php" );
    }
    ?>

