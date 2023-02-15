<div class="modal" id="modal-address-form">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <p id="address-heading" class="heading-title">เพิ่มที่อยู่</p>
            </div>
            <div class="modal-body">
                <form id="address-form" data-action="" class="address-form">
                    <input type="text" name="fname" id="fname" placeholder="ชื่อ" class="text-input-address">
                    <input type="text" name="lname" id="lname" placeholder="นามสกุล" class="text-input-address">
                    <input type="text" name="phone" id="name" placeholder="เบอร์โทรศัพท์" class="text-input-address">

                    <label for="address" class="text-address-label">ที่อยู่</label>

                    <select name="province" id="province" class="select-option-address">
                        <option value="" selected>เลือกจังหวัด</option>
                        <?php
                        $p =  $mysqli->query('SELECT * FROM province')
                        ?>
                        <?php while ($province = $p->fetch_assoc()) { ?>
                            <option value="<?php echo $province['province']  ?>" data-province="<?php echo $province['province']   ?>">
                                <?php echo $province['province']  ?>
                            </option>
                        <?php   } ?>
                    </select>

                    <select name="district" id="district" class="select-option-address">
                        <option value="" selected>เลือกอำเภอ</option>
                    </select>
                    <select name="sub-district" id="sub-district" class="select-option-address">
                        <option value="" selected>เลือกตำบล</option>
                    </select>
                    <input type="hidden" name="postcode" class="text-input-address">
                    <label for="addressDetail" class="text-address-label">
                        รายละเอียดที่อยู่
                    </label>

                    <textarea name="address-detail" id="address-detail" class="text-input-address"></textarea>
                    <div style="margin-top:1rem ;">
                        <button type="button" class="action-btn" id="cancel-submit">
                            ยกเลิก
                        </button>

                        <button type="button" class="action-btn" id="submit-address" data-action="add">
                            บันทึก
                        </button>
                    </div>

            </div>
        </div>
        </form>

    </div>
</div>