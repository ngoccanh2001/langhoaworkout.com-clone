<?php 
    session_start();
    require("config.php");
    $tablename="product";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        echo "Lỗi kết nối: " . mysqli_connect_error();
    }

    //THEM GIO HANG
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if (isset($_POST['themgiohang'])){
            $soluong=$_POST['soluong'];
        }
        else{
            $soluong=1;
        }     
        $sql = "SELECT * FROM `".$tablename. "` WHERE `Product-ID` = '".$id."' LIMIT 1";
        $query = mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($query);
        if($result){
            $newproduct = array(array('tensp'=>$result['Name'],'masp'=>$id,'soluong'=>$soluong,'gia'=>$result['Price'],'hinhanh'=>$result['Picture']));
            if (isset($_SESSION['cart'])){  
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    if ($cart_item['masp'] == $id){
                        if($cart_item['soluong']+$soluong < $result['Quantity'])
                            $product[] = array('tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$cart_item['soluong']+$soluong,'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh']);
                        else
                            $product[] = array('tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$result['Quantity'],'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh']); 
                        $found=true;
                    }
                    else{
                        $product[] = array('tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh']);
                    }
                }
                if ($found === false){

                    $_SESSION['cart'] = array_merge($product,$newproduct);
                }
                else{
                    $_SESSION['cart'] = $product;
                }
            }
            else{
                $_SESSION['cart'] = $newproduct;
            }
        }
        mysqli_close($conn); 
        header('location: giohang.php');
        
    }
    

    //Xoasanpham
    if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        foreach ($_SESSION['cart'] as $cart_item) {
            if (($cart_item['masp'] != $id)){
                $product[] = array('tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh']);
            }
        }
        $_SESSION['cart'] = $product;
        header('location: giohang.php');
    }

    //xoatoanbo

    if (isset($_GET['xoatoanbo']) && $_GET['xoatoanbo'] == 1){
        unset($_SESSION['cart']);
        header('location: giohang.php');
    }

    //Cong them san pham

    if(isset($_GET['cong'])){
		$id=$_GET['cong'];

        $sql = "SELECT * FROM `".$tablename. "` WHERE `Product-ID` = '".$id."' LIMIT 1";
        $query = mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($query);

		foreach($_SESSION['cart'] as $cart_item){
			if($id!=$cart_item['masp']){
				$product[]=array('tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh']);
			}else{
				$tang=$cart_item['soluong']+1;
				if($tang <= $result['Quantity']){
                    // echo "SO LUONG MAX";
                    // print("alert('Bạn đã mua số lượng tối đa của sản phẩm này');");
				    $product[]=array('tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$tang,'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh']);		
                }else{ 

                //  header( "refresh:0;url=giohang.php?checkInvalid=1" );
                
                    echo '
                        <script type ="text/javascript"> 
                            alert("Bạn đã mua số lượng tối đa của sản phẩm này");
                        </script>
                    ';
				$product[]=array('tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh']);
			    }
		    }
			
		}
        $_SESSION['cart'] = $product;
        header( "refresh:0;url=giohang.php" );

		//Lệnh dưới bị lỗi không hiển thị được alert
        // header('location:giohang.php');
	}
   
     //Giam bot san pham

     if(isset($_GET['tru'])){
		$id=$_GET['tru'];
		foreach($_SESSION['cart'] as $cart_item){
			if($id!=$cart_item['masp']){
				
				$product[]=array('tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh']);
			}else{
				$giam=$cart_item['soluong']-1;
				if($cart_item['soluong']>1){
				$product[]=array('tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$giam,'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh']);		
			    }else{
				$giam=1;
				$product[]=array('tensp'=>$cart_item['tensp'],'masp'=>$cart_item['masp'],'soluong'=>$giam,'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh']);
			    }
		    }
			
		}
        $_SESSION['cart'] = $product;
		header('location:giohang.php');
	}
    
?>