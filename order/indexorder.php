<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>ข้อมูลแคคตัส</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<style>
    body {
        font-family: 'Prompt', sans-serif;

    }

    table {
        border-collapse: collapse;
        width: 70%;
        text-align: center;

    }

    th {
        background-color: IndianRed;
        color: white;
    }

    .btn-primary {
        margin-left: 89%;
        font-size: 16px;
    }

    h2 {
        border: 8px solid #D4D2F2;
        width: 150px;
        border-radius: 45px;
        text-align: center;
        color: white;
        font-size: 27px;
        background-color: SlateBlue;
        margin-left: 10px;
        margin-top: 40px;
        padding: 7px;
        width: 35%;
        margin: 0 auto;
        font-size: 22px;
        font-family: 'Prompt', sans-serif;
    }
</style>

<body>
    <br>
    <h2 align='center'>รายการสั่งซื้อสินค้า</h2>
</body>



<table class="table table-bordered" align="center" width=65% border=1 cellpadding=4>
    <tr align="center">

        <th>ชื่อลูกค้า</th>
        <th>รายละเอียดคำสั่งซื้อ</th>

    </tr>
    <?php
    include('connect/connect.php');
    $sql = "SELECT * FROM tbl_orders  ";
    $result =  mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {

    ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><a href='admin.php?Menu=4&Submenu=detailorder'>กดดูรายละเอียด</a></td>

            </tr>
    <?php }
     ?>

</table>



</html>