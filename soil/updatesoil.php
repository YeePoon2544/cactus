<?php
include('../connect/connect.php');

$soil_ID = $_GET['ID'];
$soilname = $_POST['soilname'];
$soildetail = $_POST['soildetail'];
$soilprice = $_POST['soilprice'];

//เช็คว่ามีรูปมั้ย
if (!empty($_FILES['image']['tmp_name'])) {
    $path = "upload/";
    $tmp_name = $_FILES['image']['tmp_name'];
    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newfilename);
    $sql = ("UPDATE soil SET soilname = '$soilname', soildetail = '$soildetail',soilprice = '$soilprice', image='$newfilename' WHERE soil_ID= $soil_ID ");
    $result = mysqli_query($conn, $sql);
}
$sql = ("UPDATE soil SET soilname = '$soilname', soildetail = '$soildetail',soilprice = '$soilprice' WHERE soil_ID= $soil_ID ");
$result = mysqli_query($conn, $sql);


echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ($result) {
    echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "../admin.php?Menu=2&Submenu=indexsoil"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
} else {
    echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "../admin.php?Menu=2&Submenu=indexsoil"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
}
