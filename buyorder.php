<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <title>
        ยอดขายประจำเดือน &mdash;
    </title>
</head>
<style>
    body,
    h5 {
        font-family: 'Prompt', sans-serif;

    }

    .tex-heading {
    color: #000;
    border-bottom: 3px solid #483D8B;
    overflow: auto;
    margin-top: 12%;
    font-size: 25px;


  }

    button {
        font-size: 18px;
        width: 80%;
        padding: 5px;
        color: rgb(255, 255, 255);
        background-color: #20B2AA;
        border: darkgreen;
        margin-top: 28%;

    }

    .cart-item-image {
        height: 80px;
        width: 80px;
    }

    .tbl-cart {
        margin-top: 12%;
        width: 100%;
    }

    
    table, th, td {
    border: 1px solid black;
    text-align: center;
    color: #000;
}
.tr{
    background-color: rosybrown;
    text-align: center;
    color: #000;
}
button{
    margin-left: 10%;
}

.no-records{
    color: Red;
    text-align: center;
    clear: both;
    margin: 40px 0;
    margin-left: 25%;
    background-color: bisque;
    width: 50%;
    font-size: 18px;
}
.col-lg-9{
    margin-top: 3%;
}
    
</style>

<body>
<div id="product-grid">

    <div class="tex-heading">: รายการสั่งซื้อสินค้า :</div>
  </div>
 <!-- <form action="" method="POST" class="order"> -->
 <div class="col-lg-9">
    <table class="table">
        <thead class="text-center">
            <tr>
                <th scope="col">หมายเลข</th>
                <th scope="col">ชื่อสินค้า</th>
                <th scope="col">ราคาสินค้า</th>
                <th scope="col">จำนวน</th>
                <th scope="col">ราคารวม</th>
                <th scope="col">ลบสินค้า</th>
                <!-- <th scope="col"></th> -->
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            // $total = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    $sr = $key + 1;
                    // $total = $total + $value['price'];
                    // print_r($value);
                    echo "
                                <tr>
                                    <td>$sr</td>
                                    <td>$value[Cactusname]<input type='hidden' name='Cactusname'></td>
                                    <td>$value[Cactusprice] บาท<input type='hidden' name='Cactusprice' class='iprice' value='$value[Cactusprice]'></td>
                                    <td>
                                        <form action='manage_cart.php' method='POST'>
                                            <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
                                            <input type='hidden' name='Cactusname' value='$value[Cactusname]'>
                                         </form>
                                    </td>
                                    <td class='itotal'></td>
                                    <td>
                                    <form action='manage_cart.php' method='POST'>
                                        <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>ลบสินค้า</button>
                                        <input type='hidden' name='Cactusname' value='$value[Cactusname]'>
                                    </form>
                                    </td>
                                </tr>

                                ";
                }
            }
            ?>
        
        </tbody>
    </table>
</div>

<div class="col-lg-5">
    <div class="border bg-light rounded p-4">

        <form action="purchase.php" method="POST">
            <h4> : รวมทั้งหมด :</h4>

            <b>ราคา</b>
            <p class="form-control" id="gtotal" name="gtotal"></p>
            <input  type="hidden" name="total" id="total">


           
            <?php

$sql = "SELECT * FROM  user ORDER BY user_ID ASC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {




?>
            <?php

            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

            ?>

                <!-- <input type="hidden" name="order_date"> -->

                <div class="form-group">
                    <b>ชื่อ-นามสกุล</b>
                    <text class="form-control"><?php echo $row['name']; ?> <?php echo $row['lastname']; ?></text>
                </div>
                <div class="form-group">
                    <b>เบอร์โทร</b>
                    <text class="form-control"><?php echo $row['telephone']; ?></text>
                </div>
                <div class="form-group">
                    <b>ที่อยู่</b>
                    <text class="form-control"><?php echo $row['address']; ?> </text>
                </div>
               
                <br>
                <button class="btn btn-primary btn-block" name="purchase">ยืนยันการสั่งซื้อ</button>
        </form>
    <?php
            }
    ?>
    </div>
</div>


<?php
  }
  ?>



<script>
    var gt = 0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');
    var total = document.getElementById('total');
    // var exampleCheck1 = document.getElementById('exampleCheck1');
    // var exampleCheck2 = document.getElementById('exampleCheck2');
    // var exampleCheck3 = document.getElementById('exampleCheck3');

    function subTotal() {
        gt = 0;
        for (i = 0; i < iprice.length; i++) {
            // exampleCheck1 = 10;
            itotal[i].innerText = (iprice[i].value) * (iquantity[i].value)
            gt = gt + (iprice[i].value) * (iquantity[i].value);

            // + (exampleCheck1);ems1
            // price 650  iquantity  1 gt=0+(650*1)
            // price 750  iquantity  2 gt=650+(750*2)    === gt=2150
            // price 850  iquantity  1 gt=2150+(850*1)   ==== gt=3000
        }
        gtotal.innerText = gt;
        total.value = gt; //เก็บค่า รวมทั้งหมด 

    }

    subTotal();
</script>


<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/aos.js"></script>
<script src="js/navbar.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>
</body>

</html>

    
</body>

</html>