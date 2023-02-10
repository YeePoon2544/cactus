<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "cactus");

if (mysqli_connect_error()) {
    echo "<script>
        alert('ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้');
        window,location.href='mycart.php';  
    </script>";
    exit();
}

//การส่งข้อมูลเข้า database กดปุ่ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['purchase'])) {
        // $order_date = date("Y-m-d h:i:sa");
        // $query1 = "INSERT INTO `tbl_orders`(`customer_name`, `customer_contact` , `customer_address`,`status`,`total`,`order_date`) 
        // VALUES ('$_POST[full_name]','$_POST[phone_no]','$_POST[address]','$_POST[pay_mode]','$_POST[gtotal]','$_POST[order_date]')";


                $order_date = date("Y-m-d h:i:sa"); //Order DAte 
                $status = "สั่งสินค้า"; // Ordered, On Delivery, Delivered, Cancelled
                $total =$_POST['total'];
                

                
                $query1 = "INSERT INTO tbl_orders SET 
                    order_date = '$order_date',
                    status = '$status',
                    total = '$total',
                    name = '$name',
                    telephone = '$telephone',
                    address = '$address'
                    ";
                // mysqli_query($conn, "SET NAMES 'utf8' ");

        if (mysqli_query($conn, $query1)) {
            // echo "done";
            $Order_Id = mysqli_insert_id($conn);
            $query2 = "INSERT INTO `user_order`(`Order_Id`, `Cactusname`, `Cactusprice`, `Quantity`) VALUES (?,?,?,?)";
            // mysqli_query($conn, "SET NAMES 'utf8' ");  //เเปลงเป็นภาษาไทย
            $stmt = mysqli_prepare($conn, $query2);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt,"isii",$Order_Id,$Cactusname,$Cactusprice,$Quantity);
                foreach($_SESSION['cart'] as $key => $values)
                {
                    $Cactusname=$values['Cactusname'];
                    $Cactusprice=$values['Cactusprice'];
                    $Quantity=$values['Quantity'];
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo "<script>
                alert('Order สำเร็จ');
                window,location.href='mycart.php';  
            </script>";
            } else {
                echo "<script>
            alert('ข้อผิดพลาดในการจัดเตรียมแบบสอบถาม SQL');
            window,location.href='mycart.php';  
        </script>";
            }
        } else {
            echo "<script>
            alert('ข้อผิดพลาดของ SQL');
            window,location.href='mycart.php';  
        </script>";
        }
    }
}


 