<?php
include('../connect/connect.php');


// string image
if (!empty($_FILES['image']['tmp_name'])) {
    $tmp_name = $_FILES['image']['tmp_name'];
    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $compostname = $_POST['compostname'];
    $compostdetail = $_POST['compostdetail'];
    $compostprice = $_POST['compostprice'];

    $sql  = "INSERT INTO compost (compostname,compostdetail,compostprice,image )
         VALUES('$compostname','$compostdetail','$compostprice','$newfilename')";
    $result = mysqli_query($conn, $sql);

    //upload image in folder
    move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newfilename);

  
} 
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
 
  if($result){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "บันทึกข้อมูลสำเร็จ",
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