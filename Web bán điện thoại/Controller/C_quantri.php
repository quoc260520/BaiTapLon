
<?php
include_once '../Model/ketnoi.php';
$sql="select * from sanpham inner join loaihang on sanpham.IdLoai=loaihang.IdLoai order by IdSp desc";
$thuchien=mysqli_query($conn,$sql);

$sql1="select * from thanhvien where ChucVu='nhanvien' order by IdTv desc";
$thuchien1=mysqli_query($conn,$sql1);

?>
