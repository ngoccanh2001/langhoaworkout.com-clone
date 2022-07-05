<?php
    session_start();
    require("config.php");
    $tablename = "product";

    $sql = "SELECT* from `".$tablename."`";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $result=$conn->query($sql);
    
    if ($result->num_rows > 0) {
    echo "<div class='row'>";
    $i = 0;
    $arrayProduct = array(array());
    while($row = $result->fetch_assoc()) {
        $array = array($row['Name'],$row['Quantity']);
        $arrayProduct[$i++] = $array;
        echo "<div class='col'>";
        echo "<div class='card' style='width: 18rem;'>
        <img src='".$row["Picture"]."'' class='card-img-top' alt='...''>
        <div class='card-body'>
          <h5 class='card-title'>".$row["Name"]."</h5>
          <p class='card-text'>ID: ".$row["Product-ID"]."</p>
          <p class='card-text'>".number_format($row['Price'],0,',','.')." VNĐ</p>";

          if($row['Quantity'] == 0) echo "<div class ='hethang' style='color:red; margin-bottom: 15.5px;'><b>HẾT HÀNG</b></div>";
          else{
            echo "
            <p class='card-text'>Tồn kho: ".$row["Quantity"]."</p>";
          }
          echo"
            <a style='margin-right:5px;' href='"."suaSP.php?id=".$row["Product-ID"]."' class='btn btn-primary'>SỬA</a>"; 
            if($row['LockProduct']==0){
            echo "<a href='"."khoaSP.php?id=".$row["Product-ID"]."' class='btn btn-danger'>KHÓA</a>";
            }
            else if($row['LockProduct']==1){
            echo "<a href='"."moKhoaSP.php?id=".$row["Product-ID"]."' class='btn btn-warning'>MỞ KHÓA</a>";
            }
          
          
        echo "</div>
      </div>";
      echo "</div>";
    }
    echo "</div>";
    }
    else {
      echo "<p style='text-align:center;'>Tạm thời đã hết sản phẩm trong kho!</p>";
    }
    $_SESSION['ProductArray'] = $arrayProduct;
    // if ($conn->query($sql) == TRUE) {
    //   echo "New record created successfully";
    // } else {
    //   echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    $conn->close();
?>
