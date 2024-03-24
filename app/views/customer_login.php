<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo "<script> alert('$value'); </script>";
    }
}
?>
<div class="container">
    <div class="col-md-6">
        <form autocomplete="off" name="FormDatHang" method="post" action="<?= BASE_URL ?>/user/insert_user">
            <h1 style="text-align: center; margin-top: 10px;">ĐĂNG KÍ</h1>
            <div class="content-box_contact">
                <div class="row">
                    <div class="input">
                        <label>Họ và tên: <span style=" color:red;">*</span></label>
                        <input type="text" class="form-control" name="txtHoTen" required class="clsip">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row">
                    <div class="input">
                        <label>Số điện thoại: <span style="color:red;">*</span></label>
                        <input class="form-control" type="text" class="form-control" name="txtDienThoai" required onkeydown="return checkIt(event)" class="clsip">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row">
                    <div class="input">
                        <label>Địa chỉ: <span style="color:red;">*</span></label>
                        <input class="form-control" type="text" name="txtDiaChi" required class="clsip">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row">
                    <div class="input">
                        <label>Email: <span style="color:red;">*</span></label>
                        <input class="form-control" type="email" name="txtEmail" onchange="return KiemTraEmail(this);" required class="clsip">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row">
                    <div class="input">
                        <label>Password: <span style="color:red;">*</span></label>
                        <input class="form-control" type="password" name="password" required class="clsip">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row">
                    <div class="input">
                        <label>Confirm Password: <span style="color:red;">*</span></label>
                        <input class="form-control" type="password" name="passwordConfirm" required class="clsip">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row btnclass">
                    <div class="input ipmaxn ">
                        <input type="submit" class="btn-gui" name="frmSubmit" id="frmSubmit" value="Đăng kí tài khoản">
                        <input type="reset" class="btn-gui" value="Nhập lại">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form autocomplete="off" name="FormDatHang" method="post" action="<?= BASE_URL ?>/user/login">
            <div class="content-box_contact">
                <h1 style="text-align: center; margin-top: 10px;">ĐĂNG NHẬP</h1>
                <div class="row">
                    <div class="input">
                        <label>Username: <span style="color:red;">*</span></label>
                        <input class="form-control" type="text" name="username" required class="clsip">
                    </div>
                    <div class="clear"></div>
                </div>
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
                        <input type="submit" class="btn-gui" name="frmSubmit" id="frmSubmit" value="Đăng Nhập">
                        <input type="reset" class="btn-gui" value="Nhập lại">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </form>
    </div>
</div>
<!-- <div class="bg_in">
    <div style="background-color :  aqua;" class="contact_form">
        <div class="contact_left" style="margin-left: px;">
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
                    <div class="row">
                        <div class="input">
                            <label>Số điện thoại: <span style="color:red;">*</span></label>
                            <input class="form-control" type="text" class="form-control" name="txtDienThoai" required onkeydown="return checkIt(event)" class="clsip">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <label>Địa chỉ: <span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="txtDiaChi" required class="clsip">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <label>Email: <span style="color:red;">*</span></label>
                            <input class="form-control" type="email" name="txtEmail" onchange="return KiemTraEmail(this);" required class="clsip">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <label>Password: <span style="color:red;">*</span></label>
                            <input class="form-control" type="password" name="password" required class="clsip">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <label>Confirm Password: <span style="color:red;">*</span></label>
                            <input class="form-control" type="password" name="passwordConfirm" required class="clsip">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="row btnclass">
                        <div class="input ipmaxn ">
                            <input type="submit" class="btn-gui" name="frmSubmit" id="frmSubmit" value="Đăng kí tài khoản">
                            <input type="reset" class="btn-gui" value="Nhập lại">
                        </div>
                        <div class="clear"></div>
                    </div>
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
                        <div class="clear"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<div class="clear"></div>