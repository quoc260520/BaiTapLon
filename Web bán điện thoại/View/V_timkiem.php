<?php
include_once '../Controller/C_timkiem.php';
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
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./timkiem.css">
    <title>Trang chủ</title>
</head>
<body>
    <div class="DieuHuong">
        <div class="center">
        <ul>
          <li><a href="V_quantri.php"active>Quản Trị</a></li>
          <li><a href="V_trangchu.php">Trang Chủ</a></li>
        </ul>
        </div>
    </div>
       <div class="Nav">
        <div class="left">
          <a href="V_trangchu.php"><img style="margin-left: 110px;width: 190px;" src="../anh/logo.jpg"></a>
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
    <div clas="tentk" style="width:100%;height:50px;boder-bottom:1px solid black;"><h5 style="padding-left:100px;margin-top:50px;"><i>Điện thoại được tìm kiếm theo : <b><?php echo $timkiem?></b></i></h5></div>
    <div class="Menu">
    <div class="vien">
        <?php while($rows=mysqli_fetch_array($thuchientk)){?>
        <div class="bangsp">
          <p class="khuyenmai">khuyến mãi:<?php echo $rows["KhuyenMai"];?></p>
          <a href="V_chitietsanpham.php?IdSp=<?php echo $rows["IdSp"]?>"><img width="180px" height="170px" src="../anh/<?php echo $rows["Anh"];?>" alt=""></a>
          <b style="color:red;font-style:italic"><p><?php echo $rows["TenSp"];?></p></b>
          <b style="color:red;font-style:italic"><p>Giá:<?php echo $rows["Gia"];?><i>đ</i></p></b>
        </div>  
        <?php }?>
      </div>
    </div>
</body>
</html>