<?php
include_once '../Controller/C_danhsachnv.php';
?>


    <div class="MRight">
        <div class="navM">
          <div class="navMLeft">
            <a href="V_quantri.php?Page_layout=themnv"><button type="button" class="btn btn-primary"><i class="icon1 fa fa-plus" aria-hidden="true"></i>Thêm Nhân Viên</button></a>
          </div>
         
        </div>
        <div class="menuM"></div>
          <table class="tb" style="width:100%">
            <tr style="height: 50px;">
              <th style="text-align: center; width: 5%;">Id Nhân Viên</th>
              <th style="text-align: center; width: 23%;">Tên Nhân Viên</th>
              <th style="text-align: center; width: 17%">Số Điện Thoại</th>
              <th style="text-align: center; width: 20%;">Email</th>
              <th style="text-align: center; width: 15%;">Chức Vụ</th>
              <th style="text-align: center; width: 10%;">Sửa</th>
              <th style="text-align: center; width: 10%;">Xóa</th>
            </tr>
            <?php while($row=mysqli_fetch_array($thuchien1)) {?>
            <tr style="height: 50px;">
              <td style="text-align: center;"><?php echo $row["IdTv"];?></td>
              <td style="text-align: center;"><a href=""><?php echo $row["TenTv"];?></a></td>
              <td style="text-align: center;"><?php echo '0'.$row["SoDienThoai"];?></td>
              <td style="text-align: center;"><?php echo $row["Email"];?></td>
              <td style="text-align: center;"><?php echo $row["ChucVu"];?></td>
              <td style="text-align: center;"><a href="V_quantri.php?Page_layout=suanv&IdTv=<?php echo $row["IdTv"]?>"><i class="fa fa-wrench" aria-hidden="true"></i></a></td>
              <td style="text-align: center;"><a onclick="return XoaNV();" href="V_xoanv.php?IdTv=<?php echo $row["IdTv"]?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
            </tr>
            <?php } ?>
          </table>
      </div>