<?php
include_once '../Model/ketnoi.php';
$sqlDB="select * from sanpham where Gia>=10000000";
$thuchienDB=mysqli_query($conn,$sqlDB);
$sqlM="select * from sanpham where Gia<10000000";
$thuchienM=mysqli_query($conn,$sqlM);
?> 
