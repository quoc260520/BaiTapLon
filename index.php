<?php
ob_start();
session_start();
include_once './ketnoi.php';

if(isset($_POST["submit"]))
{
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    if(isset($email) && isset($pass))
    {
        $sql="select* from thanhvien where Email='$email' and Pass='$pass'";
        $thuchien=mysqli_query($conn,$sql);
        $row=mysqli_num_rows($thuchien);
        if($row>0)
        {
            $_SESSION["email"]=$email;
            $_SESSION["pass"]=$pass;
            header('location: quantri.php');
        }
        else
        {
            echo '<center class="alert alert-danger"> Tài khoản này không tồn tại </center>"';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    <title>Đăng Nhập</title>
</head>
<body>
    <div class="login">
    <h2>Đăng nhập vào website</h2>
    <div class ="nhaplogin">
        <form action="" method="POST">
            <div class="user">
                <i class="icon1 fa fa-user" aria-hidden="true"></i>
                <label for="User"></label>
                <input type="email" id="email" name="email" placeholder="...@gmail.com" required>
            </div>
            <div class="user">
                <label for="PassWord"></label>
                <i class="icon2 fa fa-expeditedssl" aria-hidden="true"></i>
                <input type="password" id="pass" name="pass" placeholder="password" required>
            </div>
            <button type="submit" id="submit" name ="submit" class="btn btn-success">login</button>
            <div class="dangkivaquenpass">
                <div class="dangki">
                    <a href="./dangki.php" title="DangKi"><i>Đăng kí tại đây</i></a>
                </div>
                <div class="quenmatkhau">
                    <a href="./quenpass.php" title="Quenmatkhau"><i>Quên mật khẩu ?</i></a>
                </div>
            </div>
        </form>
    </div>
    </div>
</body>
</html>