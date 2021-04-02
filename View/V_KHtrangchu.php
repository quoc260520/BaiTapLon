<?php
include_once '../Controller/C_KHtrangchu.php';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./trangchu.css">
    <link rel="stylesheet" href="./chitietsanpham.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width:650px;
        height: 320px;
        margin-top: 10px;
        border-radius: 3px;
    }
    </style>
    <title>Trang chủ</title>
</head>
<body>
    <div class="Nav">
        <div class="left">
          <a href="V_KHtrangchu.php"><img style="margin-left: 110px;width: 190px;" src="../anh/logo.jpg"></a>
        </div>
        <div class="center">
          <form class="form-inline" action="V_KHtimkiem.php" method="get" name=form>
            <input class="form-control mr-sm-2" type="text" name="timkiem" value="" placeholder="Tìm kiếm tại đây...">
            <button class="btn btn-danger" type="submit">Search</button>
          </form>
        </div>
        <div class="right">
          <div class="phone">
            <a href=""><i class="icon2 fa fa-phone" aria-hidden="true"></i></a>
            <h5>Phone:0969666888</h5>
          </div>
          <div class="giohang">
            <a href=""><i class="icon1 fa fa-shopping-cart" aria-hidden="true"></i></a>
            <h5>Giỏ hàng</h5>
          </div>
          <div class="bando">
            <a href="V_index.php"><i class="icon3 fa fa-power-off" aria-hidden="true"></i></a>
            <h5>Đăng Xuất</h5>
          </div>
        </div>
    </div>
    <?php
      if(isset($_GET["Page_layout"]))
      {
        switch($_GET["Page_layout"])
        {
          case 'sanpham': include_once './V_KHsanpham.php';
          break;
          case 'timkiem':include_once './V_KHtimkiem.php';
          break;
          default:include_once './V_KHsanpham.php';
        }
      }
      else
      {
        include_once './V_KHsanpham.php';
      }
    ?>
</body>
</html>