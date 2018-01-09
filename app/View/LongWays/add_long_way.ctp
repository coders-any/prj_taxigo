<script type="text/javascript">
    $(document).ready(function() {
        $(".placepicker").placepicker();
    });
</script>
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
        <form action="/longways/add_long_way"  method="post" accept-charset="utf-8">
            <div class="col-xs-6 col-md-6">
                <div class="form-group">
                    <label>Tiêu đề (*)</label>
                    <div class="input text">
                        <input name="title" class="form-control" type="text" required="required" value="">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Tag (tag1,tag2)</label>
                    <div class="input text required">
                        <input name="tag" class="form-control" type="text"  value="">
                    </div>
                </div>

                <div class="form-group">
                    <label>Có phải xe tiện chuyến (*)</label>
                    <div class="input text required">
                        <input name="is_car_discount" type="radio"  value="1"  > Đúng
                        <input name="is_car_discount" type="radio"  value="0" checked > Sai
                    </div>
                </div>
                <div class="clearfix"></div>

            </div>
            <div class="col-xs-6 col-md-6">
                <div class="form-group">
                    <label>Điểm đi (*)</label>
                    <div class="input text ">
                        <input name="place_start" class="form-control placepicker" type="text" required="required"  value="" placeholder="Hồ Hoàn Kiếm, Hà Nội, Việt Nam">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Điểm đến (*)</label>
                    <div class="input text required">
                        <input name="place_end" class="form-control placepicker" type="text" required="required" value="" placeholder="UBND tỉnh Nam Định, Vị Hoàng, Nam Định, Việt Nam">
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Ảnh minh họa (*)</label>
                    <div class="input text required">
                        <input name="image" type="text"  value="" id="Image" style="width: 50%;float: left">
                        <input type="button" value="Upload" onclick="BrowseServer();" style="float: left"/>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-12 col-xs-12">
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Nội dung (*)</label>
                    <div class="input text required">
                        <textarea style="width: 100%;" name="content" id="noidung1"></textarea>
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
