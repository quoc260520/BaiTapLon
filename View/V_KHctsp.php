<?php
include_once '../Controller/C_KHctsp.php';
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
    <link rel="stylesheet" href="./chitietsanpham.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
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
          <div class="bando">
            <a href=""><i class="icon3 fa fa-map-marker" aria-hidden="true"></i></a>
            <h5>Địa chỉ cửa hàng</h5>
          </div>
          <div class="giohang">
            <a href=""><i class="icon1 fa fa-shopping-cart" aria-hidden="true"></i></a>
            <h5>Giỏ hàng</h5>
          </div>
        </div>
    </div>
    <div class="Menu">
      <div class="tensp" style="display: flex;">
        <div style="width:10%;margin-top: 15px; margin-left: 25px; font-size: 20px;" class="iconout">
          <a href="V_KHtrangchu.php"><i class="fa fa-reply" aria-hidden="true"></i></a>
        </div>
        <div style="width:90%"class="ten">
          <h6 style="margin: 0px;padding: 0px;font-weight: bold;padding-top: 20px;font-size: 20px;color: red; text-transform:uppercase;">Dòng điện thoại <?php echo $row["TenSp"]?></h6>
        </div>
      </div>
      <div class="thongtin" style="margin:40px">
        <div class="ttLeft">
          <img src="../anh/<?php echo $row["Anh"]?>" alt="">
        </div>  
        <div class="ttRight">
          <ul>
            <li><b>Giá</b> <p><?php echo $row["Gia"]?><i style="text-decoration: underline;">đ</i></p></li>
            <li><b>Trạng Thái</b> <p><?php echo $row["TrangThai"]?></p></li>
            <li><b>Nhà Phát Hành</b>  <p><?php echo $row["TenLoai"]?></p></li>
            <li><b>Bảo Hành</b>  <p><?php echo $row["BaoHanh"]?></p></li>
            <li><b>Khuyến Mãi</b> <p><?php echo $row["KhuyenMai"]?></p></li>
            <li><b>Tình Trạng</b>  <p><?php echo $row["TinhTrang"]?></p></li>
            <li><b>Mô Tả</b> <p><?php echo $row["MoTa"]?></p></li>
          </ul>
          <button style="width:140px;height: 40px;" class="btn btn-danger">Mua Ngay</button>
        </div>
    </div>
</body>
</html>