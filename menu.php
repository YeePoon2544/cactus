<?php include('connect/connect.php'); ?>
<?php ob_start();  ?>
<?php

if (!isset($_SESSION['user_login'])) {
    header("location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านมันไก่ย่าง VS หมูพริกเผา - User Page</title>
    <link rel="stylesheet" href="css/admin.css">
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://kit.fontawesome.com/789b9cccb1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    
    .dropbtn {
        background-color: #FF4757;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 250px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #FF4757;
    }
</style>

<body>

    <div class="text-center mt-4">
        <div class="container">

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <h3>
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

            <!-- <h1>หน้าผู้ใช้</h1> -->
            <!-- <hr> -->



        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">

            <a href="<?php echo SITEURL; ?>" class="navbar-brand" title="Logo">
                <img style="width: 200px; height: 100px; " src="images/Food_delivery.jpg" alt="Restaurant Logo" class="img-responsive" />
            </a>
            <!-- style="background-color: #66FFFF;"  -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon btn"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">

                    <b><a class="nav-link active" aria-current="page" href="<?php echo SITEURL; ?>">หน้าหลัก</a></b>
                    </li>
                    <li class="nav-item">
                        <b><a class="nav-link" href="<?php echo SITEURL; ?>status.php">สถานะการสั่งอาหารของคุณ</a></b>

                    </li>
                    <li class="nav-item">
                    <b><a class="nav-link" href="<?php echo SITEURL; ?>chicken_categories.php">หมวดหมู่อาหาร</a></b>

                    </li>
                    <li class="nav-item">
                    <b><a class="nav-link" href="<?php echo SITEURL; ?>chicken_foods.php">อาหาร</a></b>

                    </li>
                    <li class="nav-item" style="padding-right:10px ;">

                    <b><a class="nav-link" href="<?php echo SITEURL; ?>chicken_contact.php">ติดต่อร้าน</a></b>

                    </li>
                    <li class="nav-item" style="padding-right:10px ;">

                    <b><a class="nav-link" href="<?php echo SITEURL; ?>userProfile.php">ข้อมูลส่วนตัว</a></b>

                    </li>
                    <!-- <li class="nav-item nav-link">
                    <a href="cart.php">
                            <h5 class=" cart">
                                <i class="fas fa-shopping-cart"></i> Cart
                                <?php

                                if (isset($_SESSION['cart'])) {
                                    $count = count($_SESSION['cart']);
                                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                                } else {
                                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                                }

                                ?>
                            </h5>
                        </a>
                    </li> -->

                    <?php
                    $count = 0;
                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                    }
                    ?>
                    <a href="mycart.php" class="btn btn-outline-success">ตระกร้าของฉัน (<?php echo $count; ?>)</a>

                </ul>
                <form class="d-flex" role="search">



                    <h4 style="padding-right:50px ;">
                        <?php if (isset($_SESSION['user_username'])) { ?>
                            ยินดีต้อนรับ, <?php echo $_SESSION['user_username'];
                                        } ?>
                    </h4>
                    <a href="./logout.php" class="btn btn-danger">ออกจากระบบ</a>

                </form>
            </div>
        </div>
    </nav>



    <!-- <section class="navbar">
        <div class="container-fluid">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>" title="Logo">
                    <img src="images/โลโก้วไลย-removebg-preview.png" alt="Restaurant Logo" class="img-responsive" />
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">หน้าหลัก</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>chicken_rice.php">ร้านมันไก่ย่างVSหมูพริกเผา</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>chicken_categories.php">หมวดหมู่อาหาร</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>chicken_foods.php">อาหาร</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>chicken_contact.php">ติดต่อร้าน</a>
                    </li>
                    <div class="dropdown">
                        <button class="dropbtn">ร้านอาหารอื่นๆ</button>
                        <div class="dropdown-content" style="text-align:center;">
                            <a href="<?php echo SITEURL; ?>chicken_rice.php">ร้านมันไก่ย่าง VS หมูพริกเผา</a>
                            <a href="<?php echo SITEURL; ?>noodles.php">ร้านเตี๋ยวมั้ยจ๊ะ</a>
                            <a href="<?php echo SITEURL; ?>aunt.php">ร้านป้ากลอยเจ้าเก่า(รสเด็ด)</a>
                            <a href="<?php echo SITEURL; ?>water.php">ร้านน้ำ พิชชา</a>
                            <a href="<?php echo SITEURL; ?>rice111.php">ร้านเจ๊เเตนข้าวเเกงรสเด็ด</a>
                            <a href="<?php echo SITEURL; ?>water555.php">ร้านน้ำล้าน 5</a>
                            <a href="<?php echo SITEURL; ?>house_noodles.php">ร้านนัดพบบ้านก๋วยเตี๋ยวหร่อย</a>
                        </div>
                    </div> 
                </ul>

            </div>

            <div class="clearfix"></div>
        </div>
    </section> -->
    <!-- Navbar Section Ends Here -->