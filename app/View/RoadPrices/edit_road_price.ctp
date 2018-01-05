<div class="row accounts form white">
    <div class="col-xs-12 col-md-12">
        <form action="/roadprices/edit_road_price"  method="post" accept-charset="utf-8">
            <input type="hidden" name="id"  value="<?php echo @$data['RoadPrice']['id'];?>">
            <div class="form-group col-md-4">
                <label>Lựa chọn điểm (*)</label>
                <div class="input text">
                    <select class="form-control" name="place_start" required>
                        <option value="1" <?php if(isset($data['RoadPrice']['place_start']) && $data['RoadPrice']['place_start']==1){echo 'selected';}?>>Hà Nội</option>
                        <option value="2" <?php if(isset($data['RoadPrice']['place_start']) && $data['RoadPrice']['place_start']==2){echo 'selected';}?>>Sân bay nội bài</option>
                        <?php
                        if(!empty($listCity['City'])){
                            foreach ($listCity['City'] as $city){
                                if($city['id'] == $data['RoadPrice']['place_start']){
                                    $selected = 'selected';
                                }else{
                                    $selected='';
                                }
                                ?>
                                <option value="<?php echo $city['id']?>" <?php echo @$selected;?>><?php echo $city['name']?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label>Lựa chọn điểm (*)</label>
                <div class="input text">
                    <select class="form-control" name="place_end" required>
                        <option value="2" <?php if(isset($data['RoadPrice']['place_end']) && $data['RoadPrice']['place_end']==2){echo 'selected';}?>>Sân bay nội bài</option>
                        <?php
                        if(!empty($listCity['City'])){
                            foreach ($listCity['City'] as $city){
                                if($city['id'] == $data['RoadPrice']['place_end']){
                                    $selected = 'selected';
                                }else{
                                    $selected='';
                                }
                                ?>
                                <option value="<?php echo $city['id']?>" <?php echo @$selected;?>><?php echo $city['name']?></option>
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
                    <input name="price" class="form-control" type="text" required="required" value="<?php if(isset($data['RoadPrice']['price'])){echo $data['RoadPrice']['price'];}?>">
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