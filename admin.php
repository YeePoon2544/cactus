<?php
session_start();
error_reporting(0);
include('connect/connect.php');
$Menu  = $_REQUEST['Menu'];
$Submenu = $_REQUEST['Submenu'];
if ($Menu == "1") {
  $selected2 = "class='selected'";
  if ($Submenu == "indexcactus") {
    $Fileshow = "cactus/indexcactus.php";
  } else if ($Submenu == "ceratecactus") {
    $Fileshow = "cactus/createcactus.php";
  } else if ($Submenu == "editcactus") {
    $Fileshow = "cactus/editcactus.php";
  } 
} else if ($Menu == "2") {
  $selected2 = "class='selected'";
  if ($Submenu == "indexsoil") {
    $Fileshow = "soil/indexsoil.php";
  } else if ($Submenu == "createsoil") {
    $Fileshow = "soil/createsoil.php";
  } else if ($Submenu == "editsoil") {
    $Fileshow = "soil/editsoil.php";
  } 

} else if ($Menu == "3") {
  $selected4 = "class='selected'";
  if ($Submenu == "indexcompost") {
    $Fileshow = "compost/indexcompost.php";
  } else if ($Submenu == "createcompost") {
    $Fileshow = "compost/createcompost.php";
  } else if ($Submenu == "editcompost") {
    $Fileshow = "compost/editcompost.php";
  }
} else if ($Menu == "4") {
  $selected4 = "class='selected'";
  if ($Submenu == "indexorder") {
    $Fileshow = "order/indexorder.php";
  } else if ($Submenu == "detailorder") {
    $Fileshow = "order/detailorder.php";
  }
} 
else if ($Menu == "5") {
  $selected4 = "class='selected'";
  if ($Submenu == "indexsales") {
    $Fileshow = "sales/indexsales.php";
  }
}else {
  $Fileshow = "adminwelcome.php";
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Admin Cactus</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: 'Prompt', sans-serif;
    }

    p {
      font-size: 18px;
    }
  </style>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container">
      <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
        <i class="fa fa-remove"></i>
      </a>
      <img src="images/admin.png" style="width:100%;" class="w3-round">
      <h1><b>Admin</b></h1>

    </div>
    <div class="w3-bar-block">
      <a onclick="location. href='admin.php?Menu=1&Submenu=indexcactus';" class="sub-menu w3-bar-item w3-button w3-padding">
        <p><i class="fa fa-th-large fa-fw w3-margin-right"></i>ข้อมูลแคคตัส</p>
      </a>
      <a onclick="location. href='admin.php?Menu=2&Submenu=indexsoil';" class="sub-menu w3-bar-item w3-button w3-padding">
        <p><i class="fa fa-th-large fa-fw w3-margin-right"></i>ข้อมูลดิน</p>
      </a>
      <a onclick="location. href='admin.php?Menu=3&Submenu=indexcompost';" class="sub-menu w3-bar-item w3-button w3-padding">
        <p><i class="fa fa-th-large fa-fw w3-margin-right"></i>ข้อมูลปุ๋ย</p>
      </a>
      <a onclick="location. href='admin.php?Menu=4&Submenu=indexorder';" class="sub-menu w3-bar-item w3-button w3-padding">
        <p><i class="fa fa-th-large fa-fw w3-margin-right"></i>คำสั่งซื้อ</p>
      </a>
      <a onclick="location. href='admin.php?Menu=5&Submenu=indexsales';" class="sub-menu w3-bar-item w3-button w3-padding">
        <p><i class="fa fa-th-large fa-fw w3-margin-right"></i>ยอดขายประจำเดือน</p>
      </a>
      <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">
        <p><i class="fa fa-th-large fa-fw w3-margin-right"></i>ออกจากระบบ</p>
      </a>
    </div>


  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px">
    <?php
    include($Fileshow);
    ?>
  </div>



  <script>
    // Script to open and close sidebar
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }
  </script>

</body>

</html>