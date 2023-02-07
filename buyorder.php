<?php

session_start();

// if (!empty($_GET["action"])) {
//   switch ($_GET["action"]) {
//     case "add";
//       if (!empty($_POST["quantity"])) {
//         $productByCode = $db_handle->runQuery("SELECT * FROM cactus WHERE code='" . $_GET["code"] . "'");
//         $itenArray = array($product_array[0]["code"] => (array(
//           'name' => $product_array[0]["name"],
//           'code' => $product_array[0]["code"],
//           'quantity' =>$_POST["quantity"],
//           'price' => $product_array[0]["price"],
//           'image' => $product_array[0]["image"]
//         )));
//       }
//       if (!empty($_SESSION["cart_item"])) {
//         if (in_array($product_array[0]["code"], array_keys($_SESSION["cart_item"]))) {
//           foreach ($_SESSION["cart_item"] as $k => $v) {
//             if ($productByCode[0]["code"] === $k) {
//               if (empty($_SESSION["cart_item"][$k]["quantity"])) {
//                 $_SESSION["cart_item"][$k]["quantity"] = 0;
//               }
//               $_SESSION["cart"][$k]["quantity"] += $_POST["quantity"];
//             }
//           }
//         } else {
//           $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itenArray);
//         }
//       } else {
//         $_SESSION["cart_itme"] = $itenArray;
//       }
//       break;
//     case "remove";
//       if (!empty($_SESSION["cart_item"])) {
//         foreach ($_SESSION["cart_item"] as $k => $v) {
//           if ($_GET["code"] == $k)
//             unset($_SESSION["cart_item"][$k]);

//           if (!empty($_SESSION["cart_item"]))
//             unset($_SESSION["cart_item"]);
//         }
//       }
//       break;
//   }
// }




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
    
</style>

<body>
<div id="product-grid">

    <div class="tex-heading">: รายการสั่งซื้อสินค้า :</div>
  </div>
<?php 

    if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
        $total_price = 0;

    

?>
    <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
            <tr class="tr">
                <th>#</th>
                <th>Picture</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Price</th>
                <th>Remove</th>
            </tr>

            <?php 

                foreach($_SESSION["cart_item"] as $item) {
                    $item_price = $item["quantity"] * $item["price"];
                

            ?>
            <tr bgcolor="#FFFFFF">
                <td><?php echo $item["ID"]; ?></td>
                <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image"></td>
                <td><?php echo $item["name"]; ?></td>
                <td><?php echo $item["code"]; ?></td>
                <td><?php echo $item["quantity"]; ?> THB</td>
                <td><?php echo number_format($item["price"], 2); ?> THB </td>
                <td><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><i class='fa fa-trash' style='font-size:20px'></i></a></td>
            </tr>

            <?php 

                $total_quantity += $item["quantity"];
                $total_price += ($item["price"] * $item["quantity"]);
                
                }

            ?>

            <tr bgcolor="#FFFFFF">
                <td colspan="3" style="text-align: right;">Total :</td>
                <td><?php echo $total_quantity; ?></td>
                <td style="text-align: right;" colspan="2"><?php echo number_format($total_price, 2); ?> THB</td>
                <td></td>
               
            </tr>
        </tbody>
    </table>
    <?php 
    
                } else {
    
    ?>
    <div class="no-records">Your Cart Is Empty</div>
<?php 
                }

?>
    <div>
        <button><a href="index.php?Menu=3&Submenu=pay"><i class='fas fa-check-circle' style='font-size:20px'> ชำระเงิน </i></button>
    </div>


    
</body>

</html>