<?php
include_once '../Controller/C_suasp.php';
?>
      <div class="MRight">
        <form action="" method="post" enctype="multipart/form-data">

        <h2>Update sản phẩm</h2>
                <label>Tên sản phẩm</label>
                <input type="text" class="form-control" id="tensp" name="tensp" value="<?php if(isset($_POST["tensp"])){echo $_POST["tensp"];} else {echo $row["TenSp"];}?>" required>
            
            
                <label>Tình trạng</label>
                <input type="text" class="form-control" id="tinhtrang" name="tinhtrang" value="<?php if(isset($_POST["tinhtrang"])){echo $_POST["tinhtrang"];} else {echo $row["TinhTrang"];}?>" required>
                     
            
                <label>Giá</label>
                <input type="text" class="form-control" id="gia" name="gia" value="<?php if(isset($_POST["gia"])){echo $_POST["gia"];} else {echo $row["Gia"];}?>" required>
                     
            
                <label>Khuyến mãi</label>
                <input type="text" class="form-control" id="khuyenmai" name="khuyenmai" value="<?php if(isset($_POST["khuyenmai"])){echo $_POST["khuyenmai"];} else {echo $row["KhuyenMai"];}?>" required>
                     
            
                <label>Bảo hành</label>
                <input type="text" class="form-control" id="baohanh" name="baohanh" value="<?php if(isset($_POST["baohanh"])){echo $_POST["baohanh"];} else {echo $row["BaoHanh"];}?>" required>   

                <label>Trạng thái</label>
                <select class="form-control" id="trangthai" name="trangthai" value="<?php if(isset($_POST["trangthai"])){echo $_POST["trangthai"];} else {echo $row["TrangThai"];}?>" required>
                    <option>Còn hàng</option>
                    <option>Hết hàng</option>
                </select>
                     
            
                <label>Nhà cung cấp</label>
                <select class="form-control" id="idloai" name="idloai" >
                    <?php
                    while($rowL=mysqli_fetch_array($thuchienLoai)){
                    ?>
                       <option
                       <?php 
                                if($row['IdLoai']==$rowL['IdLoai'])
                                {
                                    echo 'selected="selected"';
                                }
                            ?>
                        value="<?php echo $rowL['IdLoai'] ;?>"><?php echo $rowL['TenLoai']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                
                <label>Mô Tả</label>     
            
                <textarea class="form-control" name="mota" id="mota" cols="30" rows="5" required><?php if(isset($_POST["mota"])){echo $_POST["mota"];} else {echo $row["MoTa"];}?></textarea>
                     
            
                <label>Ảnh</label>
                <input type="file" class="form-control" id="anh" name="anh"> <input type="hidden" name="anh" value="<?php echo $row["Anh"]?>">
                         
            <button type="submit" id="submit"  name="submit" class="btn btn-info">Update</button>                            
        </form>
    </div>