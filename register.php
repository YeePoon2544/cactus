<?php
 include('connect/connect.php');
 session_start();
 if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $sql = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user['username'] === $username ) {
        echo "<script>alert('Username already exists');</script>";
    } else {
        $passwordenc = md5($password);

        $sql = "INSERT INTO user (name, lastname, username, mail, password, confirmpassword, userlevel  )
        VALUE ('$name', ' $lastname', '$username', '$email', '$passwordenc', '$confirmpassword', 'm')";
        $result = mysqli_query($conn, $sql);

        echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    
    if ($result) {
        echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "เพิ่มข้อมูลสำเร็จ",
                      type: "success"
                  }, function() {
                      window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
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
                      window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
                  });
                }, 1000);
            </script>';


 }
}
 }


?>

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
        สมัครสมชิก &mdash;
    </title>
</head>
<style>
    img {
        width: 110%;

    }
   
</style>

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <div class="" style="background-image: url('images/cactucs.png')">


        <section class="vh-100">
            <div class="container ">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="images/lonig1.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <i class='fas fa-seedling' style='font-size:48px;color:#556B2F'></i>
                                                <span class="h1 fw-bold mb-0"> Cactus</span>
                                            </div>


                                            <div class="form-outline mb-3">
                                                <div class="col-sm-2"> Name : </div>

                                                <input name="name" type="text" required class="form-control"  placeholder="Name" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" />

                                            </div>

                                            <div class="form-outline mb-3">
                                                <div class="col-sm-2"> Lastname : </div>

                                                <input name="lastname" type="text" required class="form-control"  placeholder="lastname" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" />

                                            </div>
                                            <div class="form-outline mb-3">
                                                <div class="col-sm-2"> Username : </div>

                                                <input name="username" type="text" required class="form-control"  placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" />

                                            </div>

                                            <div class="form-outline mb-3">
                                                <div class="col-sm-2"> E-mail: </div>

                                                <input name="mail" type="email" required class="form-control"  placeholder="E-mail" />

                                            </div>

                                            <div class="form-outline mb-3">
                                                <div class="col-sm-3"> Password : </div>

                                                <input name="password" type="password" required required class="form-control"  placeholder="password" pattern="^[a-zA-Z0-9]+$" minlength="2" />

                                            </div>

                                            <div class="form-outline mb-3">
                                                <div class="col-sm-3"> Confirmpassword : </div>

                                                <input name="confirmpassword" type="password" required class="form-control"  placeholder="Confirmpassword" pattern="^[a-zA-Z0-9]+$" minlength="2" />

                                            </div>

                                            <div class="pt-1 mb-3">
                                                <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit">Sing in</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.untree_co-section -->









        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/tiny-slider.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/navbar.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
</body>

</html>