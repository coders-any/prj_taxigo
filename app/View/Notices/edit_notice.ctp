<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
    function BrowseServer() {
        var finder = new CKFinder();
        //finder.basePath = '../';
        finder.selectActionFunction = SetFileField;
        finder.popup();
    }
    function SetFileField(fileUrl) {
        document.getElementById('Image').value = fileUrl;
    }
</script>
<div class="row accounts form white">
    <div class="col-xs-12 col-md-12">
        <form action="/notices/add_notice"  method="post" accept-charset="utf-8">
            <input type="hidden" name="id" value="<?php if(isset($data['Notice']['id'])){echo $data['Notice']['id'];}?>">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Tiêu đề (*)</label>
                    <div class="input text">
                        <input name="title" class="form-control" type="text" required="required" value="<?php if(isset($data['Notice']['title'])){echo $data['Notice']['title'];}?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Tag (tag1,tag2)</label>
                    <div class="input text">
                        <input name="tag" class="form-control" type="text"  value="<?php if(isset($data['Notice']['tag'])){echo $data['Notice']['tag'];}?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Tác giả</label>
                    <div class="input text">
                        <input name="author" class="form-control" type="text"  value="<?php if(isset($data['Notice']['author'])){echo $data['Notice']['author'];}?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh minh họa (*)</label>
                    <div class="input text required">
                        <input  name="image" type="text"  value="<?php if(isset($data['Notice']['image'])){echo $data['Notice']['image'];}?>" id="Image" style="width: 50%;float: left">
                        <input type="button" value="Upload" onclick="BrowseServer();" style="float: left"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Chuyên mục tin tức (*)</label>
                    <div class="input text">
                        <?php
                        if(!empty($cat_notice_data)){
                            foreach ($cat_notice_data as $cat){
                                $checked ='';
                                foreach ($data['CatNoticeNotice'] as $cat_notice) {
                                    var_dump($cat_notice['cat_notice_id']);
                                    var_dump($cat['CatNotice']['id']);die;
                                    if($cat_notice['cat_notice_id'] === $cat['CatNotice']['id']){
                                        $checked = 'checked';
                                    }
                                }
                                echo '<input type="checkbox" name="cat_notice_id[]"  required="required" checked="'.$checked.'" value="'.$cat['CatNotice']['id'].'"> '.$cat['CatNotice']['name'].' ';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả ngắn</label>
                    <div class="input text">
                        <textarea name="description" class="form-control" rows="8"><?php if(isset($data['Notice']['description'])){echo $data['Notice']['description'];}?></textarea>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-xs-12">
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <div class="input text required">
                        <textarea style="width: 100%;" name="content" id="noidung1"><?php if(isset($data['Notice']['content'])){echo $data['Notice']['content'];}?></textarea>
                        <script type="text/javascript">CKEDITOR.replace('noidung1');</script>
                    </div>
                </div>
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