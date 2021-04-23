<?php
ob_start();
session_start();
include_once "../Model/ketnoi.php" ;

if(isset($_POST["submit"]))
{
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    if(isset($email) && isset($pass))
    {
        $sql="select* from thanhvien where Email='$email' and Pass='$pass'";
        $thuchien=mysqli_query($conn,$sql);
        $row=mysqli_num_rows($thuchien);
        $rowcv=mysqli_fetch_array($thuchien);
        if($row>0&&$rowcv["ChucVu"]=="quanly")
        {
            $_SESSION["email"]=$email;
            $_SESSION["pass"]=$pass;
            header('location: V_quantri.php');
        }
        else  if($row>0&&$rowcv["ChucVu"]=="nhanvien")
        {
            $_SESSION["email"]=$email;
            $_SESSION["pass"]=$pass;
            header('location: V_quantri.php');
        }
        else if($row>0&&$rowcv["ChucVu"]=="khachhang")
        {
            $_SESSION["email"]=$email;
            $_SESSION["pass"]=$pass;
            header('location: V_KHtrangchu.php');
        }
        else
        {
            echo '<center class="alert alert-danger"> Tài khoản này không tồn tại </center>"';
        }
    }
}
?>
