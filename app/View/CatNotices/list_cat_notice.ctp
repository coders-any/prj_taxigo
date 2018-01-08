<div class="row accounts form white">

    <div class="col-xs-12 col-md-8">
        <form action="/catnotices/list_cat_notice"  method="post" accept-charset="utf-8">
            <input type="hidden" name="id" value="<?php if(isset($data['CatNotice']['id'])){echo $data['CatNotice']['id'];}?>">
            <div class="form-group col-md-4">
                <label>Tên chuyên mục (*)</label>
                <div class="input text">
                    <input name="name" class="form-control" type="text" required="required" value="<?php if(isset($data['CatNotice']['name'])){echo $data['CatNotice']['name'];}?>" placeholder="Nhập tên chuyên mục">
                </div>
            </div>
            <div class="form-group col-md-4">
                <label></label>
                <button style="margin-top: 26px;" class="btn btn-primary btndf_button" id="submit" type="submit">Lưu</button>
            </div>
        </form>
        <div class="content-auto">
                <table class="table table-hover" >
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên chuyên mục</th>
<!--                        <th>Số bài viết của chuyên mục</th>-->
                        <th>Lựa chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(!empty($listData)){
                        foreach ($listData as $key=>$value){
                            ?>
                            <tr>
                                <td style="width: 7%;"><?php echo $key+1;?></td>
                                <td style="word-break: break-all;"><?php echo $value['CatNotice']['name'];?></td>
                                <td style="width: 29%;">
                                    <a href="/catnotices/list_cat_notice/<?php echo @$value['CatNotice']['id'];?>"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                                    <a href="/catnotices/delete_cat_notice/<?php echo $value['CatNotice']['id'];?>" onclick="confirm('Are you sure');"><span class="btn btn-default btndf_button">Xóa</span></a>
                                </td>

                            </tr>
                        <?php }
                    }?>
                    </tbody>
                </table>

            </div>
    </div>

</div>
<style type="text/css">
    div.error-message{
        color:red;
    }
</style>