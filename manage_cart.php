<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Add_To_Cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myitems=array_column($_SESSION['cart'],'productname');
            if(in_array($_POST['productname'],$myitems))
            {
                echo"<script>
                alert('เพิ่มสินค้าลงตะกร้า');
                window.location.href='index.php?Menu=3&Submenu=buyorder';
                </script>";
            }
            else
            {
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('productname'=>$_POST['productname'],'productprice'=>$_POST['productprice'],'Quantity'=>1);
            echo"<script>
            alert('เพิ่มสินค้าลงตะกร้า');
            window.location.href='index.php?Menu=3&Submenu=buyorder';
            </script>";
        }
        }
        else
        {
            $_SESSION['cart'][0]=array('productname'=>$_POST['productname'],'productprice'=>$_POST['productprice'],'Quantity'=>1);
            echo"<script>
            alert('เพิ่มสินค้าลงตะกร้า');
            window.location.href='index.php?Menu=3&Submenu=buyorder';
            </script>";
        }
    }
    if(isset($_POST['Remove_Item']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['productname']==$_POST['productname'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo"<script>
                    alert('ลบสินค้าในตระกร้า');
                    window.location.href='index.php?Menu=3&Submenu=buyorder';
                </script>";
            }
        }
    }

    if (isset($_POST['Mod_Quantity'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['productname'] == $_POST['productname']) {
                $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
                // print_r($_SESSION['cart']);
                echo "<script>
                    window.location.href='index.php?Menu=3&Submenu=buyorder';
                </script>";
            }
        }
    }
}
