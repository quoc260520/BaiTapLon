<?php

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
   
    

    $sqlThem="select * from thanhvien  where Email='$email' ";
    $sqlThucHienThem=mysqli_query($conn,$sqlThem);
    $rowT=mysqli_num_rows($sqlThucHienThem);

    $sqlThem1="select * from thanhvien  where  SoDienThoai='$sodienthoai'";
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
    else if($ngaysinh > date("Y-m-d"))
    {
        echo '<center class="alert alert-danger">Ngày sinh không hợp lệ  </center>';
    }
    else
    {
        if(isset($tennv)&&isset($sodienthoai)&&isset($email)&&isset($pass)&&isset($chucvu)&&isset($diachi)&&isset($ngaysinh)&&isset($gioitinh))
        {
            $sql="insert into thanhvien(TenTv,Email,SoDienThoai,Pass,ChucVu) values('$tennv','$email','$sodienthoai','$pass','$chucvu')";
            $thuchien=mysqli_query($conn,$sql);
            
            $sqlThemct="select IdTv from thanhvien  where Email='$email' ";
            $sqlThucHienThemct=mysqli_query($conn,$sqlThemct);
            $rowct=mysqli_fetch_array($sqlThucHienThemct);
            $idtv=$rowct['IdTv'];

            $sqlnv="insert into nhanvien(IdTv,DiaChi,NgaySinh,GioiTinh) values('$idtv','$diachi','$ngaysinh','$gioitinh')";
            $thuchiennv=mysqli_query($conn,$sqlnv);
            header("location: V_quantri.php?Page_layout=danhsachnv");
        }
    }
}
?>
