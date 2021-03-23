
<script> 
  function XoaSP()
  {
    var xoa=confirm("Bạn có chắc muốn xóa sản phẩm này");
    return xoa;
  }
</script>  
      <div class="MRight">
        <div class="navM">
          <div class="navMLeft">
            <a href="quantri.php?Page_layout=themsp"><button type="button" class="btn btn-primary"><i class="icon1 fa fa-plus" aria-hidden="true"></i>Thêm Sản Phẩm</button></a>
          </div>
          <div class="navMRight">
                <form class="form-inline" action="">
                  <input class="form-control mr-sm-2" type="text" placeholder="Tìm Kiếm Sản Phẩm">
                  <button class="btn btn-success" type="submit">Search</button>
                </form>
          </div>
        </div>
        <div class="menuM"></div>
          <table class="tb" style="width:100%">
            <tr style="height: 40px;">
              <th style="text-align: center; width: 5%;">Tên Sản Phẩm</th>
              <th style="text-align: center; width: 25%;">Tên Sản Phẩm</th>
              <th style="text-align: center; width: 15;">Giá</th>
              <th style="text-align: center; width: 14%;">Nhà Cung Cấp</th>
              <th style="text-align: center; width: 28%;">Ảnh Mô Tả</th>
              <th style="text-align: center; width: 8%;">Sửa</th>
              <th style="text-align: center; width: 8%;">Xóa</th>
            </tr>
            <?php while($row=mysqli_fetch_array($thuchien)) {?>
            <tr>
              <td style="text-align: center;"><?php echo $row["IdSp"];?></td>
              <td style="text-align: center;"><a href=""><?php echo $row["TenSp"];?></a></td>
              <td style="text-align: center;"><?php echo $row["Gia"];?></td>
              <td style="text-align: center;"><?php echo $row["TenLoai"];?></td>
              <td style="text-align: center;"><img width="180px" height="170px" src="anh/<?php echo $row["Anh"];?>" alt=""></td>
              <td style="text-align: center;"><a href="quantri.php?Page_layout=suasp&IdSp=<?php echo $row["IdSp"]?>"><i class="fa fa-wrench" aria-hidden="true"></i></a></td>
              <td style="text-align: center;"><a onclick="return XoaSP();" href="xoasp.php?IdSp=<?php echo $row["IdSp"]?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
            </tr>
            <?php } ?>
          </table>
      </div>