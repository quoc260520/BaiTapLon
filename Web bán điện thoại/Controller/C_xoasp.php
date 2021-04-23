<?php
    include_once '../Model/ketnoi.php';
    $idxoa=$_GET["IdSp"];
    $sql="delete from sanpham where IdSp='$idxoa'";
    $thuchien=mysqli_query($conn,$sql);
    header('location: V_quantri.php?Page_layout=danhmucsp');
?>