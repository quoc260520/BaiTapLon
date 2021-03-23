<?php
include_once './ketnoi.php';
$sqlLoai="select * from loaihang";
$thuchienLoai=mysqli_query($conn,$sqlLoai);
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
         $erro='<span style="color:red">(*)</span>';
    }
    else
    {
        $anh=$_FILES["anh"]["name"];
        $tmp_name=$_FILES["anh"]["tmp_name"];
    }
    if($_POST["idloai"]=="unselect")
    {
        $erro_loai='<span style="color:red;">(*)</span>';
    }
    $sqlThem="select * from sanpham where TenSp='$tensp'";
    $sqlThucHienThem=mysqli_query($conn,$sqlThem);
    $rowT=mysqli_num_rows($sqlThucHienThem);
    if($rowT>0)
    {
        echo '<center class="alert alert-danger">Sản phẩm này đã tồn tại</center>';
    }
    else
    {
        if(isset($tensp)&&isset($tinhtrang)&&isset($gia)&&isset($khuyenmai)&&isset($baohanh)&&isset($trangthai)&&isset($idloai)&&isset($mota)&&isset($anh))
        {
            move_uploaded_file($tmp_name,"anh/".$anh);
            $sql="insert into sanpham(IdLoai,TenSp,Anh,Gia,BaoHanh,TinhTrang,KhuyenMai,TrangThai,MoTa) values('$idloai','$tensp','$anh','$gia','$baohanh','$tinhtrang','$khuyenmai','$trangthai','$mota')";
            $thuchien=mysqli_query($conn,$sql);
            header("location: quantri.php?Page_layout=danhmucsp");
        }
    }
}
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