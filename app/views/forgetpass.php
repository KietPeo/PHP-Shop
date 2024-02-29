<section class="login-block">
  <div class="container">
    <div class="row">
      <div class="col-md-4 login-sec">
        <form action="<?= BASE_URL ?>/user/sendmail" class="login-form" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-uppercase">Enter Email Address To Send Password Link</label>
            <input type="text" class="form-control" name="email" placeholder="">
          </div>
          <div class="form-check">
            <input type="submit" name="submit_email">
            <input type="reset" class="btn-gui" value="Nhập lại">
          </div>
        </form>
      </div>
    </div>
</section>