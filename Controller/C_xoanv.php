<?php
    include_once '../Model/ketnoi.php';
    $idxoa=$_GET["IdTv"];
    $sqlx="delete from nhanvien where IdTv='$idxoa'";
    $thuchienx=mysqli_query($conn,$sqlx);

    $sql="delete from thanhvien where IdTv='$idxoa'";
    $thuchien=mysqli_query($conn,$sql);
    header('location: V_quantri.php?Page_layout=danhsachnv');
?>