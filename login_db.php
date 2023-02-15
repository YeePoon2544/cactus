<?php
 include('connect/connect.php');
 session_start();

    if (isset($_POST['username'])) {

        $username = $_POST['username'];
        $password = md5($_POST['password']); // ถอดรหัส MD5
        

        $sql = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."' ";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['User_ID'] = $row['User_ID'];
            $_SESSION['username'] = $row['name'] ." " .$row['lastname'];
            $_SESSION['userlevel'] = $row['userlevel'];

            echo '
            <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
        
        if ($_SESSION['userlevel'] == 'a') {
            
            echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "เข้าสู่ระบบสำเร็จ",
                          type: "success"
                      }, function() {
                          window.location = "admin.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
        } 
        if ($_SESSION['userlevel'] == 'm') {
            echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "เข้าสู่ระบบสำเร็จ",
                          type: "success"
                      }, function() {
                          window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
        } 
    }

        else {
            echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "user หรือ password ไม่ถูกต้อง",
                          type: "error"
                      }, function() {
                          window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
    
    
     }
    }

    
    
    ?>