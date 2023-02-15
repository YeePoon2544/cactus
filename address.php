<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>


  <title> address &mdash; ที่อยู่ </title>
</head>
<style>
  body {
    font-family: 'Prompt', sans-serif;

  }
  .product-grid ,.add-address{
    margin-top: 10%;
  }

  .heading-title {
    font-size: 1.4rem;
    font-weight: bold;
}


.modal-content {
    background-color:  #EEEEEE   ;
}

.select-disabled:hover {
    cursor: not-allowed;
}

.text-input-address {
    border: 0;
    padding: 0.4rem 1rem;
    width: 100%;
    border-radius: 4px;
    background-color: white;
    border: 1px solid gainsboro;
    margin: 0.2rem 0;
    outline: none;
}

.text-input-address:focus {
    border: 1px solid #2196F3;
}

.text-input-address::placeholder {
    color: #BDC3C7;
}

.text-input-address:focus::placeholder {
    color: gainsboro;
}


.select-option-address {
    width: 100%;
    border: 1px solid gainsboro;
    padding: 0.4rem 1rem;
    border-radius: 4px;
    margin: 0.2rem 0;
    outline: none;
}

.select-option-address>option {
    font-weight: bold;
}



.text-address-label {
    color: #1565C0;
    font-size: 1.2rem;
    font-weight: bold;
}


.action-btn {
    outline: 0;
    padding: 0.4rem 1rem;
    border: 0;
    border-radius: 4px;
    font-weight: bold;
}

.action-btn:hover {
    cursor: pointer;
    filter: brightness(80%);
}

#submit-address {
    background-color: #1565C0;
    color: white;
}

#cancel-submit {
    color: white;
    background-color: #34495E;
}

#delete-address {
    color: var(--bg-primary);
    border: none;
    background: none;
}

.edit-address {
    color: #34495E;
    background: none;
}


.address-empty {
    margin-top: 1rem;
    color: #566573 ;
    font-weight: bold;
    padding: 0 1rem;
}

</style>

<body>

  <div id="product-grid">
  <?php
$sql = "SELECT * FROM user_address WHERE user_id='$my_user_id'";
$result =     $mysqli->query($sql);
$num_row = $result->num_rows;

?>
  <main>
    <button id="add-address" class="add-address action-btn" data-action="add">
        เพิ่มที่อยู่
    </button>
    <?php if ($num_row == 0) { ?>
        <p class="address-empty" id="">ไม่มีที่อยู่</p>
    <?php  } else if ($num_row >= 1) { ?>

        <div>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <?php $name =  trim($row['firstname']) . ' ' . trim($row['lastname']);
                $province =  trim($row['province']);
                $district = trim($row['district']);
                $sub_district = trim($row['sub_district']);
                $post_code = trim($row['postcode']);
                $detail = trim($row['detail']);
                $phone = trim($row['phone']);
                $address_no = $row['no'];
                $add_default = '';
                if ($province == 'กรุงเทพมหานคร') {
                    $district = "เขต$district";
                    $sub_district = "แขวง$sub_district";
                } else if ($province != 'กรุงเทพมหานคร') {
                    $district = "อำเภอ $district";
                    $sub_district = "ตำบล $sub_district";
                }


                if (($row['address_default'] == 'default')) {
                    $add_default = 'ค่าเริมต้น';
                } else {
                    $add_default = '';
                }
                ?>

                <div class="address-s" data-no="<?php echo $address_no ?>">
                    <div class="text-view">
                        <span>ชื่อ</span>
                        <span>
                            <?php echo $name ?>
                        </span>
                    </div>
                    <div class="text-view">
                        <span>เบอร์</span>
                        <span> <?php echo $phone  ?> </span>
                    </div>

                    <div class="text-view">
                        <span><?php echo $detail   ?></span>
                        <small>
                            <?php echo $sub_district   ?>
                            <?php echo $district   ?>
                            <?php echo $province   ?>
                            <?php echo $post_code   ?>
                        </small>
                    </div>
                    <div class="action-bar">
                        <?php if (!empty($add_default)) { ?>
                            <span class="default-address">
                                <?php echo $add_default ?>
                            </span>
                        <?php     } else if (empty($add_default)) { ?>
                            <button type="button" class="set-default-address" data-no="<?php echo $address_no ?>">
                                ตั้งเป็นค่าเริ่มต้น
                            </button>
                        <?php     }  ?>
                        <button type="button" class="edit-address action-btn" data-no="<?php echo $address_no ?>" data-action="edit">
                            แก้ไข
                        </button>
                        <button type="button" class="delete-address action-btn" id="delete-address" data-no="<?php echo $address_no ?>">
                            ลบ
                        </button>
                    </div>
                </div>
            <?php            }   ?>
        </div>
    <?php }  ?>
    </div>
</main>
  
  </div>



</body>


</html>