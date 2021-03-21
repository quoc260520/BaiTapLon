<?php
    if(isset($_GET["idsp"]))
    {
        $sqlLoai="select * from loaihang";
        $thuchienLoai=mysqli_query($conn,$sqlLoai);
        $idsp=$_GET["idsp"];
        $sqlsp="select * from sanpham where idsp='$idsp'";
        $thuchiensp=mysqli_query($conn,$sqlsp);
        $row=mysqli_fetch_array($thuchiensp);
    }
    if(isset($_POST["submit"]))
    {
        $tensp=$_POST["tensp"];
        $tinhtrang=$_POST["tinhtrang"];
        $gia=$_POST["gia"];
        $khuyenmai=$_POST["khuyenmai"];
        $baohanh=$_POST["baohanh"];
        $trangthai=$_POST["trangthai"];
        $idloai=$_POST["idloai"];
        $mota=$_POST["mota"];

        if($_FILES["anh"]["name"]=="")
        {
            $anh=$_POST["anh"];
        }
        else
        {
            $anh=$_FILES["anh"]["name"];
            $tmp_name=$_FILES["anh"]["tmp_name"];
        }

        if(isset($tensp)&&isset($tinhtrang)&&isset($gia)&&isset($khuyenmai)&&isset($baohanh)&&isset($trangthai)&&isset($mota))
        {
            move_uploaded_file($tmp_name,"anh/".$anh);
            $sql="update sanpham set idloai='$idloai',tensp='$tensp',anh='$anh',gia='$gia',baohanh='$baohanh',tinhtrang='$tinhtrang',khuyenmai='$khuyenmai',trangthai='$trangthai',mota='$mota'  where idsp='$idsp'";
            $thuchien=mysqli_query($conn,$sql);
            header("location: quantri.php?Page_layout=danhmucsp");
        }
    }
?>
      <div class="MRight">
        <form action="" method="post" enctype="multipart/form-data">

        <h2>Update sản phẩm</h2>
                <label>Tên sản phẩm</label>
                <input type="text" class="form-control" id="tensp" name="tensp" value="<?php if(isset($_POST["tensp"])){echo $_POST["tensp"];} else {echo $row["tensp"];}?>" required>
            
            
                <label>Tình trạng</label>
                <input type="text" class="form-control" id="tinhtrang" name="tinhtrang" value="<?php if(isset($_POST["tinhtrang"])){echo $_POST["tinhtrang"];} else {echo $row["tinhtrang"];}?>" required>
                     
            
                <label>Giá</label>
                <input type="text" class="form-control" id="gia" name="gia" value="<?php if(isset($_POST["gia"])){echo $_POST["gia"];} else {echo $row["gia"];}?>" required>
                     
            
                <label>Khuyến mãi</label>
                <input type="text" class="form-control" id="khuyenmai" name="khuyenmai" value="<?php if(isset($_POST["khuyenmai"])){echo $_POST["khuyenmai"];} else {echo $row["khuyenmai"];}?>" required>
                     
            
                <label>Bảo hành</label>
                <input type="text" class="form-control" id="baohanh" name="baohanh" value="<?php if(isset($_POST["baohanh"])){echo $_POST["baohanh"];} else {echo $row["baohanh"];}?>" required>   

                <label>Trạng thái</label>
                <select class="form-control" id="trangthai" name="trangthai" value="<?php if(isset($_POST["trangthai"])){echo $_POST["trangthai"];} else {echo $row["trangthai"];}?>" required>
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
                                if($row['idloai']==$rowL['idloai'])
                                {
                                    echo 'selected="selected"';
                                }
                            ?>
                        value="<?php echo $rowL['idloai'] ;?>"><?php echo $rowL['tenloai']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                
                <label>Mô Tả</label>     
            
                <textarea class="form-control" name="mota" id="mota" cols="30" rows="5" required><?php if(isset($_POST["mota"])){echo $_POST["mota"];} else {echo $row["mota"];}?></textarea>
                     
            
                <label>Ảnh</label>
                <input type="file" class="form-control" id="anh" name="anh"> <input type="hidden" name="anh" value="<?php echo $row["anh"]?>">
                         
            <button type="submit" id="submit"  name="submit" class="btn btn-info">Update</button>                            
        </form>
    </div>