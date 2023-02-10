<?php

session_start();

if (!empty($_GET["action"])) {
  switch ($_GET["action"]) {
    case "add";
      if (!empty($_POST["quantity"])) {
        $productByCode = $db_handle->runQuery("SELECT * FROM cactus WHERE code='" . $_GET["code"] . "'");
        $itemArray = array($product_array[0]["code"] => (array(
          'name' => $product_array[0]["name"],
          'code' => $product_array[0]["code"],
          'quantity' => $product_array[0]["quantity"],
          'price' => $product_array[0]["price"],
          'image' => $product_array[0]["image"]
        )));
      }
      if (!empty($_SESSION["cart_item"])) {
        if (in_array($product_array[0]["code"], array_keys($_SESSION["cart_item"]))) {
          foreach ($_SESSION["cart_item"] as $k => $v) {
            if ($productByCode[0]["code"] === $k) {
              if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                $_SESSION["cart_item"][$k]["quantity"] = 0;
              }
              $_SESSION["cart"][$k]["quantity"] += $_POST["quantity"];
            }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
        }
      } else {
        $_SESSION["cart_itme"] = $itemArray;
      }
      break;
    case "remove";
      if (!empty($_SESSION["cart_item"])) {
        foreach ($_SESSION["cart_item"] as $k => $v) {
          if ($_GET["code"] == $k)
            unset($_SESSION["cart_item"][$k]);

          if (!empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
        }
      }
      break;
  }
}




?>


<!DOCTYPE html>
<html>

<head>

  <title>
    Cactus &mdash; ต้นแคคตัส
  </title>
</head>
<style>
  body {
    font-family: 'Prompt', sans-serif;

  }



  .tex-heading {
    color: #000;
    border-bottom: 3px solid lightcoral;
    overflow: auto;
    margin-top: 12%;
    font-size: 25px;


  }

  .img {
    border-radius: 15px 20px 10px;
    padding: 5px;
    background-color: #CD5C5C;
    width: 40%;
    margin-left: 30%;
    margin-top: 6%
  }

  .product-title,
  .product-details,
  .product-price {
    color: #000;
  }

  .product-title {
    font-size: 20px;
    border: 5px dashed #f08080;
    background-color: #ffffe0;
    margin-top: 3%;
    text-align: center;
    width: 100%;
  }

  .product-details {
    background-color: #ffffe0;
    width: 100%;
    margin-top: 3%;
  }

  .product-price {
    font-size: 18px;
    margin-top: 2%;
    background-color: #ffffe0;
    width: 20%;
    margin-left: 2%;
    text-align: center;
  }

  .cart-action {
    margin-top: 1%;
  }


  .product-item {
    float: left;
    background: #e0e0e0;
    margin: 15px 15px 0px 0px;
    border: #e0e0e0 2px solid;
    width: 30%;

  }

  .btnAddAction {
    float: right;
    font-size: 20px;
    color: #FFFFFF;
    padding: 5px 10px;
    background-color: #2E8B57;
    cursor: pointer;
    text-decoration: none;
    border: #2E8B57 1px solid;
    border-radius: 20px;
  }

  .product-quantity {
    padding: 5px 10px;
    border-radius: 3px;
    border: #e0e0e0 1px solid;
    font-size: 18px;
    text-align: center;
    margin-left: 51%;
  }
</style>

<body>
  <div>

  </div>
  <div id="product-grid">

    <div class="tex-heading">: CACTUS :</div>
  </div>
  <?php

  $sql = "SELECT * FROM  cactus ORDER BY Cactus_ID ASC";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result)) {




  ?>
    <div class="product-item">
      <form action="manage_cart.php" method="POST">
        <div class="product-image">
          <img src="upload/<?php echo $row['image']; ?>" alt="image" class="img">
        </div>
        <div class="product-title-footer">
          <div name="Cactusname" value="<?php echo $row['Cactusname']; ?>" class="product-title"><?php echo $row['Cactusname']; ?></div>
          <div class="product-details"> - <?php echo $row['Cactusdetail']; ?></div>
          <div name="Cactusprice" value="<?php echo $row['Cactusprice']; ?>" class="product-price"><?php echo $row['Cactusprice']; ?> THB </div>

          <input type="hidden" name="Cactusname" value="<?php echo $row['Cactusname']; ?>">
          <input type="hidden" name="Cactusprice" value="<?php echo $row['Cactusprice']; ?>">
          <!-- <input type="text" class="product-quantity" name="quantity" value="1" size="2"> -->
          <?php
          if (isset($_SESSION['user_ID'])) { ?>
            <input type="Submit" name="Add_To_Cart" class="btnAddAction" value="หยิบลงตะกร้า">

          <?php } else {
            echo "";
          }
          ?>

        </div>
      </form>
    </div>
  <?php
  }


  ?>






</body>


</html>