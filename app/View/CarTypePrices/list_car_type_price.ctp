<div class="row accounts form white">

    <div class="col-xs-12 col-md-12">
        <form action="/cartypeprices/list_car_type_price"  method="post" accept-charset="utf-8">
            <input type="hidden" name="id" value="<?php if(isset($data['CarTypePrice']['id'])){echo $data['CarTypePrice']['id'];}?>">
            <div class="form-group col-md-4">
                <label>Lựa chọn loại xe (*)</label>
                <div class="input text">
                    <select class="form-control" name="type" required>
                        <option >Lựa chọn</option>
                        <?php
                            if(!empty($listCar['Car'])){
                                foreach ($listCar['Car'] as $car){
                                    if(isset($data['CarTypePrice']['type']) && $car['id']==$data['CarTypePrice']['type']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = '';
                                    }
                                    ?>
                                    <option value="<?php echo $car['id']?>" <?php echo $selected;?>><?php echo $car['name']?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-3">
                <label>Quãng đường  0-30 Km (*)</label>
                <div class="input text">
                    <input name="distance1" class="form-control" type="text" required="required" value="<?php if(isset($data['CarTypePrice']['distance1'])){echo $data['CarTypePrice']['distance1'];}?>" placeholder="Nhập giá 0-30 Km">
                </div>
            </div>
            <div class="form-group col-md-3">
                <label>Quãng đường  31-60 Km (*)</label>
                <div class="input text">
                    <input name="distance2" class="form-control" type="text" required="required" value="<?php if(isset($data['CarTypePrice']['distance2'])){echo $data['CarTypePrice']['distance2'];}?>" placeholder="Nhập giá 31-60 Km">
                </div>
            </div>
            <div class="form-group col-md-3">
                <label>Quãng đường  61-80 Km (*)</label>
                <div class="input text">
                    <input name="distance3" class="form-control" type="text" required="required" value="<?php if(isset($data['CarTypePrice']['distance3'])){echo $data['CarTypePrice']['distance3'];}?>" placeholder="Nhập giá 60-80 Km">
                </div>
            </div>
            <div class="form-group col-md-3">
                <label>Quãng đường  > 80 Km (*)</label>
                <div class="input text">
                    <input name="distance4" class="form-control" type="text" required="required" value="<?php if(isset($data['CarTypePrice']['distance4'])){echo $data['CarTypePrice']['distance4'];}?>" placeholder="Nhập giá >80 Km">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-2">
                <button class="btn btn-primary btndf_button" id="submit" type="submit">Lưu</button>
            </div>
        </form>
        <div class="content-auto">
            <table class="table table-hover" style="margin-top: 40px">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Loại xe</th>
                    <th>Giá 0-30 Km</th>
                    <th>Giá 31-60 Km</th>
                    <th>Giá 61-80 Km</th>
                    <th>Giá >80 Km</th>
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
                            <td style="word-break: break-all;"><?php echo $listCar['Car'][$value['CarTypePrice']['type']]['name'];?></td>
                            <td style="word-break: break-all;"><?php echo number_format($value['CarTypePrice']['distance1']).'đ';?></td>
                            <td style="word-break: break-all;"><?php echo number_format($value['CarTypePrice']['distance2']).'đ';?></td>
                            <td style="word-break: break-all;"><?php echo number_format($value['CarTypePrice']['distance3']).'đ';?></td>
                            <td style="word-break: break-all;"><?php echo number_format($value['CarTypePrice']['distance4']).'đ';?></td>
                            <td style="width: 29%;">
                                <a href="/cartypeprices/list_car_type_price/<?php echo @$value['CarTypePrice']['id'];?>"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                                <a href="/cartypeprices/delete_road_price/<?php echo $value['CarTypePrice']['id'];?>" onclick="confirm('Are you sure');"><span class="btn btn-default btndf_button">Xóa</span></a>
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