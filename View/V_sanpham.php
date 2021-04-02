<div class="Menu">
      <div class="daychuyen">
        <div class="dcL">
          
        </div>
        <div class="dccenter">
          <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>
  
            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../anh/he-lo-hinh-anh-moi-nhat-cua-huawei-p40-pro-dmcl-1.jpg" alt="Los Angeles" width="1100" height="500">
              </div>
              <div class="carousel-item">
                <img src="../anh/vi-vn-xiaomi-redmi-note-8-pro-thumbvideo-1.jpg" alt="Chicago" width="1100" height="500">
              </div>
              <div class="carousel-item">
                <img src="../anh/iphone12-didongviet-1-2.jpg" alt="New York" width="1100" height="500">
              </div>
            </div>
  
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
        </div>
        <div class="dcR">
          <ul>
            <li><a href=""><img style="border-radius: 3px;width: 245px;height: 100px;" src="../anh/anhSale1.jpg" alt=""></a></li>
            <li><a href=""><img style="border-radius: 3px;width: 245px;height: 100px;" src="../anh/anhSale2.jpg" alt=""></a></li>
            <li><a href=""><img style="border-radius: 3px;width: 245px;height: 100px;" src="../anh/anhSAle3.jpg" alt=""></a></li>
          </ul>
        </div>
      </div>

      <img style="margin-top: 10px;border-radius: 3px;width: 86%;" src="../anh/SALE.png" alt="">
      
    <h1><i><b>Hàng </b></i><i class="iconhot fa fa-bolt" aria-hidden="true"></i><i><b> Đặc Biệt</b></i></h1>
      <div class="vien">
        <?php while($rowsp=mysqli_fetch_array($thuchienDB)){?>
        <div class=bangsp>
          <p class="khuyenmai">khuyến mãi:<?php echo $rowsp["KhuyenMai"];?></p>
          <a href="V_chitietsanpham.php?IdSp=<?php echo $rowsp["IdSp"]?>"><img width="180px" height="170px" src="../anh/<?php echo $rowsp["Anh"];?>" alt=""></a>
          <b style="color:red;font-style:italic"><p><?php echo $rowsp["TenSp"];?></p></b>
          <b style="color:red;font-style:italic"><p>Giá:<?php echo $rowsp["Gia"];?><i>đ</i></p></b>
        </div>  
        <?php }?>
      </div>


      <h1><i><b>Hàng </b></i><i class="iconhot fa fa-bolt" aria-hidden="true"></i><i><b> Giá Mềm</b></i></h1>
      <div class="hangmem">
        <?php while($rowsp=mysqli_fetch_array($thuchienM)){?>
        <div class=bangsp>
          <p class="khuyenmai">khuyến mãi:<?php echo $rowsp["KhuyenMai"];?></p>
          <a href="V_chitietsanpham.php?IdSp=<?php echo $rowsp["IdSp"]?>"><img width="180px" height="170px" src="../anh/<?php echo $rowsp["Anh"];?>" alt=""></a>
          <b style="color:red;font-style:italic"><p><?php echo $rowsp["TenSp"];?></p></b>
          <b style="color:red;font-style:italic"><p>Giá:<?php echo $rowsp["Gia"];?><i>đ</i></p></b>
        </div>  
        <?php }?>
      </div>
      </div> 
      <div class="footer">
        <div class="footerTop">
          <ul>
            <li><a href="https://www.facebook.com/"><i style="color: blue;" class="con1 fa fa-facebook-square" aria-hidden="true"></i></a></li>
            <li><a href=""><i style="color: red;" class="con1 fa fa-youtube-play" aria-hidden="true"></i></a></li>
            <li><a href=""><i style="color: brown;" class="con1 fa fa-envelope" aria-hidden="true"></i></a></li>
            <li><a href=""><i style="color: yellow;" class="con1 fa fa-commenting" aria-hidden="true"></i></a></li>
            <li><a href=""><i style="color: rgb(182, 141, 27);" class="con1 fa fa-instagram" aria-hidden="true"></i></a></li>
          </ul>
        </div>
        <div style="text-align: center;" class="footerBottom">
          <h6 style="margin: 0px;padding: 0px; padding-top: 5px;color: rgb(250, 17, 17);font-size: 15px;font-style: italic;">416 Phone : 416Phone@gmail.com.......</h6>
        </div>
      </div>
    </div>