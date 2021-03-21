<?php
    include_once './ketnoi.php';
    if(isset($_POST["submit"]))
    {
        $sodienthoai=$_POST["sodienthoai"];
        $sql="select sodienthoai from thanhvien where sodienthoai='$sodienthoai'";
        $thuchien=mysqli_query($conn,$sql);
        $rown=mysqli_num_rows($thuchien);
        if($rown>0)
        {
            echo '<center class="alert alert-success">Vui lòng kiểm tra thông tin mật khẩu gửi về số điện thoại <i class="fa fa-check" aria-hidden="true"></i> <a href="./index.php">Đăng Nhập Ngay</a> </center>"';
        }
        else
        {
            echo '<center class="alert alert-danger"> Số điện thoại không hợp lệ. Vui lòng kiểm tra lại!!! <a href="./index.php">Quay Lại</a></center>"';
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
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./quenpass.css">
    <title>Quên mật khẩu </title>
</head>
<body>
    
    <div class="container quenmk">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4 col-xs-12 container-quen">
                <form method="POST" action="">
                    <h2>Quên Mật Khẩu</h2>
                        <div class="row tren" >
                            <input type="text" class="form-control" placeholder="so dien thoai" id="sodienthoai" name="sodienthoai" required>
                        </div>
                        <div class="note">
                            <p><i><b>Lưu ý:</b>vui lòng cung cấp số diện thoại đã đăng kí để nhận thông báo lấy lại mật khẩu <a href="./index.php">Đăng Nhập</a>.</i></p>
                        </div>
                        <button type="submit" class="btn btn-info btnxacnhan" id="submit" name="submit">Xác nhận</button>
                    </div>
            </div>
                </form>
        </div>
</body>
</html>