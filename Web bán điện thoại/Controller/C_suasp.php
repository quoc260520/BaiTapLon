<?php
    if(isset($_GET["IdSp"]))
    {
        $sqlLoai="select * from loaihang";
        $thuchienLoai=mysqli_query($conn,$sqlLoai);
        $idsp=$_GET["IdSp"];
        $sqlsp="select * from sanpham where IdSp='$idsp'";
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
            move_uploaded_file($tmp_name,"../anh/".$anh);
            $sql="update sanpham set IdLoai='$idloai',TenSp='$tensp',Anh='$anh',Gia='$gia',BaoHanh='$baohanh',TinhTrang='$tinhtrang',KhuyenMai='$khuyenmai',TrangThai='$trangthai',MoTa='$mota'  where IdSp='$idsp'";
            $thuchien=mysqli_query($conn,$sql);
            header("location: V_quantri.php?Page_layout=danhmucsp");
        }
    }
?>
     