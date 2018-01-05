<div class="row white " style="background: #fff;padding: 20px 20px;">
    <div class="add-new">
        <a href="/roadprices/add_road_price"><span class="btn btn-primary btndf_button">Thêm</span></a>
    </div>
    <div class="content-auto">
        <table class="table table-hover" style="margin-top: 40px">
            <thead>
            <tr>
                <th>STT</th>
                <th>Điểm bắt đầu (hoặc kết thúc)</th>
                <th>Điểm bắt đầu (hoặc kết thúc)</th>
                <th>Phí</th>
                <th>Lựa chọn</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(!empty($data)){
                foreach ($data as $key=>$value){
                    if($value['RoadPrice']['place_start']==1){
                        $city_start = 'Hà Nội';
                    }else if($value['RoadPrice']['place_start']==2){
                        $city_start = 'Sân bay nội bài';
                    }else{
                        $city_start = $listCity['City'][$value['RoadPrice']['place_start']]['name'];
                    }

                    if($value['RoadPrice']['place_end']==1){
                        $city_end = 'Hà Nội';
                    }else if($value['RoadPrice']['place_end']==2){
                        $city_end = 'Sân bay nội bài';
                    }else{
                        $city_end = $listCity['City'][$value['RoadPrice']['place_end']]['name'];
                    }
                    ?>
                    <tr>
                        <td style="width: 7%;"><?php echo $key+1;?></td>
                        <td style="word-break: break-all;"><?php echo @$city_start;?></td>
                        <td style="word-break: break-all;"><?php echo @$city_end;?></td>
                        <td style="word-break: break-all;"><?php echo number_format($value['RoadPrice']['price']).'đ';?></td>
                        <td style="width: 29%;">
                            <a href="/roadprices/edit_road_price/<?php echo @$value['RoadPrice']['id'];?>"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                            <a href="/roadprices/delete_road_price/<?php echo $value['RoadPrice']['id'];?>" onclick="confirm('Are you sure');"><span class="btn btn-default btndf_button">Xóa</span></a>
                        </td>

                    </tr>
                <?php }
            }?>
            </tbody>
        </table>

    </div>
</div>
</div>