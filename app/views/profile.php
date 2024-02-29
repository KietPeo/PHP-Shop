<form action="">
    <div class="row">
        <!-- Hiển thị thông tin từ SESSION -->
        <div class="col-md-6">
            <?php if (isset($_SESSION['customer'])) { ?>
                <h2 style="text-align: center;">Thông Tin Cá Nhân</h2><br>
                <!-- <img src="" alt=""> -->
                <label style="text-align: center;" for="">Tên</label>
                <?= $_SESSION['custumer_name'] ?><br>
                <label style="text-align: center;" for="">Số Điện Thoại</label>
                <?= $_SESSION['custumer_phone'] ?><br>
                <label style="text-align: center;" for="">Email</label>
                <?= $_SESSION['custumer_email'] ?><br>
                <label style="text-align: center;" for="">Địa Chỉ</label>
                <?= $_SESSION['custumer_address'] ?>
            <?php } ?>
        </div>
        <!-- Cập nhật thông tin mới -->
        <div class="col-md-6">
            <h2>Cập Nhật Thông Tin</h2>
            <form autocomplete="off" name="updateForm" method="post" action="<?= BASE_URL ?>/user/update_info">
                <div class="container">
                    <label for="update_name">Tên</label>
                    <input style="width: 710px;" class="form-control" type="text" id="update_name" name="update_name" value="<?= isset($_SESSION['custumer_name']) ? $_SESSION['custumer_name'] : '' ?>">
                </div>
                <div class="container">
                    <label for="update_phone">Số Điện Thoại</label>
                    <input style="width: 710px;" class="form-control" type="text" id="update_phone" name="update_phone" value="<?= isset($_SESSION['custumer_phone']) ? $_SESSION['custumer_phone'] : '' ?>">
                </div>
                <div class="container">
                    <label for="update_email">Email</label>
                    <input style="width: 710px;" class="form-control" type="email" id="update_email" name="update_email" value="<?= isset($_SESSION['custumer_email']) ? $_SESSION['custumer_email'] : '' ?>">
                </div>
                <div class="container">
                    <label for="update_address">Địa Chỉ</label>
                    <input style="width: 710px;" class="form-control" type="text" id="update_address" name="update_address" value="<?= isset($_SESSION['custumer_address']) ? $_SESSION['custumer_address'] : '' ?>">
                </div>
                <button class="btn btn-info " type="submit">Cập Nhật</button>
            </form>
        </div>
    </div>
    <div class="clear"></div>
</form>