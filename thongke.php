<!---SELECT product.TypeID,SUM(billdetail.Quantity) FROM product,billdetail WHERE`product`.`Product-ID`=billdetail.ProductID GROUP BY product.TypeID!--->
<?php
    session_start();
    if(isset($_SESSION['loginedadmin'])){
?>
<?php 
    $i=0;
    $con = mysqli_connect("localhost","root","");
    mysqli_set_charset($con, 'UTF8');
    if (!$con)
      {
        die("Unable to connect to MySQL: " . mysqli_error());
      }
    if(!mysqli_select_db($con,"qlbh"))
    {
      die("Unable to connect to DTBS: " . mysqli_error());
    }
    $sql_stmt="SELECT product.TypeID,SUM(billdetail.Quantity) AS id FROM product,billdetail WHERE`product`.`Product-ID`=billdetail.ProductID GROUP BY product.TypeID";
    $result = mysqli_query($con,$sql_stmt);
    if (!$result)     
        die("Database access failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi thất bại
        
        $rows = mysqli_num_rows($result); 
        // Lấy số hàng trả về
        if ($rows) {
        while ($row = mysqli_fetch_array($result)) {         
            $a[$i]=$row['id'];
            $i++;
        } 
    }
    $sql1="SELECT SUM(bill.TotalPrice) AS tt FROM `bill` WHERE bill.Date BETWEEN '2021-01-01' AND '2021-01-31'";
    $result1 = mysqli_query($con,$sql1);
    if (!$result1)     
        die("Database access failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi thất bại
        
        $rows1 = mysqli_num_rows($result1); 
        // Lấy số hàng trả về
        if ($rows1) {
        while ($row = mysqli_fetch_array($result1)) {         
            $a1=$row['tt'];
        } 
        if($a1==null) $a1=0;
    }
    $sql2="SELECT SUM(bill.TotalPrice) AS tt FROM `bill` WHERE bill.Date BETWEEN '2021-02-01' AND '2021-02-28'";
    $result2 = mysqli_query($con,$sql2);
    if (!$result2)     
        die("Database access failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi thất bại
        
        $rows2 = mysqli_num_rows($result2); 
        // Lấy số hàng trả về
        if ($rows2) {
        while ($row = mysqli_fetch_array($result2)) {         
            $a2=$row['tt'];  
        } 
        if($a2==null) $a2=0;
    }
    $sql3="SELECT SUM(bill.TotalPrice) AS tt FROM `bill` WHERE bill.Date BETWEEN '2021-03-01' AND '2021-03-31'";
    $result3 = mysqli_query($con,$sql3);
    if (!$result3)     
        die("Database access failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi thất bại
        
        $rows3 = mysqli_num_rows($result3); 
        // Lấy số hàng trả về
        if ($rows3) {
        while ($row = mysqli_fetch_array($result3)) {         
            $a3=$row['tt'];  
        } 
        if($a3==null) $a3=0;
    }
    $sql4="SELECT SUM(bill.TotalPrice) AS tt FROM `bill` WHERE bill.Date BETWEEN '2021-04-01' AND '2021-04-31'";
    $result4 = mysqli_query($con,$sql4);
    if (!$result4)     
        die("Database access failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi thất bại
        
        $rows4 = mysqli_num_rows($result4); 
        // Lấy số hàng trả về
        if ($rows4) {
        while ($row = mysqli_fetch_array($result4)) {         
            $a4=$row['tt'];  
        } 
        if($a4==null) $a4=0;
    }
    $sql5="SELECT SUM(bill.TotalPrice) AS tt FROM `bill` WHERE bill.Date BETWEEN '2021-05-01' AND '2021-05-31'";
    $result5 = mysqli_query($con,$sql5);
    if (!$result5)     
        die("Database access failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi thất bại
        
        $rows5 = mysqli_num_rows($result5); 
        // Lấy số hàng trả về
        if ($rows5) {
        while ($row = mysqli_fetch_array($result5)) {         
            $a5=$row['tt'];  
        } 
        if($a5==null) $a5=0;
    }
    $sql6="SELECT SUM(bill.TotalPrice) AS tt FROM `bill` WHERE bill.Date BETWEEN '2021-06-01' AND '2021-06-31'";
    $result6 = mysqli_query($con,$sql6);
    if (!$result6)     
        die("Database access failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi thất bại
        
        $rows6 = mysqli_num_rows($result6); 
        // Lấy số hàng trả về
        if ($rows6) {
        while ($row = mysqli_fetch_array($result6)) {         
            $a6=$row['tt'];  
        } 
        if($a6==null) $a6=0;
    }
    $sql7="SELECT SUM(bill.TotalPrice) AS tt FROM `bill` WHERE bill.Date BETWEEN '2021-07-01' AND '2021-07-31'";
    $result7 = mysqli_query($con,$sql7);
    if (!$result7)     
        die("Database access failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi thất bại
        
        $rows7 = mysqli_num_rows($result7); 
        // Lấy số hàng trả về
        if ($rows7) {
        while ($row = mysqli_fetch_array($result7)) {         
            $a7=$row['tt'];  
        } 
        if($a7==null) $a7=0;
    }
    $sql8="SELECT SUM(bill.TotalPrice) AS tt FROM `bill` WHERE bill.Date BETWEEN '2021-08-01' AND '2021-08-31'";
    $result8 = mysqli_query($con,$sql8);
    if (!$result8)     
        die("Database access failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi thất bại
        
        $rows8 = mysqli_num_rows($result8); 
        // Lấy số hàng trả về
        if ($rows8) {
        while ($row = mysqli_fetch_array($result8)) {         
            $a8=$row['tt'];  
        } 
        if($a8==null) $a8=0;
    }
    $sql9="SELECT SUM(bill.TotalPrice) AS tt FROM `bill` WHERE bill.Date BETWEEN '2021-09-01' AND '2021-07-31'";
    $result9 = mysqli_query($con,$sql9);
    if (!$result9)     
        die("Database access failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi thất bại
        
        $rows9 = mysqli_num_rows($result9); 
        // Lấy số hàng trả về
        if ($rows9) {
        while ($row = mysqli_fetch_array($result9)) {         
            $a9=$row['tt'];  
        } 
        if($a9==null) $a9=0;
    }
    $sql10="SELECT SUM(bill.TotalPrice) AS tt FROM `bill` WHERE bill.Date BETWEEN '2021-10-01' AND '2021-10-31'";
    $result10 = mysqli_query($con,$sql10);
    if (!$result10)     
        die("Database access failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi thất bại
        
        $rows10 = mysqli_num_rows($result10); 
        // Lấy số hàng trả về
        if ($rows10) {
        while ($row = mysqli_fetch_array($result10)) {         
            $a10=$row['tt'];  
        } 
        if($a10==null) $a10=0;
    }
    $sql11="SELECT SUM(bill.TotalPrice) AS tt FROM `bill` WHERE bill.Date BETWEEN '2021-11-01' AND '2021-11-31'";
    $result11 = mysqli_query($con,$sql11);
    if (!$result11)     
        die("Database access failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi thất bại
        
        $rows11= mysqli_num_rows($result11); 
        // Lấy số hàng trả về
        if ($rows11) {
        while ($row = mysqli_fetch_array($result11)) {         
            $a11=$row['tt'];  
        } 
        if($a11==null) $a11=0;
    }
    $sql12="SELECT SUM(bill.TotalPrice) AS tt FROM `bill` WHERE bill.Date BETWEEN '2021-12-01' AND '2021-12-31'";
    $result12 = mysqli_query($con,$sql12);
    if (!$result12)     
        die("Database access failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi thất bại
        
        $rows12= mysqli_num_rows($result12); 
        // Lấy số hàng trả về
        if ($rows12) {
        while ($row = mysqli_fetch_array($result12)) {         
            $a12=$row['tt'];  
        } 
        if($a12==null) $a12=0;
    }
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
            height: 200px;
        }
        .card{
            margin-top: 20px;
        }
    </style>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Dụng cụ tập luyện',<?php echo $a[0] ?>],
          ['Quần áo tập luyện',<?php echo $a[1] ?>],
          ['Sản phẩm dinh dưỡng',<?php echo $a[2] ?>]
        ]);

        var options = {
          title: 'Xu hướng mua hàng'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tháng', 'Doanh số(VNĐ)'],
          ['1',  <?php echo $a1 ?>],
          ['2', <?php echo $a2?>],
          ['3',  <?php echo $a3?>],
          ['4',  <?php echo $a4?>],
          ['5',  <?php echo $a5?>],
          ['6',  <?php echo $a6?>],
          ['7',  <?php echo $a7?>],
          ['8',  <?php echo $a8?>],
          ['9',  <?php echo $a9?>],
          ['10',  <?php echo $a10?>],
          ['11',  <?php echo $a11?>],
          ['12',  <?php echo $a12?>]
        ]);

        var options = {
          title: 'Doanh số mỗi tháng năm 2021',
          hAxis: {title: 'Tháng',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
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
                        </div>
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
        <h2 style="text-align: center; margin-top: 30px;color:rgb(51, 204, 255);">THỐNG KÊ</h2>
        <div id="piechart" style=" width: 900px; height: 500px; margin-left: 30px;"></div>
         <div id="chart_div" style="width: 100%; height: 500px;"></div>
    </div>


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
    <script src="viewsp.js"></script>
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