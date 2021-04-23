<?php
include_once '../Model/ketnoi.php';
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
            header("location: V_quantri.php?Page_layout=danhmucsp");
        }
    }
}
?>