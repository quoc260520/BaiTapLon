<?php
include_once '../Model/ketnoi.php';
if(isset($_GET["timkiem"]))
{
  $timkiem=$_GET["timkiem"];
  $sqltk="select * from sanpham where TenSp like '%$timkiem%'";
  $thuchientk=mysqli_query($conn,$sqltk);
}
?>
