<?php
include_once '../Model/ketnoi.php';
if(isset($_POST["submit"]))
{
  $tentv=$_POST["tentv"];
  $email=$_POST["email"];
  $pass=$_POST["pass"];
  $sodienthoai=$_POST["sodienthoai"];
  if(isset($tentv) && isset($email) && isset($pass) && isset($sodienthoai))
  {
    $kt="select * from thanhvien where Email='$email'or SoDienThoai='$sodienthoai'";
    $th=mysqli_query($conn,$kt);
    $rows=mysqli_num_rows($th);
    if($rows>0)
    {
      echo '<center class="alert alert-danger">Tài khoản hoặc số điện thoại này đã tồn tại.Vui lòng đăng kí tài khoản khác!!!<a href="./V_index.php"> <b><i>Quay Lại</i></b></a> </center>"';
    }
    else
    {
      $sql="insert into thanhvien(TenTv,SoDienThoai,Email,Pass) values ('$tentv','$sodienthoai','$email','$pass')";
      $thuchien=mysqli_query($conn,$sql);
      echo '<center class="alert alert-success"> Đăng kí thành công. Đăng nhập<a href="./V_index.php"> <b><i>tại đây</i></b></a> </center>"';
    }
  }
}
?>
