<?php
include('../connect/connect.php');

$compost_ID = $_GET['ID'];
$compostname = $_POST['compostname'];
$compostdetail = $_POST['compostdetail'];
$compostprice = $_POST['compostprice'];

//เช็คว่ามีรูปมั้ย
if (!empty($_FILES['image']['tmp_name'])) {
    $path = "upload/";
    $tmp_name = $_FILES['image']['tmp_name'];
    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newfilename);
    $sql = ("UPDATE compost SET compostname = '$compostname', compostdetail = '$compostdetail',compostprice = '$compostprice', image='$newfilename' WHERE compost_ID = $compost_ID ");
    $result = mysqli_query($conn, $sql);
}
$sql = ("UPDATE compost SET compostname = '$compostname', compostdetail = '$compostdetail',compostprice = '$compostprice' WHERE compost_ID = $compost_ID ");
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
                  window.location = "../admin.php?Menu=3&Submenu=indexcompost"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "../admin.php?Menu=3&Submenu=indexcompost"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
}
