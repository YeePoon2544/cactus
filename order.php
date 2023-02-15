<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
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
        ข้อมูลส่วนตัว &mdash;
    </title>
</head>
<style>
    body {
        font-family: 'Prompt', sans-serif;

    }

    .pp {
        background-color: #FAFAD2;
        width: 90%;
        padding: 20px;
        margin-top: 15%;


    }

    h5 {
        padding: 2%;
        font-size: 25px;
        color: white;
        text-align: center;
        margin-top: 2%;
    }

    .vv {
        background-color: darkslateblue;
        width: 20%;
    }

    p {
        margin-top: 1%;

    }

    table {
        border-collapse: collapse;
        width: 70%;
        text-align: center;
        font-size: 18px;
    }
    th{
        background-color: cadetblue;
    }
</style>

<body>

    <div class="container">

        <div class="pp">
            <div class="row justify-content-between">

            </div>

            <div class="vv">
                <h5><b><i class='fas fa-dollar-sign' style='font-size:30px'></i> ประวัติการซื้อ</b></h5>
            </div>

            <table class="table table-bordered" align="center" width=65% border=1 cellpadding=4 >
                <tr align="center">
                
                    <th >รหัสสินค้าที่สั่งซื้อ</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>เวลา</th>

                </tr>
                <?php
                include('connect/connect.php');
                $sql = "SELECT * FROM  user_orders ";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['Order_ID']; ?></td>
                        <td><?php echo $row['productname']; ?></td>
                        <td><?php echo $row['productprice']; ?></td>
                        <td><?php echo $row['Quantity']; ?></td>
                        <td><?php echo $row['time_order']; ?></td>

                    </tr>
                <?php
                }
                mysqli_close($conn); //ปิดการเชื่อมต่อฐานข้อมูล

                ?>

            </table>



</body>

</html>