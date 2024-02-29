<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo "<span style='color:blue;text-align: center font-weight:bold , justify-content: center' >$value</span>";
    }
}
?>
<section>
    <div class="bg_in">
        <div class="contact_form">
            <div class="contact_left">
                <form autocomplete="off" name="FormDatHang" method="post" action="<?= BASE_URL ?>/user/insert_user">
                    <h1>Đăng Kí</h1>
                    <div class="content-box_contact">
                        <div class="row">
                            <div class="input">
                                <label>Họ và tên: <span style=" color:red;">*</span></label>
                                <input type="text" class="form-control" name="txtHoTen" required class="clsip">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!---row---->
                        <div class="row">
                            <div class="input">
                                <label>Số điện thoại: <span style="color:red;">*</span></label>
                                <input class="form-control" type="text" class="form-control" name="txtDienThoai" required onkeydown="return checkIt(event)" class="clsip">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!---row---->
                        <div class="row">
                            <div class="input">
                                <label>Địa chỉ: <span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="txtDiaChi" required class="clsip">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!---row---->
                        <div class="row">
                            <div class="input">
                                <label>Email: <span style="color:red;">*</span></label>
                                <input class="form-control" type="email" name="txtEmail" onchange="return KiemTraEmail(this);" required class="clsip">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!---row---->
                        <div class="row">
                            <div class="input">
                                <label>Password: <span style="color:red;">*</span></label>
                                <input class="form-control" type="password" name="password" required class="clsip">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!---row---->
                        <div class="row">
                            <div class="input">
                                <label>Confirm Password: <span style="color:red;">*</span></label>
                                <input class="form-control" type="password" name="passwordConfirm" required class="clsip">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!---row---->
                        <div class="row btnclass">
                            <div class="input ipmaxn ">
                                <input type="submit" class="btn-gui" name="frmSubmit" id="frmSubmit" value="Đăng kí tài khoản">
                                <input type="reset" class="btn-gui" value="Nhập lại">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!---row---->
                        <div class="clear"></div>
                    </div>
                </form>
            </div>
            <div class="contact_right">
                <div class="form_contact_in">
                    <form autocomplete="off" name="FormDatHang" method="post" action="<?= BASE_URL ?>/user/login">
                        <div class="content-box_contact">
                            <h1>Đăng Nhập</h1>
                            <div class="row">
                                <div class="input">
                                    <label>Username: <span style="color:red;">*</span></label>
                                    <input class="form-control" type="text" name="username" required class="clsip">
                                </div>
                                <div class="clear"></div>
                            </div>
                            <!---row---->
                            <div class="row">
                                <div class="input">
                                    <label>Password: <span style="color:red;">*</span></label>
                                    <input class="form-control" type="password" name="password" required class="clsip">
                                </div>
                                <div class="clear"></div>
                            </div>
                            <a href="<?= BASE_URL ?>/user/forgetpass">Quên mật khẩu</a>
                            <div class="row btnclass">
                                <div class="input ipmaxn ">
                                    <input type="submit" class="btn-gui" name="frmSubmit" id="frmSubmit" value="Đăng Nhập" onclick="thongbao()">
                                    <input type="reset" class="btn-gui" value="Nhập lại">
                                </div>
                                <div class="clear"></div>
                            </div>
                            <!---row---->
                            <div class="clear"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clear"></div>
<script>
   function thongbao(message) {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: message,
        showConfirmButton: false,
        timer: 20000 // Thời gian hiển thị thông báo (milliseconds)
    })
    .then((result) => {
        // Sau khi hiển thị thông báo, chờ 2 giây rồi mới chuyển hướng trang
        setTimeout(() => {
            window.location.href = '<?= BASE_URL ?>';
        }, 20000);
    });
}

</script>