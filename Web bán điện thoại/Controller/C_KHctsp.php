<?php
include_once '../Model/ketnoi.php';
if(isset($_GET["IdSp"]))
{
  $idsp=$_GET["IdSp"];
  $sql="select * from sanpham inner join loaihang on sanpham.IdLoai=loaihang.IdLoai where IdSp='$idsp'";
  $thuchien=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($thuchien);
}
?>