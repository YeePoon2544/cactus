<?php
session_start();
error_reporting(0);
include('connect/connect.php');
$Menu  = $_REQUEST['Menu'];
$Submenu = $_REQUEST['Submenu'];
if ($Menu == "1") {
  $selected2 = "class='selected'";
  if ($Submenu == "home") {
    $Fileshow = "home.php";
  }
} else if ($Menu == "2") {
  $selected2 = "class='selected'";
  if ($Submenu == "cargo") {
    $Fileshow = "cargo.php";
  } else if ($Submenu == "cactus") {
    $Fileshow = "cactus.php";
  } else if ($Submenu == "soil") {
    $Fileshow = "soil.php";
  } else if ($Submenu == "compost") {
    $Fileshow = "compost.php";
  } else if ($Submenu == "detailcactus") {
    $Fileshow = "detailcactus.php";
  } else if ($Submenu == "detailcompost") {
    $Fileshow = "detailcompost.php";
  } else if ($Submenu == "detailsoil") {
    $Fileshow = "detailsoil.php";
  }
} else if ($Menu == "3") {
  $selected4 = "class='selected'";
  if ($Submenu == "buyorder") {
    $Fileshow = "buyorder.php";
  } else if ($Submenu == "pay") {
    $Fileshow = "pay.php";
  }
} else if ($Menu == "4") {
  $selected4 = "class='selected'";
  if ($Submenu == "qa") {
    $Fileshow = "qa.php";
  }
} else if ($Menu == "5") {
  $selected4 = "class='selected'";
  if ($Submenu == "contact") {
    $Fileshow = "contact.php";
  } else if ($Submenu == "order") {
    $Fileshow = "order.php";
  }
}

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

  <title>
    Cactus &mdash; Papichaya
  </title>
</head>
<style>
  body {
    font-family: 'Prompt', sans-serif;
    background-image: url("images/cactus3.png");
    background-size: 100%;

  }

  .aa {
    width: 12%;

  }

  .box-feature {
    background: #fff;
    border-radius: 4px;
    width: 150%;
    padding: 10px;
    margin-bottom: 60px;

    margin-top: 40%;
  }

  .box-feature h3,
  .box-feature .h3 {
    font-size: 22px;
  }

  .box-feature-aa {
    background: #fff;
    border-radius: 4px;
    width: 150%;
    padding: 10px;
    margin-bottom: 50px;
    margin-left: 50%;
    margin-top: 40%;
  }

  .box-feature-aa h3,
  .box-feature-aa .h3 {
    font-size: 22px;
  }

  .box-feature-aa [class^="flaticon-"] {
    color: #00204a;
    font-size: 60px;
    margin: 0 0 10px 0;
    display: block;
    padding: 0;
    line-height: 0;
  }

  .gg {
    color: black;
    font-size: 15px;
  }

  .menu {

    position: relative;
    width: 50%;
    border-radius: 7px;
  }

  .menuaa {
    background-color: #005555;
    position: relative;
    float: left;
    width: 100%;
    border-radius: 7px;
    position: relative;

  }

  .dd {
    color: #fff;
  }
</style>

<body>

  <header>
    <nav class="site-nav">
      <div class="menuaa">

        <div class="site-navigation">
          <div><img src="images/CActus (2).png" class="menu" />
            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">

              <li><a href='index.php?Menu=1&Submenu=home' class="sub-menu" onclick="location">หน้าหลัก</a></li>
              <li><a href='index.php?Menu=2&Submenu=cargo' class="sub-menu" onclick="location">สินค้า</a></li>
             

              <?php
              $count = 0;
              if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
              }
              ?>
              <li>
              <?php
                if (isset($_SESSION['User_ID'])) { ?>
                 <a href='index.php?Menu=3&Submenu=buyorder' class="sub-menu" onclick="location">ตะกร้าสินค้าของฉัน (<?php echo $count; ?>)</a></li>

                 <?php } else { ?>
                  <?php } ?>



              <li><a href='index.php?Menu=4&Submenu=qa' class="sub-menu" onclick="location">ติดต่อสอบถาม</a></li>
              <li class="has-children">
                <?php
                if (isset($_SESSION['User_ID'])) { ?>
                  <span class="dd">ผู้ใช้งาน : <?php echo $_SESSION['username']; ?></span>
                  <ul class="dropdown">
                    <li><a href="index.php?Menu=5&Submenu=contact">ข้อมูลส่วนตัว</a></li>
                    <li><a href="index.php?Menu=5&Submenu=order">ประวัติการซื้อ</a></li>
                    <li><a href="logout.php">ออกจากระบบ</a></li>
                  </ul>
              </li>
            <?php } else { ?>
              <a href="login.php" class="sub-menu">เข้าสู่ระบบ</a>
            <?php } ?>



          </div>
        </div>

      </div>
    </nav>

  </header>


  <!-- <div class="hero">
    <div class="hero-slide">
      <div class="img " style="background-image: url('images/cactucs.png')"></div>
      <div class="img " style="background-image: url('images/cactus2.png')"></div>
      <div class="img " style="background-image: url('images/cactus3.png')"></div>
    </div> -->

  <div class="container">
    <?php
    include($Fileshow);
    ?>

  </div>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/navbar.js"></script>
  <script src="js/counter.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>