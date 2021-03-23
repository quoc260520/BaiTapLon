<?php
    include_once './ketnoi.php';
    $idxoa=$_GET["IdSp"];
    $sql="delete from sanpham where IdSp='$idxoa'";
    $thuchien=mysqli_query($conn,$sql);
    header('location: quantri.php?Page_layout=danhmucsp');
?>