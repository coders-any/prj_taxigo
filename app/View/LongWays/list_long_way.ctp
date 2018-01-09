<div class="row white " style="background: #fff;padding: 20px 20px;">
    <div class="add-new">
        <a href="/longways/add_long_way"><span class="btn btn-primary btndf_button">Thêm</span></a>
    </div>
    <div class="content-auto">
        <table class="table table-hover" style="margin-top: 40px">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên chuyến xe</th>
                <th>Xe tiện chuyến</th>
                <th>Km</th>
                <th>Phí cầu đường</th>
                <th>Giá xe 5 chỗ</th>
                <th>Giá xe 7 chỗ</th>
                <th>Giá xe 16 chỗ</th>
                <th>Giá xe tiện chuyến</th>
                <th>Lựa chọn</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(!empty($data)){
                foreach ($data as $key=>$value){

                    ?>
                    <tr>
                        <td style="width: 7%;"><?php echo $key+1;?></td>
                        <td style="word-break: break-all;"><?php echo @$value['LongWay']['title'];?></td>
                        <td style="text-align:center;width: 2%;">
                            <?php
                            if($value['LongWay']['is_car_discount'] == 1){
                                echo "<i style='color:#009355' class='glyphicon glyphicon-ok'></i>";
                            }else{
                                echo "<i style='red' class='glyphicon glyphicon-remove'></i>";
                            }
                            ?>
                        </td>
                        <td style="word-break: break-all;color:red"><?php echo @$value['LongWay']['km'];?></td>
                        <td style="word-break: break-all;color:red"><?php echo @number_format($value['LongWay']['road_prices']).'đ';?></td>
                        <td style="word-break: break-all;color:red"><?php echo @number_format($value['LongWay']['price_seat_number_5']).'đ';?></td>
                        <td style="word-break: break-all;color:red"><?php echo @number_format($value['LongWay']['price_seat_number_7']).'đ';?></td>
                        <td style="word-break: break-all;color:red"><?php echo @number_format($value['LongWay']['price_seat_number_16']).'đ';?></td>
                        <td style="word-break: break-all;color:red"><?php echo @number_format($value['LongWay']['price_car_discount']).'đ';?></td>
                        <td >
                            <a href="/longways/edit_long_way/<?php echo @$value['LongWay']['id'];?>"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                            <a href="/longways/delete_long_way/<?php echo $value['LongWay']['id'];?>" onclick="confirm('Are you sure');"><span class="btn btn-default btndf_button">Xóa</span></a>
                        </td>

                    </tr>
                <?php }
            }?>
            </tbody>

        </table>
        <p>(*)Hiển thị : Giá xe 5,7,16 chỗ và xe tiện chuyến "chưa cộng phí cầu đường"</p>
    </div>
</div>
</div>