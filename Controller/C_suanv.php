<?php

    $idtv=$_GET["IdTv"];
    $sqlnv="select * from thanhvien where IdTv='$idtv'";
    $thuchiennv=mysqli_query($conn,$sqlnv);
    $row=mysqli_fetch_array($thuchiennv);
    $sqlct="select * from nhanvien where IdTv='$idtv'";
    $thuchienct=mysqli_query($conn,$sqlct);
    $rowct=mysqli_fetch_array($thuchienct);


if(isset($_POST["submit"]))
{
    $tennv=$_POST["tennv"];
    $sodienthoai=$_POST["sodienthoai"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $chucvu=$_POST["chucvu"];
    $diachi=$_POST["diachi"];
    $ngaysinh=$_POST["ngaysinh"];
    $gioitinh=$_POST["gioitinh"];
    
    $sqlThem="select * from thanhvien  where Email='$email' and IdTv !='$idtv'";
    $sqlThucHienThem=mysqli_query($conn,$sqlThem);
    $rowT=mysqli_num_rows($sqlThucHienThem);

    $sqlThem1="select * from thanhvien  where  SoDienThoai='$sodienthoai' and IdTv !='$idtv'";
    $sqlThucHienThem1=mysqli_query($conn,$sqlThem1);
    $rowT1=mysqli_num_rows($sqlThucHienThem1);
    
     if($rowT1>0)
    {
        echo '<center class="alert alert-danger">Số điện thoại đã tồn tại </center>';
    }
    else if($rowT>0)
    {
        echo '<center class="alert alert-danger">Email đã tồn tại </center>';
    }
    else if($ngaysinh > date("d/m/Y"))
    {
        echo '<center class="alert alert-danger">Ngày sinh không hợp lệ  </center>';
    }
    else 
    {
        if(isset($tennv)&&isset($sodienthoai)&&isset($email)&&isset($pass)&&isset($chucvu))
        {
            $sql="update thanhvien set TenTv='$tennv',SoDienThoai='$sodienthoai' ,Email='$email',Pass='$pass',ChucVu='$chucvu' where IdTv='$idtv'";
            $thuchien=mysqli_query($conn,$sql);

            $sql2="update nhanvien set DiaChi='$diachi',NgaySinh='$ngaysinh' ,GioiTinh='$gioitinh' where IdTv='$idtv'";
            $thuchien2=mysqli_query($conn,$sql2);
            header("location: V_quantri.php?Page_layout=danhsachnv");
        }
    }
}

?>
          
           