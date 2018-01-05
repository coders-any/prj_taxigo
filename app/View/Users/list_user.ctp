<div class="row white " style="background: #fff;padding: 20px 20px;">
        <div class="add-new">
            <a href="/users/add"><span class="btn btn-primary btndf_button">Thêm</span></a>
        </div>
        <div class="content-auto">
            <table class="table table-hover" style="margin-top: 40px">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ và tên</th>
                    <th>Tài khoản</th>
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
                    <td style="word-break: break-all;"><?php echo @$value['User']['full_name'];?></td>
                    <td style="word-break: break-all;"><?php echo $value['User']['email'];?></td>
                    <td style="width: 29%;">
                        <a href="/users/add/<?php echo @$value['User']['id'];?>"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                        <a href="/users/delete/<?php echo $value['User']['id'];?>" onclick="confirm('Are you sure');"><span class="btn btn-default btndf_button">Xóa</span></a>
                    </td>

                </tr>
                <?php }
                    }?>
                </tbody>
            </table>

        </div>
    </div>
</div>