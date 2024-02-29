<form method="post" autocomplete="off" action="<?= BASE_URL ?>/login/authentication_login">
    <?php
    if (isset($msg)) {
        echo "<span style='color:blue;font-weight:bold' >$msg </span>";
    }
    ?>
    <!-- Section: Design Block -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <form>
                <div class="card">
                    <div class="card-header">
                        <h1>Đăng Nhập ADMIN</h1>
                    </div>

                    <div class="card-body">
                        <input type="text" id="login" class="form-control mt-2" name="username" placeholder="login">
                        <input type="password" id="password" class="form-control mt-2" name="password" placeholder="password">
                    </div>

                    <div class="card-footer text-muted">
                        <input type="submit" class="btn btn-info" value="Log In">

                    </div>
                </div>
            </form>
        </div>
    </div>
</form>