<div class="row accounts form white">
    <div class="col-xs-12">
        <form action="/users/add"  method="post" accept-charset="utf-8">
            <input name="data[User][id]" class="form-control" maxlength="50" type="hidden" id="full_name" value="<?php if(!empty($data['User']['id'])){echo $data['User']['id'];}?>">
            <div class="form-group col-md-4">
                <label>Họ và tên</label>
                <div class="input text"><input name="data[User][full_name]" class="form-control" maxlength="50" type="text" id="full_name" value="<?php if(!empty($data['User']['full_name'])){echo $data['User']['full_name'];}?>"></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-4">
                <label>Số điện thoại</label>
                <div class="input text "><input name="data[User][phone]" class="form-control" type="number" id="UserEmail" value="<?php if(!empty($data['User']['full_name'])){echo $data['User']['phone'];}?>"></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-4">
                <label>Email</label>
                <div class="input text required"><input name="data[User][email]" class="form-control" type="email" id="UserEmail" required="required" value="<?php if(!empty($data['User']['email'])){echo $data['User']['email'];}?>"></div>
            </div>
            <div class="clearfix"></div>

            <div class="form-group col-md-4">
                <label>Mật khẩu</label>
                <div class="input password required"><input name="data[User][password]" class="form-control" type="password" id="UserPassword" required="required" value="<?php if(!empty($data['User']['password'])){echo $data['User']['password'];}?>"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-2">
                <button class="btn btn-primary" id="submit" type="submit">Lưu</button>
            </div>
        </form>
    </div>
</div>
<style type="text/css">
    div.error-message{
        color:red;
    }
</style>
