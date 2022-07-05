<?php
session_start();
require("config.php");
$tablename = "customer";
$usernameU = $_POST["username-i"];
$passwordU = $_POST["password-i"];
$first = $_POST["firstname"];
$last = $_POST["lastname"];
$phone = $_POST["phone"];
$address = $_POST["address"];

$sql = "SELECT* FROM `" . $tablename . "` WHERE `Username` ='$usernameU'";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql2 = "INSERT INTO `" . $tablename . "` (`Username`, `Password`, `LastName`, `FirstName`,`Address`,`PhoneNumber`)
    VALUES ('" . $usernameU . "', '" . md5($passwordU) . "', '" . $last . "', '" . $first . "', '" . $address . "', '" . $phone . "')";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (strcmp($usernameU, $row["Username"]) == 0) {
            echo "<h3>Username đã đăng ký, vui lòng chọn username khác</h3>";
            header( "refresh:0;url=dangky.php" );
        } else {
            if ($conn->query($sql2) == TRUE) {
                header( "refresh:0;url=dangnhap.php" );
                
            } else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;
            }
        }
    }
} else {
    if ($conn->query($sql2) == TRUE) {
        header( "refresh:0;url=dangnhap.php" );
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
}

$conn->close();
