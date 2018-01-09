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
        <form action="/longways/edit_long_way"  method="post" accept-charset="utf-8">
            <input name="id" class="form-control" type="hidden" required="required" value="<?php if(isset($data['LongWay']['id'])) {echo $data['LongWay']['id'];}?>">
            <div class="col-xs-6 col-md-6">
                <div class="form-group">
                    <label>Tiêu đề (*)</label>
                    <div class="input text">
                        <input name="title" class="form-control" type="text" required="required" value="<?php if(isset($data['LongWay']['title'])) {echo $data['LongWay']['title'];}?>">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Tag (tag1,tag2)</label>
                    <div class="input text required">
                        <input name="tag" class="form-control" type="text"  value="<?php if(isset($data['LongWay']['tag'])) {echo $data['LongWay']['tag'];}?>">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Ảnh minh họa (*)</label>
                    <div class="input text required">
                        <input name="image" type="text"  value="<?php if(isset($data['LongWay']['image'])) {echo $data['LongWay']['image'];}?>" id="Image" style="width: 50%;float: left">
                        <input type="button" value="Upload" onclick="BrowseServer();" style="float: left"/>
                    </div>
                </div>
                <div class="clearfix"></div><br>
                <div class="form-group">
                    <label>Có phải xe tiện chuyến (*)</label>
                    <div class="input text required">
                        <input name="is_car_discount" type="radio"  <?php if(isset($data['LongWay']['is_car_discount']) && $data['LongWay']['is_car_discount'] == 1){echo "checked";}?> value="1"  > Đúng
                        <input name="is_car_discount" type="radio"  <?php if(isset($data['LongWay']['is_car_discount']) && $data['LongWay']['is_car_discount'] == 0){echo "checked";}?> value="0" > Sai
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-xs-6 col-md-6">
                <div class="form-group">
                    <label>Điểm đi (*)</label>
                    <div class="input text ">
                        <input name="place_start" class="form-control placepicker" type="text" required="required"  value="<?php if(isset($data['LongWay']['place_start_name'])) {echo $data['LongWay']['place_start_name'];}?>" placeholder="Hồ Hoàn Kiếm, Hà Nội, Việt Nam">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Điểm đến (*)</label>
                    <div class="input text required">
                        <input name="place_end" class="form-control placepicker" type="text" required="required" value="<?php if(isset($data['LongWay']['place_end_name'])) {echo $data['LongWay']['place_end_name'];}?>" placeholder="UBND tỉnh Nam Định, Vị Hoàng, Nam Định, Việt Nam">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group" style="width: 20%;float:left;">
                    <label>Km</label>
                    <div class="input text required">
                        <input  class="form-control" type="text" value="<?php if(isset($data['LongWay']['km'])) {echo $data['LongWay']['km'];}?>" readonly>
                    </div>
                </div>
                <div class="form-group" style="width: 20%;float:left;">
                    <label>Phí cầu đường</label>
                    <div class="input text required">
                        <input  class="form-control" type="text" value="<?php if(isset($data['LongWay']['road_prices'])) {echo number_format($data['LongWay']['road_prices']).'đ';}?>" readonly>
                    </div>
                </div>
                <?php
                if(isset($data['LongWay']['is_car_discount']) && $data['LongWay']['is_car_discount'] == 0){
                ?>
                <div class="form-group" style="width: 20%;float:left;">
                    <label>Giá xe 5 chỗ</label>
                    <div class="input text required">
                        <input  class="form-control" type="text" value="<?php if(isset($data['LongWay']['price_seat_number_5'])) {echo number_format($data['LongWay']['price_seat_number_5']).'đ';}?>" readonly>
                    </div>
                </div>
                <div class="form-group" style="width: 20%;float:left;">
                    <label>Giá xe 7 chỗ</label>
                    <div class="input text required">
                        <input  class="form-control" type="text" value="<?php if(isset($data['LongWay']['price_seat_number_7'])) {echo number_format($data['LongWay']['price_seat_number_7']).'đ';}?>" readonly>
                    </div>
                </div>
                <div class="form-group" style="width: 20%;float:left;">
                    <label>Giá xe 16 chỗ</label>
                    <div class="input text required">
                        <input  class="form-control" type="text" value="<?php if(isset($data['LongWay']['price_seat_number_16'])) {echo number_format($data['LongWay']['price_seat_number_16']).'đ';}?>" readonly>
                    </div>
                </div>
                <?php }else if(isset($data['LongWay']['is_car_discount']) && $data['LongWay']['is_car_discount']){?>
                    <div class="form-group" style="width: 20%;float:left;">
                        <label>Giá xe tiện chuyến</label>
                        <div class="input text required">
                            <input  class="form-control" type="text" value="<?php if(isset($data['LongWay']['price_car_discount'])) {echo number_format($data['LongWay']['price_car_discount']).'đ';}?>" readonly>
                        </div>
                    </div>
                <?php }?>

            </div>
            <div class="col-md-12 col-xs-12">
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>Nội dung (*)</label>
                    <div class="input text required">
                        <textarea style="width: 100%;" name="content" id="noidung1"><?php if(isset($data['LongWay']['content'])) {echo $data['LongWay']['content'];}?></textarea>
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
