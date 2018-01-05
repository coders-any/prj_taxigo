<script language="javascript" src="/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".placepicker").placepicker();
    });
</script>
<div class="row accounts form white">
    <div class="col-xs-12 col-md-12">
        <form action="/longways/add_long_way"  method="post" accept-charset="utf-8">
            <div class="form-group col-md-4">
                <label>Tiêu đề (*)</label>
                <div class="input text">
                    <input name="title" class="form-control" type="text" required="required" value="">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-4">
                <label>Điểm đi (*)</label>
                <div class="input text ">
                    <input name="place_start" class="form-control placepicker" type="text" required="required"  value=""> (Hồ Hoàn Kiếm, Hà Nội, Việt Nam)
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-4">
                <label>Điểm đến (*)</label>
                <div class="input text required">
                    <input name="place_end" class="form-control placepicker" type="text" required="required" value=""> (UBND tỉnh Nam Định, Vị Hoàng, Nam Định, Việt Nam)
                </div>
            </div>
            <div class="form-group col-md-4">
                <label>Điểm đến (*)</label>
                <div class="input text required">
                    <textarea id="summary"></textarea>
                    <script type="text/javascript">CKEDITOR.replace('summary'); </script>
                    <input name="place_end" class="form-control placepicker" type="text" required="required" value=""> (UBND tỉnh Nam Định, Vị Hoàng, Nam Định, Việt Nam)
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
