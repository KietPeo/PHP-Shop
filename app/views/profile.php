<form action="<?= BASE_URL ?>/user/update_info" method="post">
    <div class="row">
        <!-- Hiển thị thông tin từ SESSION -->
        <div class="col-md-6 mt-2">
            <?php if (isset($_SESSION['customer'])) { ?>
                <h2 style="text-align: center;">Thông Tin Cá Nhân</h2><br>
                <div class="container">
                    <label for="profile_name">Tên</label>
                    <span><?= $_SESSION['custumer_name'] ?></span>
                </div>
                <div class="container">
                    <label for="profile_phone">Số Điện Thoại</label>
                    <span><?= $_SESSION['custumer_phone'] ?></span>
                </div>
                <div class="container">
                    <label for="profile_email">Email</label>
                    <span><?= $_SESSION['custumer_email'] ?></span>
                </div>
                <div class="container">
                    <label for="profile_address">Địa Chỉ</label>
                    <span><?= $_SESSION['custumer_address'] ?></span>
                </div>
            <?php } ?>
        </div>
        <!-- Cập nhật thông tin mới -->
        <div class="col-md-6 mb-2 mt-2">
            <h2 style="text-align: center;">Cập Nhật Thông Tin</h2>
            <div class="container">
                <label for="update_name">Tên</label>
                <input class="form-control" type="text" id="update_name" name="update_name" value="<?= isset($_SESSION['custumer_name']) ? $_SESSION['custumer_name'] : '' ?>">
            </div>
            <div class="container">
                <label for="update_phone">Số Điện Thoại</label>
                <input class="form-control" type="text" id="update_phone" name="update_phone" value="<?= isset($_SESSION['custumer_phone']) ? $_SESSION['custumer_phone'] : '' ?>">
            </div>
            <div class="container">
                <label for="update_email">Email</label>
                <input class="form-control" type="email" id="update_email" name="update_email" value="<?= isset($_SESSION['custumer_email']) ? $_SESSION['custumer_email'] : '' ?>">
            </div>
            <div class="container">
                <label for="update_address">Địa Chỉ</label>
                <input class="form-control" type="text" id="update_address" name="update_address" value="<?= isset($_SESSION['custumer_address']) ? $_SESSION['custumer_address'] : '' ?>">
            </div>
            <!-- <button class="btn btn-info " name="update" type="submit">Cập Nhật</button> -->
        </div>
    </div>
</form>
