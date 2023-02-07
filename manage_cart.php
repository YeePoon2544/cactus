<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Add_To_Cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myitems=array_column($_SESSION['cart'],'Cactusname');
            if(in_array($_POST['Cactusname'],$myitems))
            {
                echo"<script>
                alert('เพิ่มสินค้าส่ตระกร้า');
                window.location.href='mycart.php';
                </script>";
            }
            else
            {
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('Cactusname'=>$_POST['Cactusname'],'Cactusprice'=>$_POST['Cactusprice'],'Quantity'=>1);
            echo"<script>
            alert('เพิ่มสินค้าส่ตระกร้า');
            window.location.href='mycart.php';
            </script>";
        }
        }
        else
        {
            $_SESSION['cart'][0]=array('Cactusname'=>$_POST['Cactusname'],'Cactusprice'=>$_POST['Cactusprice'],'Quantity'=>1);
            echo"<script>
            alert('เพิ่มสินค้าส่ตระกร้า');
            window.location.href='mycart.php';
            </script>";
        }
    }
    if(isset($_POST['Remove_Item']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['title']==$_POST['title'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo"<script>
                    alert('ลบสินค้าในตระกร้า');
                    window.location.href='mycart.php';
                </script>";
            }
        }
    }

    if (isset($_POST['Mod_Quantity'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['title'] == $_POST['title']) {
                $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
                // print_r($_SESSION['cart']);
                echo "<script>
                    window.location.href='mycart.php';
                </script>";
            }
        }
    }
}
