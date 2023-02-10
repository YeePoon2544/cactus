

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>สินค้าใส่ตระกร้าของฉัน</h1>
            </div>

            <!-- <form action="" method="POST" class="order"> -->
            <div class="col-lg-9">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">หมายเลข</th>
                            <th scope="col">ชื่ออาหาร</th>
                            <th scope="col">ราคาสินค้า</th>
                            <th scope="col">จำนวน</th>
                            <th scope="col">ราคารวม</th>
                            <th scope="col">ลบสินค้า</th>
                            <!-- <th scope="col"></th> -->
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        // $total = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $sr = $key + 1;
                                // $total = $total + $value['price'];
                                // print_r($value);
                                echo "
                                <tr>
                                    <td>$sr</td>
                                    <td>$value[Cactusname]<input type='hidden' name='Cactusname'></td>
                                    <td>$value[Cactusprice] บาท<input type='hidden' name='Cactusprice' class='iprice' value='$value[Cactusprice]'></td>
                                    <td>
                                        <form action='manage_cart.php' method='POST'>
                                            <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
                                            <input type='hidden' name='Cactusname' value='$value[Cactusname]'>
                                         </form>
                                    </td>
                                    <td class='itotal'></td>
                                    <td>
                                    <form action='manage_cart.php' method='POST'>
                                        <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>ลบสินค้า</button>
                                        <input type='hidden' name='Cactusname' value='$value[Cactusname]'>
                                    </form>
                                    </td>
                                </tr>

                                ";
                            }
                        }
                        ?>
                        <!-- <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>                -->
                    </tbody>
                </table>
            </div>

            <div class="col-lg-3">
                <div class="border bg-light rounded p-4">

                    <form action="purchase.php" method="POST">
                        <h4>รวมทั้งหมด:</h4>

                        <!-- *************************************************************************************** -->
                        <p class="text-right" id="gtotal" name="gtotal"></p>
                        <input type="hidden" name="total" id="total">

                        <!-- ********************************************************* -->

                        <br>

                        <?php

                        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

                        ?>

                            <!-- <input type="hidden" name="order_date"> -->

                            <div class="form-group">
                                <b>ชื่อ-นามสกุล</b>
                                <input type="text" name="name" class="form-control" placeholder="กรอกชื่อ-นามสกุล" required>
                            </div>
                            <div class="form-group">
                                <b>เบอร์โทร</b>
                                <input type="number" name="telephone" class="form-control" placeholder="กรอกเบอร์โทร" required>
                            </div>
                            <div class="form-group">
                                <b>ที่อยู่</b>
                                <input type="text" name="address" style="width: 205px; height: 100px;" class="form-control" placeholder="กรอกที่อยู่ ตำบล อำเภอ รหัสไปรษณีย์ จังหวัด" required>
                            </div>
                            <div class="form-group">
                                <b class="col-sm-10">
                                    เลือกวิธีส่งสินค้า
                                </b>

                                <div class="col-sm-20">
                                    <!-- onchange="sum();" เมื่อไหร่ก้ตามกดเข้า จะส่งไปให้ -->
                                    <input type="radio" name="send_type" id="ems1" onchange="sum();" value="10" required> ระยะทางส่ง 500 เมตร คิดค่าบริการ 10 บาท <br>

                                    <input type="radio" name="send_type" id="ems2" onchange="sum();" value="20" required> ระยะทางส่ง 1-2 กิโลเมตร คิดค่าบริการ 20 บาท <br>

                                    <input type="radio" name="send_type" id="ems3" onchange="sum();" value="30" required> ระยะทางส่ง 3-4 กิโลเมตร คิดค่าบริการ 30 บาท<br>

                                    <!-- <input type="radio" name="send_type" id="ems4"  onchange="sum();"  
                                                value="150" required> ส่งแบบ Kerry 150 บาท <br> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    รวม (บาท)
                                </div>
                                <div class="col-sm-20">
                                    <input type="text" id="grandTotal" name="grandTotal" readonly="readonly" class="form-control" required />
                                </div>
                            </div>
                            <!-- <div class="form-check">
                                <input class="form-check-input" type="radio" name="pay_mode" value="Ordered" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    จ่ายเงินสดในปลายทาง
                                </label>
                            </div>
                            <br>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="phase1"  value="10" checked>
                                <label class="form-check-label" for="exampleCheck1">ระยะทางส่ง 500 เมตร
                                    คิดค่าบริการ 10 บาท</label>
                            </div>
                            <br>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2" name="phase2" value="20">
                                <label class="form-check-label" for="exampleCheck1">ระยะทางส่ง 1-2 กิโลเมตร
                                    คิดค่าบริการ 20 บาท</label>
                            </div>
                            <br>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck3" name="phase3" value="30" >
                                <label class="form-check-label" for="exampleCheck1">ระยะทางส่ง 3-4 กิโลเมตร
                                    คิดค่าบริการ 30 บาท</label>
                            </div> -->
                            <br>
                            <button class="btn btn-primary btn-block" name="purchase">ยืนยันทำการสั่งซื้อ</button>
                    </form>
                <?php
                        }
                ?>
                </div>
            </div>

            <!-- </form> -->
            <!-- <div>
                <?php
                //CHeck whether submit button is clicked or not
                // if (isset($_POST['submit'])) {
                //     // Get all the details from the form
                //     $food = $_POST['title'];
                //     $price = $_POST['price'];
                //     $qty = $_POST['qty'];
                //     $total = $price * $qty; // total=pricexqty
                //     $order_date = date("Y-m-d h:i:sa"); //Order DAte 
                //     $status = "Ordered"; // Ordered, On Delivery, Delivered, Cancelled
                //     $customer_name =  $_POST['full-name'];
                //     $customer_contact = $_POST['contact'];
                //     $customer_email = $_POST['email'];
                //     $customer_address =  $_POST['address'];


                //     //Save the Order in Databaase
                //     //Create SQL to save the data
                //     $sql2 = "INSERT INTO tbl_orders SET 
                //         food = '$food',
                //         price = $price,
                //         qty = $qty,
                //         total = $total,
                //         order_date = '$order_date',
                //         status = '$status',
                //         customer_name = '$customer_name',
                //         customer_contact = '$customer_contact', 
                //         customer_email = '$customer_email',
                //         customer_address = '$customer_address' 
                //         ";

                //     // echo $sql2;
                //     // die(); //ตรวจสอบก่อน
                //     //Execute the Query
                //     $res2 = mysqli_query($conn, $sql2);

                //     if ($res2 == true) {

                //         $_SESSION['order'] = "<div class='success text-center'>อาหารที่สั่งสำเร็จ.</div>";
                //         header('location:' . SITEURL);
                //     } else {

                //         $_SESSION['order'] = "<div class='error text-center'>สั่งอาหารไม่สำเร็จ.</div>";
                //         header('location:' . SITEURL);
                //     }
                // }


                ?>
            </div> -->
        </div>
    </div>
    <!-- </div>
    </div> -->
    
    <script type="text/javascript">
        function sum() {
       //alert (gtotal);
            // var ประกาศตัวเเปร
            // var priceTotal = 2000; //ราคาราคาสินค้า + กับค่าส่ง
            var total = document.getElementById('total').value;
            var grandTotal = document.getElementById('grandTotal').value;
            alert(total);
            if (document.getElementById('ems1').checked) { //ถ้ามีการคลิกเข้า checked ถึงจะส่งไปทำงาน
                var ems1 = document.getElementById('ems1').value;
                var result = parseInt(total) + parseInt(ems1);
                document.getElementById('grandTotal').value = result; //ส่งค่าไปเเสดงที่ id :: grandTotal
            } else if (document.getElementById('ems2').checked) { //ถ้ามีการคลิกเข้า checked ถึงจะส่งไปทำงาน
                var ems2 = document.getElementById('ems2').value;
                var result = parseInt(gtotal) + parseInt(ems2);
                document.getElementById('grandTotal').value = result; //ส่งค่าไปเเสดงที่ id :: grandTotal
            } else if (document.getElementById('ems3').checked) { //ถ้ามีการคลิกเข้า checked ถึงจะส่งไปทำงาน
                var ems3 = document.getElementById('ems3').value;
                var result = parseInt(gtotal) + parseInt(ems3);
                document.getElementById('grandTotal').value = result; //ส่งค่าไปเเสดงที่ id :: grandTotal
            }

            //   else if(document.getElementById('ems4').checked){ //ถ้ามีการคลิกเข้า checked ถึงจะส่งไปทำงาน
            //         var ems4 = document.getElementById('ems4').value;
            //         var result = parseInt(priceTotal)+parseInt(ems4);
            //         document.getElementById('grandTotal').value = result;  //ส่งค่าไปเเสดงที่ id :: grandTotal
            //   }

        } //close func
    </script>

    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');
        var total = document.getElementById('total');
        // var exampleCheck1 = document.getElementById('exampleCheck1');
        // var exampleCheck2 = document.getElementById('exampleCheck2');
        // var exampleCheck3 = document.getElementById('exampleCheck3');

        function subTotal() {
            gt = 0;
            for (i = 0; i < iprice.length; i++) {
                // exampleCheck1 = 10;
                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value) 
                gt = gt + (iprice[i].value) * (iquantity[i].value) ;

                // + (exampleCheck1);ems1
                // price 650  iquantity  1 gt=0+(650*1)
                // price 750  iquantity  2 gt=650+(750*2)    === gt=2150
                // price 850  iquantity  1 gt=2150+(850*1)   ==== gt=3000
            }
            gtotal.innerText = gt;
            total.value = gt; //เก็บค่า รวมทั้งหมด 
           
        }

        subTotal();
    </script>


