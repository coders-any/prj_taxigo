<div class="login-box">
    <div class="login-logo">
        <img src="/img/logo.png" width="240">
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">VUI LÒNG ĐĂNG NHẬP</p>
        <?php echo $this->Session->flash("error"); ?>
        <form action="/login" id="UserAdminLoginForm" method="post" accept-charset="utf-8">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="data[User][email]" id="UserEmail"
                       placeholder="Nhập tài khoản" value="<?php echo isset($_COOKIE['usr']) ? $_COOKIE['usr'] : ''; ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="data[User][password]" id="UserPassword"
                       placeholder="Nhập mật khẩu " value="<?php echo isset($_COOKIE['pwd']) ? $_COOKIE['pwd'] : ''; ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck" style="font-size: 12px;">
                        <label>
                            <input type="checkbox" name="data[User][remember]" checked="checked" value="1">
                            Ghi nhớ tài khoản và mật khẩu
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                </div><!-- /.col -->
            </div>

        </form>
    </div><!-- /.login-box-body -->
</div>

