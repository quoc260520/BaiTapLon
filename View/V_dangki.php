<?php
include_once '../Controller/C_dangki.php';
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
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./dangki.css">
    <title>Đăng Kí Tài Khoản</title>
</head>
<body>
    <div class="form">
      <div class="dangki">
        <h2>Đăng Kí Tài Khoản</h2>
        <form method="POST" action="#">
            <div class="mb-3">
              <label for="HoTen" class="form-label">Họ Tên</label>
              <input type="text" class="form-control" id="tentv" name="tentv" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="User" class="form-label">Tài Khoản <i>(Email)</i></label>
              <input type="email" class="form-control" id="email" name="email" equired>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Số Điện Thoại</label>
                <input type="text" class="form-control" id="sodienthoai" name="sodienthoai" required>
              </div>
              <p><i><b>Lưu ý:</b>vui lòng cung cấp đầy đủ thông tin để đăng kí để đăng kí tài khoản <a href="./V_index.php">Đăng Nhập</a>.</i></p>
            <button type="submit" class="btn btn-danger" id="submit" name ="submit">Đăng Kí</button> 
          </form>
    </div>
    </div>
</body>
</html>