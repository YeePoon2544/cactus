<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta namcloudflaree="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs..com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    
    <title>เพิ่มข้อมูลแคคตัส</title>
</head>
<style>
    body {
        font-family: 'Prompt', sans-serif;

    }

    input[type=submit] {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;

    }

    input[type=submit]:hover {
        background-color: #45a049;
    }


    input[type=reset] {
        background-color: #787A79;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      
    }

    input[type=reset]:hover {
        background-color: #656C5C;
    }

    h2,
    h5 {
        font-family: 'Prompt', sans-serif;
    }
    form{
        border-radius: 30px;
    }
    input{
        border-radius: 10px;
    }
</style>

<body>
    <form action="cactus/storecactus.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="POST" enctype="multipart/form-data">
        <div align="center">
            <h2>เพิ่มข้อมูลแคคตัส</h2>
        </div>
        <h5>ไฟล์รูปภาพแคคตัส</h5>
        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class="fa fa-file-picture-o" style="font-size:36px"></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border" type="file" name="image" onchange="loadFile(event)" required /> <br>
                <img id="showimg" src="image/<?php echo $image; ?>" style="height:270px; width:200px;">
            </div>
        </div>

        <h5>ชื่อแคคตัส</h5>
        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class='fas fa-pen' style='font-size:36px'></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border" name="Cactusname" type="text" placeholder="ชื่อแคคตัส" required >
            </div>
        </div>

        <h5>รายละเอียดแคคตัส</h5>
        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class='far fa-file-alt' style='font-size:36px'></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border" name="Cactusdetail" type="text" placeholder="รายละเอียดแคคตัส" required>
            </div>
        </div>

        <h5>ราคาแคคตัส</h5>
        <div class="w3-row w3-section">
            <div class="w3-col" style="width:50px"><i class='fas fa-dollar-sign' style='font-size:36px'></i></div>
            <div class="w3-rest">
                <input class="w3-input w3-border" name="Cactusprice" type="text" placeholder="ราคาแคคตัส" required>
            </div>
        </div>

        <p class="w3-center">
            <input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="reset" name="cancle" value="Cancel" />
        </p>
    </form>
</body>
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