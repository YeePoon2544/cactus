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
        ชำระเงิน &mdash;
    </title>
</head>
<style>
    body,
    h5 {
        font-family: 'Prompt', sans-serif;
    }

    .pp {
        background-color: #E6E6FA;
        width: 80%;
        margin-top: 15%;
    }

    h5 {
        font-size: 30px;
        text-align: center;
       
    }

    text {
        font-size: 20px;
        color: #000;
    }

    img {
        width: 15%;
    }

    .ss{
        width: 30%;
        font-size: 23px;
    }
</style>

<body>
    
    <div class="container">


        <div class="pp">
            <div class="row justify-content-between">
                <h5><b>ช่องทางการชำระเงิน</b></h5>
                <div>
                    <br>
                    <text>จำนวนเงินที่ต้องชำระ</text> <text class="ss form-control">ราคาของ</text> <text>THB</text>
                </div>
                <br><br><br><br>
                <div>
                    <text>โอน ธนาคาร กรุงไทย เลขที่บัญชี</text> <text class="ss form-control">678-x-xxxxx-x</text>
                </div>
                <br><br><br>
                <div>
                    <text>พร้อมเพย์</text> <img src="images/pr (1).png"> &nbsp; &nbsp; &nbsp; &nbsp;
                    <text>แนบหลักฐานการโอน</text> <input class="w3-input w3-border" type="file" name="image" onchange="loadFile(event)" />
                    <img id="showimg" src="uploads/<?php echo $image; ?>" style="height:240px; width:200px;">
                </div>
            </div>


</body>

</html>