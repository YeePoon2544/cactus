<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>

  <title>
  Soil &mdash; ดิน
  </title>
</head>
<style>
  body {
    font-family: 'Prompt', sans-serif;

  }



  .tex-heading {
    color: #000;
    border-bottom: 3px solid #B22222;
    overflow: auto;
    margin-top: 12%;
    font-size: 25px;


  }

  .img{
    border-radius: 15px 20px 10px;
    padding: 5px;
    background-color: rgb(94, 74, 46);
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
    border: 5px dashed #B03060;
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
    border: #e0e0e0  2px solid;
    width: 30%;
    
  }
  .btnAddAction{
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
  .product-quantity{
    padding: 5px 10px;
    border-radius: 3px;
    border: #e0e0e0 1px solid;
    font-size: 18px;
    text-align: center;
    margin-left: 51%;
  }
 
 
</style>

<body>

  <div id="product-grid">

    <div class="tex-heading">: SOIL :</div>
  </div>
  <?php

  $sql = "SELECT * FROM  soil ORDER BY soil_ID ASC";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result)) {




  ?>
   <div class="product-item">
        <form action="#" class="grid">
          <div class="product-image">
            <img src="upload/<?php echo $row ['image']; ?>" alt="image" class="img">
          </div>
          <div class="product-title-footer">
            <div class="product-title"><?php echo $row["soilname"];?></div>
            <div class="product-details"> - <?php echo $row["soildetail"];?></div>
            <div class="product-price"><?php echo $row["soilprice"];?> THB </div>

            <div class="cart-action">
            <?php
            if (isset($_SESSION['user_ID'])) { ?>
              <input type="text" class="product-quantity" name="quantity" value="1" size="2">
              <input type="Submit" class="btnAddAction" value="สั่งซื้อสินค้า">
              <?php } else {
                echo "";
              }
              ?>

            </div>
          </div>
        </form>
      </div>

  <?php
    }
  

  ?>




</body>


</html>