<div class="row accounts form white">
    <div class="col-xs-12 col-md-12">
        <form action="/roadprices/add_road_price"  method="post" accept-charset="utf-8">
            <div class="form-group col-md-4">
                <label>Lựa chọn điểm (*)</label>
                <div class="input text">
                    <select class="form-control" name="place_start" required>
                        <option value="1">Hà Nội</option>
                        <option value="2">Sân bay nội bài</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label>Lựa chọn điểm (*)</label>
                <div class="input text">
                    <select class="form-control" name="place_end" required>
                        <option value="2">Sân bay nội bài</option>
                        <?php
                        if(!empty($listCity['City'])){
                            foreach ($listCity['City'] as $city){
                                ?>
                                    <option value="<?php echo $city['id']?>"><?php echo $city['name']?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-4">
                <label>Phí đường bộ (*)</label>
                <div class="input text">
                    <input name="price" class="form-control" type="text" required="required" value="">
                </div>
            </div>
        </form>
    </div>
</div>
<style type="text/css">
    div.error-message{
        color:red;
    }
</style>