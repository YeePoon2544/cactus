<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>ข้อมูลดิน</title>
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
        border: 8px solid #FF6699;
        width: 150px;
        border-radius: 45px;
        text-align: center;
        color: white;
        font-size: 27px;
        background-color: #FF9999;
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
    <h2 align='center'>ข้อมูลดิน</h2>
    <a href="admin.php?Menu=2&Submenu=createsoil"><button type="button" class="btn btn-primary">เพิ่มข้อมูล <i class='fas fa-plus-circle' style='font-size:20px'></i></button></a> <br>

</body>





<table class="table table-bordered" align="center" width=65% border=1 cellpadding=4>
    <tr align="center">
        <th>รหัสสินค้าดิน</th>
        <th>รูปภาพดิน</th>
        <th>ชื่อดิน</th>
        <th>รายละเอียดดิน</th>
        <th>ราคาดิน</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

include('connect/connect.php');
$sql = "SELECT * FROM  soil ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
        <tr>
        <tr>
            <td><?php echo $row ['soil_ID']; ?></td>
            <td><img id="showimg" src="upload/<?php echo $row ['image']; ?>" style="height:120px; width:100px;"></td>
            <td><?php echo $row ['productname']; ?></td>
            <td><?php echo$row ['soildetail']; ?></td>
            <td><?php echo $row ['productprice']; ?></td>
            <td><a href='admin.php?Menu=2&Submenu=editsoil&ID=<?php echo $row['soil_ID']; ?>'><button type="button" class="btn btn-warning"><i class='far fa-edit' style='font-size:22px'></i></button></a></td>
            <td><a href='soil/deletesoil.php?ID=<?php echo  $row ['soil_ID']; ?>'><button type="button" class="btn btn-danger"><i class='fas fa-eraser' style='font-size:22px'></i></button></a></td>

        </tr>

        <?php
    }
    mysqli_close($conn); //ปิดการเชื่อมต่อฐานข้อมูล

    ?>
           
</table>
<?php mysqli_close($conn) ?>
<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('showimg');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>

</html>