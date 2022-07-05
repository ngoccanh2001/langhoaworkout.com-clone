<?php
    session_start();
    require("config.php");
    $tablename = "customer";

    if (trim($_POST['username-i']) == "" || trim($_POST['password-i']) == ""){
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin');</script>";
        header( "refresh:0;url=dangnhap.php" );
    }
    else{

        $passwordU = $_POST['password-i'];

        $usernameU = $_POST['username-i'];

        
        // $usernameU = preg_replace("/<^A-Za-z0-9>/", "", $_POST['username-i']);
        // $passwordU = preg_replace("/<^A-Za-z0-9>/", "", $_POST['password-i']);

        $conn = new mysqli($servername, $username, $password, $dbname);

        // $usernameU = mysqli_real_escape_string($conn, $_POST['username-i']); 
        // $passwordU = mysqli_real_escape_string($conn, $_POST['password-i']); 

        


        $passwordU = md5($passwordU);
        

        // if($usernameU == 'admin' && $passwordU == 'e0df9fbbee30f8c9d4e7b4ea154a2483'){
        //     //    header( "refresh:0;url=admin-index.html" );
        //     $_SESSION['loginedadmin'] = 'true';
        //    header('location:admin-index.php');
        // }
        
        $sql = "SELECT * FROM `".$tablename."` WHERE Username ='$usernameU' AND Password= '$passwordU' LIMIT 1";

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo $usernameU;
        }

        $result=$conn->query($sql);

      
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row['LockCustomer'] == 1){
                    echo"<script>alert('Tài khoản đã bị khóa');</script>";
                    header( "refresh:0;url=dangnhap.php" );
                    
                }
                
                else if($row['Username'] == 'admin'){
                    $_SESSION['loginedadmin'] = 'true';
                    header('location:admin-index.php');
                }

                else{
                    $_SESSION["name"]=$row['FirstName'];
                    $_SESSION["currentID"]=$row["CustomerID"];
                    header("Location: index.php");
                }
            }
        }
         
        else{
           echo "<script>alert('Tài khoản hoặc mật khẩu của bạn bị sai');</script>";
           header( "refresh:0;url=dangnhap.php" );
        }

        if ($conn->query($sql) == FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
   
    
    
?>
