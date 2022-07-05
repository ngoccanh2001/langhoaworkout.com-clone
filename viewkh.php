<?php
   require("config.php");
    $tablename = "customer";

    $sql = "SELECT* from `".$tablename."`";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
      $i=0;
      echo "<table class='table'>
      <thead>
      <tr>
          <th scope='col'>STT</th>
          <th scope='col'>Mã khách hàng</th>
          <th scope='col'>Họ và tên lót</th>
          <th scope='col'>Tên</th>
          <th scope='col'>Tên tài khoản</th>
          <th scope='col'>Số điện thoại</th>
          <th scope='col'>Địa chỉ</th>
      </tr>
      </thead>
      <tbody>";
    while($row = $result->fetch_assoc()) {
      $i++;
        echo "<tr>
        <th scope='row'>".$i."</th>
        <td>".$row['CustomerID']."</td>
        <td>".$row['LastName']."</td>
        <td>".$row['FirstName']."</td>
        <td>".$row['Username']."</td>
        <td>".$row['PhoneNumber']."</td>  
        <td>".$row['Address']."</td>        
      </tr>";
    }
    echo "</tbody>
    </table>";
    } else {
      echo "<p style='text-align:center;'>Rất tiết, hiện tại chưa có có khách hàng nào đăng ký!</p>";
    }

    // if ($conn->query($sql) == TRUE) {
    // echo "New record created successfully";
    // } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    $conn->close();
?>
