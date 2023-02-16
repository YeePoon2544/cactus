<?php

session_start();
include('connect/connect.php');
//การส่งข้อมูลเข้า database กดปุ่ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['purchase'])) {

                $order_date = date("Y-m-d h:i:sa"); //Order DAte 
                $status = "สั่งสินค้า"; // Ordered, On Delivery, Delivered, Cancelled
                $total =$_POST['total'];
                $name =$_POST['name'];
                $telephone =$_POST['telephone'];
                $address =$_POST['address'];
                $image = $_POST['image'];

                $query1 = "INSERT INTO tbl_orders SET 
                    User_ID = {$_SESSION['User_ID']},
                    order_date = '$order_date',
                    status = '$status',
                    total = '$total',
                    name = '$name',
                    telephone = '$telephone',
                    address = '$address',
                    image = 'image'
                    ";
             
            // echo $query1;
        if (mysqli_query($conn, $query1)) {
        
            $Order_ID = mysqli_insert_id($conn);
            // $query2 = "INSERT INTO user_orders (User_ID , Order_ID , productname , productprice , Quantity) VALUES (?,?,?,?,?)";
            // $stmt = mysqli_prepare($conn, $query2);
            if (TRUE) {
                // mysqli_stmt_bind_param($stmt,"isii",$_SESSION['User_ID'],$Order_Id,$productname,$productprice,$Quantity);
                foreach($_SESSION['cart'] as $key => $values)
                {
                    
                    $productname=$values['productname'];
                    $productprice=$values['productprice'];
                    $Quantity=$values['Quantity'];

                    $query2 = "INSERT INTO user_orders SET 
                    User_ID = {$_SESSION['User_ID']},
                    Order_ID = '$Order_ID',
                    productname = '$productname',
                    productprice = '$productprice',
                    Quantity = '$Quantity'
                    ";

                    mysqli_query($conn, $query2);
                    // mysqli_stmt_bind_param($stmt,"isii",$_SESSION['User_ID'],$Order_Id,$productname,$productprice,$Quantity);
                    // echo $stmt;
                    // mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo "<script>
                alert('Order สำเร็จ');
                window,location.href='index.php?Menu=3&Submenu=buyorder';  
            </script>";
            } else {
                echo "<script>
            alert('ข้อผิดพลาดในการจัดเตรียมแบบสอบถาม SQL');
            window,location.href='index.php?Menu=3&Submenu=buyorder';  
        </script>";
            }
        } else {
            echo "<script>
            alert('ข้อผิดพลาดของ SQL');
            window,location.href='index.php?Menu=3&Submenu=buyorder';  
        </script>";
        }
    }
}


 