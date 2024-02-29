<div class="container">
    <div class="row">
        <div class="col-md-4 login-sec">
            <form action="<?= BASE_URL ?>/user/updatepass" class="login-form" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-uppercase">New Password</label>
                    <input type="password" class="form-control" name="pasnew1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-uppercase">Repeat Password</label>
                    <input type="password" class="form-control" name="pasnew2">
                </div>
                <div class="form-check">
                    <input type="submit" name="submit_reset">
                    <input type="reset" class="btn-gui" value="Nhập lại">
                </div>
            </form>
        </div>
    </div>
</div>