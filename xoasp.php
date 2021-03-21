<?php
    include_once './ketnoi.php';
    $idxoa=$_GET["idsp"];
    $sql="delete from sanpham where idsp='$idxoa'";
    $thuchien=mysqli_query($conn,$sql);
    header('location: quantri.php?Page_layout=danhmucsp');
?>