<div class="row white " style="background: #fff;padding: 20px 20px;">
    <div class="add-new">
        <a href="/notices/add_notice"><span class="btn btn-primary btndf_button">Thêm</span></a>
    </div>
    <div class="content-auto">
        <table class="table table-hover" style="margin-top: 40px">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Chuyên mục</th>
                <th>Lượt xem</th>
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
                        <td style="word-break: break-all;"><?php echo @$value['Notice']['title'];?></td>
                        <td style="word-break: break-all;">

                            <?php
                                if(!empty($cat_notice_data)){
                                    foreach ($cat_notice_data as $cat){
                                        foreach ($value['CatNoticeNotice'] as $cat_notice){
                                            if($cat_notice['cat_notice_id'] == $cat['CatNotice']['id']){
                                                echo '+ '.$cat['CatNotice']['name'].'<br/>';
                                            }

                                        }
                                    }

                                }
                            ?>
                        </td>
                        <td style="word-break: break-all;"><?php echo @$value['Notice']['views'];?></td>
                        <td >
                            <a href="/notices/edit_notice/<?php echo @$value['Notice']['id'];?>"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                            <a href="/notices/delete_notice/<?php echo $value['Notice']['id'];?>" onclick="confirm('Are you sure');"><span class="btn btn-default btndf_button">Xóa</span></a>
                        </td>

                    </tr>
                <?php }
            }?>
            </tbody>
        </table>

    </div>
</div>
</div>