</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>สินค้าใส่ตระกร้าของฉัน</h1>
            </div>

            <!-- <form action="" method="POST" class="order"> -->
            <div class="col-lg-9">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">หมายเลข</th>
                            <th scope="col">ชื่ออาหาร</th>
                            <th scope="col">ราคาสินค้า</th>
                            <th scope="col">จำนวน</th>
                            <th scope="col">ราคารวม</th>
                            <!-- <th scope="col"></th> -->
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        // $total = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $sr = $key + 1;
                                // $total = $total + $value['price'];
                                // print_r($value);
                                echo "
                                <tr>
                                    <td>$sr</td>
                                    <td>$value[Cactusname]<input type='hidden' name='Cactusname'></td>
                                    <td>$value[Cactusprice] บาท<input type='hidden' name='Cactusprice' class='iprice' value='$value[Cactusprice]'></td>
                                    <td>
                                        <form action='manage_cart.php' method='POST'>
                                            <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
                                            <input type='hidden' name='Cactusname' value='$value[Cactusname]'>
                                         </form>
                                    </td>
                                    <td class='itotal'></td>
                                    <td>
                                    <form action='manage_cart.php' method='POST'>
                                        <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>ลบสินค้า</button>
                                        <input type='hidden' name='Cactusname' value='$value[Cactusname]'>
                                    </form>
                                    </td>
                                </tr>

                                ";
                            }
                        }
                        ?>
                        <!-- <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>                -->
                    </tbody>
                </table>
            </div>

            <div class="col-lg-3">
                <div class="border bg-light rounded p-4">

                    <form action="purchase.php" method="POST">
                        <h4>รวมทั้งหมด:</h4>

                        <!-- *************************************************************************************** -->
                        <p class="text-right" id="gtotal" name="gtotal"></p>
                        <input type="hidden" name="total" id="total">

                        <!-- ********************************************************* -->

                        <br>

                        <?php

                        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

                        ?>

                            <!-- <input type="hidden" name="order_date"> -->

                            <div class="form-group">
                                <b>ชื่อ-นามสกุล</b>
                                <input type="text" name="full_name" class="form-control" placeholder="กรอกชื่อ-นามสกุล" required>
                            </div>
                            <div class="form-group">
                                <b>เบอร์โทร</b>
                                <input type="number" name="phone_no" class="form-control" placeholder="กรอกเบอร์โทร" required>
                            </div>
                            <div class="form-group">
                                <b>ที่อยู่</b>
                                <input type="text" name="address" style="width: 205px; height: 100px;" class="form-control" placeholder="กรอกที่อยู่ ตำบล อำเภอ รหัสไปรษณีย์ จังหวัด" required>
                            </div>
                            <div class="form-group">
                                <b class="col-sm-10">
                                    เลือกวิธีส่งสินค้า
                                </b>

                                <div class="col-sm-20">
                                    <!-- onchange="sum();" เมื่อไหร่ก้ตามกดเข้า จะส่งไปให้ -->
                                    <input type="radio" name="send_type" id="ems1" onchange="sum();" value="10" required> ระยะทางส่ง 500 เมตร คิดค่าบริการ 10 บาท <br>

                                    <input type="radio" name="send_type" id="ems2" onchange="sum();" value="20" required> ระยะทางส่ง 1-2 กิโลเมตร คิดค่าบริการ 20 บาท <br>

                                    <input type="radio" name="send_type" id="ems3" onchange="sum();" value="30" required> ระยะทางส่ง 3-4 กิโลเมตร คิดค่าบริการ 30 บาท<br>

                                    <!-- <input type="radio" name="send_type" id="ems4"  onchange="sum();"  
                                                value="150" required> ส่งแบบ Kerry 150 บาท <br> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    รวม (บาท)
                                </div>
                                <div class="col-sm-20">
                                    <input type="text" id="grandTotal" name="grandTotal" readonly="readonly" class="form-control" required />
                                </div>
                            </div>
                            <!-- <div class="form-check">
                                <input class="form-check-input" type="radio" name="pay_mode" value="Ordered" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    จ่ายเงินสดในปลายทาง
                                </label>
                            </div>
                            <br>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="phase1"  value="10" checked>
                                <label class="form-check-label" for="exampleCheck1">ระยะทางส่ง 500 เมตร
                                    คิดค่าบริการ 10 บาท</label>
                            </div>
                            <br>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2" name="phase2" value="20">
                                <label class="form-check-label" for="exampleCheck1">ระยะทางส่ง 1-2 กิโลเมตร
                                    คิดค่าบริการ 20 บาท</label>
                            </div>
                            <br>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck3" name="phase3" value="30" >
                                <label class="form-check-label" for="exampleCheck1">ระยะทางส่ง 3-4 กิโลเมตร
                                    คิดค่าบริการ 30 บาท</label>
                            </div> -->
                            <br>
                            <button class="btn btn-primary btn-block" name="purchase">ยืนยันทำการสั่งซื้อ</button>
                    </form>
                <?php
                        }
                ?>
                </div>
            </div>

            <!-- </form> -->
            <!-- <div>
                <?php
                //CHeck whether submit button is clicked or not
                // if (isset($_POST['submit'])) {
                //     // Get all the details from the form
                //     $food = $_POST['title'];
                //     $price = $_POST['price'];
                //     $qty = $_POST['qty'];
                //     $total = $price * $qty; // total=pricexqty
                //     $order_date = date("Y-m-d h:i:sa"); //Order DAte 
                //     $status = "Ordered"; // Ordered, On Delivery, Delivered, Cancelled
                //     $customer_name =  $_POST['full-name'];
                //     $customer_contact = $_POST['contact'];
                //     $customer_email = $_POST['email'];
                //     $customer_address =  $_POST['address'];


                //     //Save the Order in Databaase
                //     //Create SQL to save the data
                //     $sql2 = "INSERT INTO tbl_orders SET 
                //         food = '$food',
                //         price = $price,
                //         qty = $qty,
                //         total = $total,
                //         order_date = '$order_date',
                //         status = '$status',
                //         customer_name = '$customer_name',
                //         customer_contact = '$customer_contact', 
                //         customer_email = '$customer_email',
                //         customer_address = '$customer_address' 
                //         ";

                //     // echo $sql2;
                //     // die(); //ตรวจสอบก่อน
                //     //Execute the Query
                //     $res2 = mysqli_query($conn, $sql2);

                //     if ($res2 == true) {

                //         $_SESSION['order'] = "<div class='success text-center'>อาหารที่สั่งสำเร็จ.</div>";
                //         header('location:' . SITEURL);
                //     } else {

                //         $_SESSION['order'] = "<div class='error text-center'>สั่งอาหารไม่สำเร็จ.</div>";
                //         header('location:' . SITEURL);
                //     }
                // }


                ?>
            </div> -->
        </div>
    </div>
    <!-- </div>
    </div> -->
    
    <script type="text/javascript">
        function sum() {
       //alert (gtotal);
            // var ประกาศตัวเเปร
            // var priceTotal = 2000; //ราคาราคาสินค้า + กับค่าส่ง
            var total = document.getElementById('total').value;
            var grandTotal = document.getElementById('grandTotal').value;
            alert(total);
            if (document.getElementById('ems1').checked) { //ถ้ามีการคลิกเข้า checked ถึงจะส่งไปทำงาน
                var ems1 = document.getElementById('ems1').value;
                var result = parseInt(total) + parseInt(ems1);
                document.getElementById('grandTotal').value = result; //ส่งค่าไปเเสดงที่ id :: grandTotal
            } else if (document.getElementById('ems2').checked) { //ถ้ามีการคลิกเข้า checked ถึงจะส่งไปทำงาน
                var ems2 = document.getElementById('ems2').value;
                var result = parseInt(gtotal) + parseInt(ems2);
                document.getElementById('grandTotal').value = result; //ส่งค่าไปเเสดงที่ id :: grandTotal
            } else if (document.getElementById('ems3').checked) { //ถ้ามีการคลิกเข้า checked ถึงจะส่งไปทำงาน
                var ems3 = document.getElementById('ems3').value;
                var result = parseInt(gtotal) + parseInt(ems3);
                document.getElementById('grandTotal').value = result; //ส่งค่าไปเเสดงที่ id :: grandTotal
            }

            //   else if(document.getElementById('ems4').checked){ //ถ้ามีการคลิกเข้า checked ถึงจะส่งไปทำงาน
            //         var ems4 = document.getElementById('ems4').value;
            //         var result = parseInt(priceTotal)+parseInt(ems4);
            //         document.getElementById('grandTotal').value = result;  //ส่งค่าไปเเสดงที่ id :: grandTotal
            //   }

        } //close func
    </script>

    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');
        var total = document.getElementById('total');
        // var exampleCheck1 = document.getElementById('exampleCheck1');
        // var exampleCheck2 = document.getElementById('exampleCheck2');
        // var exampleCheck3 = document.getElementById('exampleCheck3');

        function subTotal() {
            gt = 0;
            for (i = 0; i < iprice.length; i++) {
                // exampleCheck1 = 10;
                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value) 
                gt = gt + (iprice[i].value) * (iquantity[i].value) ;

                // + (exampleCheck1);ems1
                // price 650  iquantity  1 gt=0+(650*1)
                // price 750  iquantity  2 gt=650+(750*2)    === gt=2150
                // price 850  iquantity  1 gt=2150+(850*1)   ==== gt=3000
            }
            gtotal.innerText = gt;
            total.value = gt; //เก็บค่า รวมทั้งหมด 
           
        }

        subTotal();
    </script>


</body>

</html>