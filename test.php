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
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>\
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <title>
        ข้อมูลส่วนตัว &mdash;
    </title>
</head>
<style>
    body {
        font-family: 'Prompt', sans-serif;

    }

    .button1 {
        padding: 10px 15px;
        font-size: 15px;
        text-align: center;
        outline: none;
        color: white;
        background-color: #ffc61a;
        border: none;
        border-radius: 12px;
        box-shadow: 0 7px #999;
        margin-left: 90%;


    }

    .ss {
        font-size: 20px;
        color: black;
    }

    h5,
    h2 {
        font-family: 'Prompt', sans-serif;
    }

    .aa {
        padding: 10px 15px;
        font-size: 15px;
        text-align: center;
        outline: none;
        color: white;
        background-color: #e60000;
        border: none;
        border-radius: 12px;
        box-shadow: 0 7px #999;
        margin-left: 1%;
    }

    .tt {
        padding: 10px 15px;
        font-size: 15px;
        text-align: center;
        outline: none;
        color: white;
        background-color: #006600;
        border: none;
        border-radius: 12px;
        box-shadow: 0 7px #999;
        margin-left: 1%;
    }

    .card {
        margin-top: 20%;
    }

    .block-1 {
        width: 670px;
        height: 350px;
        margin: 20px;
        background: #0E9F98;
        float: left;
    }

    .block-2 {
        width: 670px;
        height: 350px;
        margin: 20px;
        background: #04BF9D;
        float: right;
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
    <div class="card ">
        <div class="body">
            <div>
                <h2 class="w3-center">ข้อมูลส่วนตัว</h2>
                <br>

                <p class="text-right">
                    <a href='#'><button type="button" class="button1" data-bs-toggle="modal" data-bs-target="#exampleModal">แก้ไขข้อมูล <i class='fas fa-edit' style='font-size:16px'></i></button> </a>

                </p>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลส่วนต้ว</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="tt">Save</button>
                                <button type="button" class="aa" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>



                <form action="#" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="POST" enctype="multipart/form-data">

                    <div class="block-1">
                        <h5>ชื่อ-นามสกุล</h5>
                        <div class="w3-row w3-section">
                            <div class="w3-col" style="width:50px"><i class='fas fa-user-alt' style='font-size:30px'></i></div>
                            <div class="w3-rest">
                                <text class="ss form-control">สมาชาย มันม่วง</text>
                            </div>
                        </div>

                        <h5>ชื่อผู้ใช้งาน</h5>
                        <div class="w3-row w3-section">
                            <div class="w3-col" style="width:50px"><i class='fas fa-user-alt' style='font-size:30px'></i></div>
                            <div class="w3-rest">
                                <text class="ss form-control">สมมติ</text>
                            </div>
                        </div>


                        <h5>อีเมลผู้ใช้งาน</h5>
                        <div class="w3-row w3-section">
                            <div class="w3-col" style="width:50px"><i class='fas fa-envelope-open' style='font-size:36px'></i></div>
                            <div class="w3-rest">
                                <text class="ss form-control">สมมติ</text>
                            </div>
                        </div>
                    </div>

                    <div class="block-2">
                        <h5>เบอร์โทรศัพท์</h5>
                        <div class="w3-row w3-section">
                            <div class="w3-col" style="width:50px"><i class='fas fa-phone-alt' style='font-size:30px'></i></div>
                            <div class="w3-rest">
                                <text class="ss form-control">สมมติ</text>
                            </div>
                        </div>

                        <h5>รหัสผ่าน</h5>
                        <div class="w3-row w3-section">
                            <div class="w3-col" style="width:50px"><i class='fas fa-id-card-alt' style='font-size:30px'></i></div>
                            <div class="w3-rest">
                                <text class="ss form-control">สมมติ</text>
                            </div>
                        </div>


                        <h5>ที่อยู่</h5>
                        <div class="w3-row w3-section">
                            <div class="w3-col" style="width:50px" height="200px"><i class='fas fa-home' style='font-size:30px'></i></div>
                            <div class="w3-rest">
                                <text class="ss form-control">สมมติ</text>
                            </div>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
    </div>

    </div>
  









    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>