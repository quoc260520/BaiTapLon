
<?php
include_once './ketnoi.php';
$sql="select * from sanpham inner join loaihang on sanpham.IdLoai=loaihang.IdLoai order by IdSp desc";
$thuchien=mysqli_query($conn,$sql);
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
    <link rel="stylesheet" href="./quantri.css">
    <link rel="stylesheet" href="./danhmucsp.css">
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./themsp.css">
    <title>Website</title>
</head>
<body>
    <div class="Nav">
        <div class="left">

        </div>
        <div class="center">
        
        </div>
        <div class="right">

        </div>
    </div>
    <div class="Menu">
      <div class="MLeft">
        <h4>Quản Lí Danh Mục</h4>
        <div class="DanhMuc btn-group-vertical">
          <a href="quantri.php?Page_layout=danhmucsp"><button type="button" class="btdanhmuc btn btn-success"><i class="icon2 fa fa-th-list" aria-hidden="true"></i>Danh Mục Sản Phẩm</button></a>
          <a href=""><button type="button" class="btdanhmuc btn btn-success"><i class="icon2 fa fa-users" aria-hidden="true"></i>Danh Mục Nhân Viên</button></a>
          <a href="./index.php"><button type="button" class="btdanhmuc btn btn-success"><i class="icon2 fa fa-sign-in" aria-hidden="true"></i>Đăng Xuất</button></a>
        </div>
      </div>
      <div class="MRight">
        <?php
          if(isset($_GET["Page_layout"]))
          {
            switch($_GET["Page_layout"])
            {
              case 'danhmucsp': include_once './danhmucsp.php';
              break;
              case 'themsp': include_once './themsp.php';
              break;
              case 'suasp': include_once './suasp.php';
              break;
              default:include_once './danhmucsp.php';
            }
          }
          else
          {
            include_once './danhmucsp.php';
          }
        ?>
      </div> 
    </div>
</body>
</html>