<?php
include_once '../Controller/C_themsp.php';
?>

      <div class="MRight">
        <form action="" method="post" enctype="multipart/form-data">

        <h2>Thêm mới sản phẩm</h2>
                <label>Tên sản phẩm</label>
                <input type="text" class="form-control" id="tensp" name="tensp" required>
            
            
                <label>Tình trạng</label>
                <input type="text" class="form-control" id="tinhtrang" name="tinhtrang" required>
                     
            
                <label>Giá</label>
                <input type="text" class="form-control" id="gia" name="gia" required>
                     
            
                <label>Khuyến mãi</label>
                <input type="text" class="form-control" id="khuyenmai" name="khuyenmai" required>
                     
            
                <label>Bảo hành</label>
                <input type="text" class="form-control" id="baohanh" name="baohanh" required>   

                <label>Trạng thái</label>
                <select class="form-control" id="trangthai" name="trangthai" required>
                    <option>Còn hàng</option>
                    <option>Hết hàng</option>
                </select>
                     
            
                <label>Nhà cung cấp</label>
                <select class="form-control" id="idloai" name="idloai" >
                    <option value="unselect" selected>Lựa chọn nhà cung cấp</option>
                    <?php
                    while($rowL=mysqli_fetch_array($thuchienLoai)){
                    ?>
                    <option value="<?php echo $rowL['IdLoai'] ;?>"><?php echo $rowL['TenLoai']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                
                <label>Mô Tả</label>     
            
                <textarea class="form-control" name="mota" id="mota" cols="30" rows="5" required></textarea>
                     
            
                <label>Ảnh</label>
                <input type="file" class="form-control" id="anh" name="anh" required>
                         
            <button type="submit" id="submit"  name="submit" class="btn btn-info">Thêm mới</button>                            
        </form>
    </div>