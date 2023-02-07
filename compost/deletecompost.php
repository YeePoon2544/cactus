<?php

include('../connect/connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านuh

//สร้างตัวแปรสำหรับรับค่า compost_ID จากไฟล์แสดงข้อมูล
$compost_ID= $_GET['ID'];
 
//ลบข้อมูลออกจาก database ตาม compost_ID ที่ส่งมา
 
$sql = "DELETE FROM compost WHERE compost_ID ='$compost_ID' ";
$result = mysqli_query($conn, $sql) ;
 
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
 
  if($result){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "ลบข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "../admin.php?Menu=3&Submenu=indexcompost"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }else{
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


?>


